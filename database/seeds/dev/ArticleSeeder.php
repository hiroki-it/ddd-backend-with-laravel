<?php

declare(strict_types=1);

namespace Database\Seeds;

use App\Infrastructure\Article\DTOs\ArticleDTO;
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
