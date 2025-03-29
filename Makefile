setup:
	@make build
	@make up 
	@make composer-update
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec laravel-docker bash -c "composer update"
data:
	docker exec app-laravel-v1 bash -c "php artisan migrate"
	docker exec app-laravel-v1 bash -c "php artisan db:seed"
	docker exec app-laravel-v1 bash -c "php artisan migrate:refresh --seed"	
serve:
	docker exec app-laravel-v1 bash -c "php artisan serve"
clear-optimize:
	docker exec app-laravel-v1 bash -c "php artisan optimize:clear"
	docker exec app-laravel-v1 bash -c "php artisan storage:link"

