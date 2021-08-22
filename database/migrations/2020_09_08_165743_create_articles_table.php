<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * articleテーブル
 */
class CreateArticlesTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('article_id')->comment('ID');
            $table->string('article_title', 255)->comment('タイトル');
            $table->integer('article_type')->comment('区分');
            $table->mediumText('article_content')->comment('本文');

            $table->systemColumns();

            $table->softDeletes()->comment('レコードの削除日');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
