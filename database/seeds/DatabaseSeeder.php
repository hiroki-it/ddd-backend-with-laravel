<?php

declare(strict_types=1);

namespace Database\dev;

use Database\Seeders\ArticleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
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
