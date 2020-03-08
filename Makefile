# constants. For Avoid executing docker-compose exec as root.
export UID = $(shell id -u)
export GID = $(shell id -g)

# docker-compose up -d
.PHONY: up
up:
	docker-compose up -d

# docker-compose ps
.PHONY: ps
ps:
	docker-compose ps

# docker-compose stop
.PHONY: stop
stop:
	docker-compose stop

# docker-compose restart
.PHONY: restart
restart:
	@make stop
	@make up

# docker-compose down
.PHONY: down
down:
	docker-compose down

# Remove container, network, volumes, images
.PHONY: destroy
destroy:
	docker-compose down --rmi all --volumes

# Install laravel project from dependencies and initialize environments.
.PHONY: install
install:
	cp .env.example .env
	docker-compose up -d --build
	@make composer-install
	@make yarn-install
	docker-compose exec app php artisan key:generate
	@make restart
	@make migrate
	@echo Install ${APP_NAME} successfully finished!

# Reinstall laravel peoject.
.PHONY: reinstall
reinstall:
	@make destroy
	@make install

# Update dependencies.
.PHONY: update
update:
	@make composer-install
	@make yarn-install
	@make db-fresh
	@make restart

# Attach an app container.
.PHONY: app
app:
	docker-compose exec -u $(UID):$(GID) app bash

# Attach a node container.
.PHONY: node
node:
	docker-compose exec node sh

# Attach a mysql container.
.PHONY: mysql
mysql:
	docker-compose exec mysql bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'

# Attach a redis container.
.PHONY: redis
redis:
	docker-compose exec redis redis-cli

# Exec composer install
.PHONY: composer-install
composer-install:
	docker-compose exec app composer install

# Exec yarn install
.PHONY: yarn-install
yarn-install:
	docker-compose exec node yarn

# Exec migrate.
.PHONY: migrate
migrate:
	docker-compose exec app php artisan migrate --seed

# Exec fresh db with seeding.
.PHONY: db-fresh
db-fresh:
	docker-compose exec app php artisan migrate:fresh --seed

# Clear all cache.
.PHONY: opt-clear
opt-clear:
	docker-compose exec app php artisan optimize:clear

# Scale queue worker containers. # e.g make worker-scale num=3
.PHONY: scale-worker
NUM=1
ifdef num
  NUM=${num}
endif
scale-worker:
	docker-compose up -d --scale queue_worker=${NUM}

# restart queue worker container.
.PHONY: queue-restart
queue-restart:
	docker-compose restart queue_worker

# Open tinker interface.
.PHONY: tinker
tinker:
	docker-compose exec app php artisan tinker

# Run tests.
.PHONY: test
test:
	docker-compose exec app vendor/bin/phpunit

# Run dusk tests
.PHONY: dusk
dusk:
	docker-compose exec app php artisan dusk

# chown app dirctory (for lunux distribution user).
.PHONY: chown
chown:
	sudo chown -R $(UID):$(GID) ../$(shell basename `pwd`)

# chmod storage and bootstrap/cache dirctory.
.PHONY: writable
writable:
	docker-compose exec app chmod -R 777 storage/ && chmod -R 777 bootstrap/cache
