# composer install
composer-install:
	COMPOSER_MEMORY_LIMIT=-1 composer install --prefer-dist -vvv

# composer update
composer-update:
	COMPOSER_MEMORY_LIMIT=-1 composer update --prefer-dist -vvv

# 全てのキャッシュを削除します．
clear-cache:
	php artisan cache:clear \
		&& php artisan config:clear \
		&& php artisan event:clear \
		&& php artisan route:clear \
		&& php artisan view:clear

# DBレコードを全て削除し，テストデータを挿入します．
fresh-seed-db:
	php artisan migrate:fresh \
		&& php artisan db:seed --class=DatabaseSeeder
