# composer install
composer-install:
	docker-compose exec app env COMPOSER_MEMORY_LIMIT=-1 composer install --prefer-dist -vvv

# composer update
composer-update:
	docker-compose exec app env COMPOSER_MEMORY_LIMIT=-1 composer update -vvv

# 全てのキャッシュを削除します．
clear-all-cache:
	docker-compose exec app sh \
		-c "php artisan cache:clear \
		&& php artisan config:clear \
		&& php artisan route:clear \
		&& php artisan view:clear"
