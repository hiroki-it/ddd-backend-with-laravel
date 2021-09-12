<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Infrastructure\User\DTOs\UserDTO;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        UserDTO::factory()->create();
    }
}
