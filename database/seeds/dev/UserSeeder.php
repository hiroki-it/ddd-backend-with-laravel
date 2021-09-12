<?php

declare(strict_types=1);

namespace Database\dev;

use App\Infrastructure\User\DTOs\UserDTO;
use Illuminate\Database\Seeder;

/**
 * ユーザシーダークラス
 */
class UserSeeder extends Seeder
{
    /**
     * シーダーを実行します．
     *
     * @return void
     */
    public function run()
    {
        UserDTO::factory()->create();
    }
}
