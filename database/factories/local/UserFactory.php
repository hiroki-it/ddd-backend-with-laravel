<?php

declare(strict_types=1);

namespace Database\Factories\Infrastructure\DTO;

use App\Infrastructure\User\DTOs\UserDTO;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDTO::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_name'          => 'test',
            'user_email_address' => 'test@gmail.com',
            'user_password'      => 'test',
        ];
    }
}
