<?php

declare(strict_types=1);

namespace App\Services\Application;

use App;

/**
 * アプリケーションサービス抽象クラス
 *
 * サービス層ではFacadeを使用しないでください．
 */
abstract class ApplicationService
{
    /**
     * アプリケーションクラス
     *
     * @var App
     */
    protected App $app;

    /**
     * コンストラクタインジェクション
     *
     * @param App $app
     */
    public function constructor(App $app)
    {
        $this->app = $app;
    }
}
