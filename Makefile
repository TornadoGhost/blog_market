init:env key composer yarn-install docker-up migration seeder
env:
	copy .env.example .env
key:
	php artisan key:generate
composer:
	composer install
yarn-install:
	yarn install
docker-up:
	docker-compose up -d
migration:
	php artisan migrate
seeder:
	php artisan migrate:fresh --seed
unban:
	php artisan ban:delete-expired
