<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * failed_jobsテーブル
 */
class CreateFailedJobsTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('connection');

            $table->text('queue');

            $table->longText('payload');

            $table->longText('exception');

            $table->timestamp('failed_at')
                ->useCurrent();

            $table->systemColumns();

            $table->softDeletes();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
