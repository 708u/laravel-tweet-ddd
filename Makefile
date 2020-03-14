# constants. For Avoid executing docker-compose exec as root.
export UID = $(shell id -u)
export GID = $(shell id -g)

.PHONY: up
up: ## docker-compose up -d
	docker-compose up -d

.PHONY: ps
ps: ## docker-compose ps
	docker-compose ps

.PHONY: stop
stop: ## docker-compose stop
	docker-compose stop

.PHONY: restart
restart: ## docker-compose restart
	@make stop
	@make up

.PHONY: down
down: ## docker-compose down
	docker-compose down

.PHONY: destroy
destroy: ## Remove container, network, volumes, images
	docker-compose down --rmi all --volumes

.PHONY: install
install: ## Install laravel project from dependencies and initialize environments.
	cp .env.example .env
	docker-compose up -d --build
	@make composer-install
	@make yarn-install
	docker-compose exec app php artisan key:generate
	@make restart
	@make migrate
	@echo Install ${APP_NAME} successfully finished!

.PHONY: reinstall
reinstall: ## Reinstall laravel peoject.
	@make destroy
	@make install

.PHONY: update
update: ## Update dependencies.
	@make composer-install
	@make yarn-install
	@make db-fresh
	@make restart

.PHONY: app
app: ## Attach an app container.
	docker-compose exec -u $(UID):$(GID) app bash

.PHONY: app-root
app-root: ## Attach an app container as root.
	docker-compose exec app bash

.PHONY: node
node: ## Attach a node container.
	docker-compose exec node sh

.PHONY: mysql
mysql: ## Attach a mysql container.
	docker-compose exec mysql bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'

.PHONY: redis
redis: ## Attach a redis container.
	docker-compose exec redis redis-cli

.PHONY: composer-install
composer-install: ## Exec composer install
	docker-compose exec app composer install

.PHONY: yarn-install
yarn-install: ## Exec yarn install
	docker-compose exec node yarn

.PHONY: migrate
migrate: ## Exec migrate.
	docker-compose exec app php artisan migrate --seed

.PHONY: db-fresh
db-fresh: ## Exec fresh db with seeding.
	docker-compose exec app php artisan migrate:fresh --seed

.PHONY: opt-clear
opt-clear: ## Clear all cache.
	docker-compose exec app php artisan optimize:clear

.PHONY: scale-worker
NUM=1 ## Scale queue worker containers.## e.g make worker-scale num=3
ifdef num
  NUM=${num}
endif
scale-worker:
	docker-compose up -d --scale queue_worker=${NUM}

.PHONY: queue-restart
queue-restart: ## restart queue worker container.
	docker-compose restart queue_worker

.PHONY: tinker
tinker: ## Open tinker interface.
	docker-compose exec app php artisan tinker

.PHONY: test
test: ## Run tests.
	docker-compose exec app vendor/bin/phpunit

.PHONY: dusk
dusk: ## Run dusk tests
	docker-compose exec app php artisan dusk

.PHONY: chown
chown: ## chown app dirctory (for lunux distribution user).
	sudo chown -R $(UID):$(GID) ../$(shell basename `pwd`)

.PHONY: writable
writable: ## chmod storage and bootstrap/cache dirctory.
	docker-compose exec app chmod -R 777 storage/ && chmod -R 777 bootstrap/cache

.PHONY: help
help: ## Display this help screen
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
