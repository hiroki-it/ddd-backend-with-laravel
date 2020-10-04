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
Route::namespace('Article')->group(function() {
    Route::get('/article', 'ArticleController@index');
    Route::get('/article/{id}', 'ArticleController@findArticle')
        ->middleware('article.id.converter');
    Route::post('/article', 'ArticleController@createArticle');
    Route::put('/article/{id}', 'ArticleController@updateArticle')
        ->middleware('article.id.converter');
    Route::delete('/article/{id}', 'ArticleController@deleteArticle')
        ->middleware('article.id.converter');
});
