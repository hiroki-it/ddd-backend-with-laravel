<?php

declare(strict_types=1);

Route::group(['middleware' => 'auth'], (function () {

    /**
     * 記事
     */
    Route::group(['namespace' => 'Article'], (function () {
        Route::get('/article/{id}', 'ArticleController@getArticle');
        Route::get('/articles', 'ArticleController@getAllArticles');
        Route::post('/articles', 'ArticleController@createArticle');
        Route::put('/articles/{id}', 'ArticleController@updateArticle');
        Route::delete('/articles/{id}', 'ArticleController@deleteArticle');
    }));
}));
