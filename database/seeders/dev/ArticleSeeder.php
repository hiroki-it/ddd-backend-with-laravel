<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Infrastructure\Article\DTOs\ArticleDTO;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    private const NUM_TEST_DATA = 3;

    /**
     * @return void
     */
    public function run()
    {
        ArticleDTO::factory()->count(self::NUM_TEST_DATA)->create();
    }
}
