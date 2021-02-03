<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

/**
 * マイグレーションマクロサービスプロバイダクラス
 */
class MigrationMacroServiceProvider extends ServiceProvider
{
    /**
     * サービスコンテナにマイグレーションメソッドをバインドします．
     *
     * @return void
     */
    public function register()
    {
        Blueprint::macro('systemColumns', function () {
            $this->string('created_by')
                ->comment('レコードの作成者')
                ->nullable();
            $this->string('updated_by')
                ->comment('レコードの最終更新者')
                ->nullable();
            $this->timestamp('created_at')
                ->comment('レコードの作成日')
                ->nullable();
            $this->timestamp('updated_at')
                ->comment('レコードの最終更新日')
                ->nullable();
        });
    }
}
