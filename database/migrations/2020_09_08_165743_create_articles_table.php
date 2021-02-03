<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * articleテーブルマイグレーションクラス
 */
class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->bigIncrements('id')
                ->comment('ID');

            $table->string('title', 255)
                ->comment('タイトル');

            $table->string('type')
                ->comment('区分');

            $table->mediumText('content')
                ->comment('本文');

            $table->systemColumns();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
