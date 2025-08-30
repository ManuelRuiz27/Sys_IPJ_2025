#!/usr/bin/env python3
"""
Export tables from a SQLite database to CSV files and import them into a MySQL
Database using LOAD DATA INFILE. The import respects foreign key constraints by
ordering the operations according to the dependency graph of the tables.

Example usage:
    python scripts/sqlite_to_mysql.py \
        --sqlite-db ipj_bd.db \
        --mysql-host localhost \
        --mysql-user root \
        --mysql-password secret \
        --mysql-db target_db

The MySQL server must allow LOAD DATA LOCAL INFILE and the `mysql` client must be
available in PATH.
"""

import argparse
import os
import sqlite3
import subprocess
from collections import defaultdict, deque
from dataclasses import dataclass


def get_tables_and_dependencies(conn):
    """Return a list of tables and their foreign key dependencies."""
    cursor = conn.cursor()
    cursor.execute(
        "SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%';"
    )
    tables = [row[0] for row in cursor.fetchall()]

    deps: dict[str, set[str]] = defaultdict(set)
    for table in tables:
        fk_cursor = conn.execute(f"PRAGMA foreign_key_list('{table}')")
        for (_, _, ref_table, _, _, _) in fk_cursor.fetchall():
            deps[table].add(ref_table)
    return tables, deps


def topological_sort(tables, deps):
    """Return tables ordered so that dependencies come first."""
    incoming = {t: set() for t in tables}
    for table, requirements in deps.items():
        for dep in requirements:
            incoming[table].add(dep)

    order = []
    queue = deque([t for t in tables if not incoming[t]])
    while queue:
        table = queue.popleft()
        order.append(table)
        for dependant, requirements in deps.items():
            if table in requirements:
                incoming[dependant].discard(table)
                if not incoming[dependant] and dependant not in order and dependant not in queue:
                    queue.append(dependant)

    if len(order) != len(tables):
        missing = set(tables) - set(order)
        raise RuntimeError(f"Could not resolve dependencies for tables: {missing}")
    return order


def export_table(db_path: str, table: str, out_dir: str) -> str:
    """Export a single table from SQLite to CSV. Returns path to CSV."""
    csv_path = os.path.join(out_dir, f"{table}.csv")
    cmd = ["sqlite3", "-header", "-csv", db_path, f"SELECT * FROM '{table}';"]
    with open(csv_path, "w", encoding="utf-8") as fh:
        subprocess.run(cmd, check=True, stdout=fh)
    return csv_path


@dataclass
class MySQLConfig:
    host: str
    user: str
    password: str
    database: str


def import_table(csv_path: str, mysql: MySQLConfig, table: str) -> None:
    """Import a CSV file into a MySQL table using LOAD DATA INFILE."""
    command = (
        f"LOAD DATA LOCAL INFILE '{csv_path}' INTO TABLE `{table}` "
        "FIELDS TERMINATED BY ',' ENCLOSED BY '\"' "
        "LINES TERMINATED BY '\n' IGNORE 1 ROWS;"
    )
    mysql_cmd = [
        "mysql",
        "--local-infile=1",
        f"-h{mysql.host}",
        f"-u{mysql.user}",
        f"-p{mysql.password}",
        mysql.database,
        "-e",
        command,
    ]
    subprocess.run(mysql_cmd, check=True)


def main() -> None:
    parser = argparse.ArgumentParser(description="Export SQLite tables and import into MySQL")
    parser.add_argument("--sqlite-db", required=True, help="Path to the SQLite database file")
    parser.add_argument("--mysql-host", default="localhost", help="MySQL host")
    parser.add_argument("--mysql-user", required=True, help="MySQL user")
    parser.add_argument("--mysql-password", required=True, help="MySQL password")
    parser.add_argument("--mysql-db", required=True, help="Target MySQL database name")
    parser.add_argument(
        "--output-dir",
        default="csv_export",
        help="Directory to place generated CSV files",
    )
    args = parser.parse_args()

    os.makedirs(args.output_dir, exist_ok=True)

    conn = sqlite3.connect(args.sqlite_db)
    try:
        tables, deps = get_tables_and_dependencies(conn)
        ordered_tables = topological_sort(tables, deps)

        csv_files: dict[str, str] = {}
        for table in ordered_tables:
            csv_files[table] = export_table(args.sqlite_db, table, args.output_dir)

        mysql_cfg = MySQLConfig(
            host=args.mysql_host,
            user=args.mysql_user,
            password=args.mysql_password,
            database=args.mysql_db,
        )

        for table in ordered_tables:
            import_table(csv_files[table], mysql_cfg, table)
    finally:
        conn.close()


if __name__ == "__main__":
    main()
