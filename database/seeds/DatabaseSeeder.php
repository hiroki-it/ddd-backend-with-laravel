<?php

declare(strict_types=1);

namespace Database\dev;

use Database\Seeders\ArticleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

/**
 * データベースシーダークラス
 */
class DatabaseSeeder extends Seeder
{
    /**
     * 全てのシーダを実行します．
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment("dev")) {
            $this->call([
                ArticleSeeder::class,
                UserSeeder::class,
            ]);
        }
    }
}
