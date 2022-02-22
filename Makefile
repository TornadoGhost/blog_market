test:
init:docker-down-clear docker-pull docker-build composer yarn-install up migration seeder
restart: down up
up: docker-up
down: docker-down
composer:
	composer install
yarn-install:
	yarn install
docker-up:
	docker-compose up -d
docker-down:
	docker-compose down --remove-orphans
docker-down-clear:
	docker-compose down -v --remove-orphans
docker-compose:
	docker-compose build --pull
docker-pull:
	docker-compose pull
migration:
	php artisan migrate
seeder:
	php artisan migrate:fresh --seed
unban:
	php artisan ban:delete-expired
