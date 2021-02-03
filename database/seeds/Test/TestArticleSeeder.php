<?php

declare(strict_types=1);

use App\Infrastructure\DTO\Article as ArticleDTO;
use Illuminate\Database\Seeder;

/**
 * テスト記事シーダークラス
 */
class TestArticleSeeder extends Seeder
{
    /**
     * シーダーを実行します．
     *
     * @return void
     */
    public function run()
    {
        factory(ArticleDTO::class, 3)->create();
    }
}
