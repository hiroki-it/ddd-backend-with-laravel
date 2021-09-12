<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Infrastructure\Article\DTOs\ArticleDTO;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        ArticleDTO::factory()->count(3)->create();
    }
}
