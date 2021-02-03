<?php

declare(strict_types=1);

use App\Domain\ValueObject\Article\ArticleType;
use App\Infrastructure\DTO\Article as ArticleDTO;
use Faker\Generator as Faker;
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

$factory->define(ArticleDTO::class, function (Faker $faker) {

    return [
        'title'   => $faker->sentence(20),
        'type'    => ArticleType::getRandomValue(),
        'content' => $faker->text(50),
    ];
});
