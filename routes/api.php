<?php

declare(strict_types=1);

use App\Http\Authenticators\AuthenticationController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\UserController;

Route::group(['middleware' => ['auth:web']], function () {
    // ホーム
    Route::group(['prefix' => 'home'], function () {
        Route::get('/', [HomeController::class, 'indexHome']);
    });

    // ユーザ
    Route::group(['prefix' => 'users'], function () {
        Route::get('/{id}', [UserController::class, 'showUser']);
        Route::put('/{id}', [UserController::class, 'updateUser']);
        Route::delete('/{id}', [UserController::class, 'deleteUser']);
    });

    // 記事
    Route::group(['prefix' => 'articles'], function () {
        Route::get('/{id}', [ArticleController::class, 'showArticle']);
        Route::get('/', [ArticleController::class, 'indexArticle']);
        Route::post('/', [ArticleController::class, 'createArticle']);
        Route::put('/{id}', [ArticleController::class, 'updateArticle']);
        Route::delete('/{id}', [ArticleController::class, 'deleteArticle']);
    });

    // 認証解除
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
