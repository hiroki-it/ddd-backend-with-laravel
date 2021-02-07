<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

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
        if(App::environment("local")){
            $this->call([
                ArticleSeeder::class,
                UserSeeder::class,
            ]);
        }
    }
}
