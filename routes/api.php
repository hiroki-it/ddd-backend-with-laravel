<?php

declare(strict_types=1);

use App\Http\Controllers\Article\ArticleController;

Route::group(['prefix' => 'articles'], (function () {
    Route::get('/{id}', [ArticleController::class, 'getArticle']);
    Route::get('/', [ArticleController::class, 'getAllArticles']);
    Route::post('/', [ArticleController::class, 'createArticle']);
    Route::put('/{id}', [ArticleController::class, 'updateArticle']);
    Route::delete('/{id}', [ArticleController::class, 'deleteArticle']);
}));
