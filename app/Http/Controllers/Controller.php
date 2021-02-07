<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * コントローラクラス
 *
 * アプリケーション層ではFacadeを使用しないでください．
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
