<?php

declare(strict_types=1);

use App\Infrastructure\DTO\User as UserDTO;
use Illuminate\Database\Seeder;

/**
 * ユーザシーダークラス
 */
class TestUserSeeder extends Seeder
{
    /**
     * シーダーを実行します．
     *
     * @return void
     */
    public function run()
    {
        factory(UserDTO::class)->create();
    }
}
