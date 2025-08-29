up: ## Levanta el stack en segundo plano
	cd docker && docker compose up -d --build

down: ## Detiene y elimina contenedores
	cd docker && docker compose down

logs: ## Muestra logs agregados
	cd docker && docker compose logs -f --tail=200

fresh: ## Resetea DB y aplica seeders
	cd docker && docker compose exec app php artisan migrate:fresh --seed

test: ## Ejecuta tests de Laravel
	cd docker && docker compose exec app php artisan test
