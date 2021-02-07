<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
