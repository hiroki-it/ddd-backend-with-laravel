<?php

declare(strict_types=1);

namespace App\UseCase;

use App;

/**
 * アプリケーションサービス基底クラス
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

     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }
}
