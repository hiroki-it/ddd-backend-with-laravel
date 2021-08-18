# make cache clear all
cache clear all:
	docker-compose exec app php artisan cache:clear \
		&& php artisan config:clear \
		&& php artisan route:clear \
		&& php artisan view:clear
