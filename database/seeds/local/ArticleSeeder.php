<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Infrastructure\DTO\Article as ArticleDTO;
use Illuminate\Database\Seeder;

/**
 * テスト記事シーダークラス
 */
class ArticleSeeder extends Seeder
{
    /**
     * シーダーを実行します．
     *
     * @return void
     */
    public function run()
    {
        ArticleDTO::factory()->count(3)->create();
    }
}
