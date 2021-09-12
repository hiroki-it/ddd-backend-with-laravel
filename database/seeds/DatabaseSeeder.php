<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        // NOTE: 外部キーが課された子テーブルよりも先に，親テーブルにテストデータが挿入されるようにします．
        if (app()->environment("dev")) {
            $this->call([
                UserSeeder::class,
                ArticleSeeder::class,
            ]);
        }
    }
}
