init:docker-build-up composer-install yarn-install app migration seeder

app:env key

env:
	docker exec blog_market_php-cli_1 cp .env.example .env

key:
	docker exec blog_market_php-cli_1 php artisan key:generate

docker-build-up:
	docker-compose up --build -d

composer-install:
	docker exec blog_market_php-cli_1 composer install

yarn-install:
	docker exec blog_market_node_1 yarn install

migration:
	docker exec blog_market_php-cli_1 php artisan migrate

seeder:
	docker exec blog_market_php-cli_1 php artisan db:seed

seeder-fresh:
	docker exec blog_market_php-cli_1 php artisan migrate:fresh --seed

unban:
	docker exec blog_market_php-cli_1 php artisan ban:delete-expired

docker-down:
	docker-compose down

docker-up:
	docker-compose up -d

docker-restart:docker-down docker-up
