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

Route::namespace('Article')->group(function() {
    Route::get('/article', 'ArticleController@index');
    Route::get('/article/{articleId}', 'ArticleController@findArticle');
    Route::post('/article', 'ArticleController@createArticle');
    Route::put('/article/{articleId}', 'ArticleController@updateArticle');
    Route::delete('/article/{articleId}', 'ArticleController@deleteArticle');
});
