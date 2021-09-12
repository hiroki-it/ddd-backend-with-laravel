<?php

declare(strict_types=1);

namespace Database\Factories\Infrastructure\DTO;

use App\Infrastructure\User\DTOs\UserDTO;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
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
            'name'          => 'test',
            'email_address' => 'test@gmail.com',
            'password'      => 'test',
        ];
    }
}
