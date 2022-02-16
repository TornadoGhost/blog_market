init:composer yarn-install env key docker-up migration seeder
composer:
	composer install
yarn-install:
	yarn install
env:
	copy .env.example .env
key:
	php artisan key:generate
docker-up:
	docker-compose up -d
migration:
	php artisan migrate
seeder:
	php artisan migrate:fresh --seed
