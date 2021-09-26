<?php

declare(strict_types=1);

use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\User\UserController;

Route::get('/', [AuthenticationController::class, 'index']);

Route::post('/register', [UserController::class, 'createUser']);

Route::post('/', [AuthenticationController::class, 'login']);
