<?php

use Illuminate\Support\Facades\Route;

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
 * 認証前
 */
Route::group(['namespace' => 'Auth'], (function () {
    Route::get('/register', 'RegisteredUserController@create');
    Route::post('/register', 'RegisteredUserController@store');
    Route::get('/login', 'AuthenticatedSessionController@create');
    Route::post('/login', 'AuthenticatedSessionController@store');
}));

/**
 * 認証後
 */
Route::group(['middleware' => 'auth'], (function () {

    /**
     * 記事
     */
    Route::group(['namespace' => 'Article'], (function () {
        Route::get('/articles', 'ArticleController@showArticleList');
        Route::get('/articles/{id}/detail/', 'ArticleController@showArticleDetail')->middleware('article.id.converter');
        Route::get('/articles/{id}/edited/', 'ArticleController@showEditedArticle')->middleware('article.id.converter');
        Route::post('/articles', 'ArticleController@createArticle');
        Route::put('/articles/{id}', 'ArticleController@updateArticle')->middleware('article.id.converter');
        Route::delete('/articles/{id}', 'ArticleController@deleteArticle')->middleware('article.id.converter');
    }));
}));

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
//require __DIR__.'/auth.php';
