<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Infrastructure\Article\DTOs\ArticleDTO;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleDTOFactory extends Factory
{
    private int $userIdIncrement = 0;

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
            'user_id' => $this->userIdIncrement++ ,
            'title'   => $this->faker->sentence(20),
            'type'    => $this->faker->numberBetween(1, 2),
            'content' => $this->faker->text(50),
        ];
    }
}
