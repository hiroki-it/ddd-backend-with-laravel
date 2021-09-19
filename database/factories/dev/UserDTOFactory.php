<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Infrastructure\User\DTOs\UserDTO;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDTOFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = UserDTO::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name,
            'email_address' => $this->faker->unique()->safeEmail,
            'password'      => bcrypt('password'),
        ];
    }
}
