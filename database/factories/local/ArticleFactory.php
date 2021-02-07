<?php

declare(strict_types=1);

namespace Database\Factories\Infrastructure\DTO;

use App\Domain\ValueObject\Article\ArticleType;
use App\Infrastructure\DTO\Article as ArticleDTO;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleDTO::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'   => $this->faker->sentence(20),
            'type'    => ArticleType::getRandomValue(),
            'content' => $this->faker->text(50),
        ];
    }
}
