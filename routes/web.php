<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * ルーティング定義
 *
 * RouteServiceProviderのboot()でパターンフィルタを定義している．
 */
Route::group(['namespace' => 'Article'], (function() {
    Route::get('/articles', 'ArticleController@findArticle');
    Route::get('/articles/{id}', 'ArticleController@showArticle')->middleware('article.id.converter');
    Route::post('/articles', 'ArticleController@createArticle');
    Route::put('/articles/{id}', 'ArticleController@updateArticle')->middleware('article.id.converter');
    Route::delete('/articles/{id}', 'ArticleController@deleteArticle')->middleware('article.id.converter');
}));
