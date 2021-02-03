<?php

declare(strict_types=1);

use App\Infrastructure\DTO\User as UserDTO;
use Illuminate\Database\Eloquent\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/**
 * @var Factory $factory
 */

$factory->define(UserDTO::class, function () {

    return [
        'name'          => 'test',
        'email_address' => 'test@gmail.com',
        'phone_number'  => '09012345678',
        'password'      => 'test',
    ];
});
