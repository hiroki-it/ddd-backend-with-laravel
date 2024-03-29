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
            $table->bigIncrements('id')->comment('ID');
            $table->unsignedBigInteger('user_id')->nullable()->comment('ユーザID');
            $table->string('title', 255)->comment('タイトル');
            $table->integer('type')->comment('区分');
            $table->mediumText('content')->comment('本文');

            $table->systemColumns();

            $table->softDeletes()->comment('レコードの削除日');

            // user_idに外部キー制約を課す．
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
