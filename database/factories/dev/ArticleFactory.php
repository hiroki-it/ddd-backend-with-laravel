<?php

declare(strict_types=1);

namespace Database\Factories\Infrastructure\DTO;

use App\Domain\Article\ValueObjects\ArticleType;
use App\Infrastructure\Article\DTOs\ArticleDTO;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = ArticleDTO::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'title'   => $this->faker->sentence(20),
            'type'    => $this->faker->numberBetween(1, 2),
            'content' => $this->faker->text(50),
        ];
    }
}
