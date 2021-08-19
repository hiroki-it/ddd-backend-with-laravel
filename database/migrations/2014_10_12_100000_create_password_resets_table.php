<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * password_resetsテーブル
 */
class CreatePasswordResetsTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {

            $table->string('email')->index();
            $table->string('token');

            $table->systemColumns();

            $table->softDeletes();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
