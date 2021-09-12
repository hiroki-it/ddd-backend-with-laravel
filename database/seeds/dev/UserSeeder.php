<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Infrastructure\User\DTOs\UserDTO;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private const NUM_TEST_DATA = 3;

    /**
     * @return void
     */
    public function run()
    {
        UserDTO::factory()->count(self::NUM_TEST_DATA)->create();
    }
}
