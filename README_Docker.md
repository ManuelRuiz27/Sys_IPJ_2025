# Sys_IPJ_2025 — Entorno Docker

## Requisitos
- Docker Desktop / Docker Engine
- Docker Compose v2

## Estructura
```
/Sys_IPJ_2025
 ├─ backend/        # tu app Laravel (aquí va el código)
 └─ docker/compose.yml, Makefile, etc.
```

> Copia la carpeta `backend` de tu proyecto dentro de esta estructura (o mueve estos archivos a tu repo actual).

## Primer arranque
1. En `backend/`: crea `.env` a partir de `.env.example` (incluido aquí).
2. Desde `docker/`:
   ```bash
   docker compose up --build
   ```

Servicios:
- Laravel: http://localhost:8000
- Vite (HMR): http://localhost:5173
- Mailpit (UI): http://localhost:8025

## Comandos útiles (Makefile)
```
make up      # levantar stack
make down    # detener
make logs    # ver logs
make fresh   # migrate:fresh --seed
make test    # php artisan test
```

## Troubleshooting
- Puerto 3306 en uso: cambia mapeo a `3307:3306` en `docker/compose.yml` y ajusta tu cliente local si lo usas.
- Vite en otro puerto: `pnpm dev --port 5174` y actualiza `VITE_PORT` en `.env`.
- Si no usas Redis/Mailpit aún: en `.env` pon `CACHE_DRIVER=file`, `SESSION_DRIVER=file`, `QUEUE_CONNECTION=sync` y comenta servicios.
