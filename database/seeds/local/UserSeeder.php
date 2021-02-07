<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Infrastructure\DTO\User as UserDTO;
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
