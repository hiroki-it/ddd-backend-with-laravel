<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * userテーブルマイグレーションクラス
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id')
                ->comment('ID');

            $table->string('name')
                ->comment('名前');

            $table->string('email_address')
                ->comment('メールアドレス');

            $table->string('phone_number')
                ->comment('電話番号');

            $table->string('password')
                ->comment('メールアドレス');

            $table->string('authentication_code')
                ->comment('認証コード')
                ->nullable();

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
        Schema::dropIfExists('users');
    }
}
