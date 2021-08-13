<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Repositories;

use App\Domain\User\Repositories\UserRepository as DomainUserRepository;
use App\Domain\User\Entities\User;
use App\Infrastructure\Repository;
use App\Infrastructure\User\DTOs\UserDTO;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * ユーザリポジトリ実装クラス
 */
final class UserRepository extends Repository implements DomainUserRepository
{
    /**
     * ユーザDTOクラス
     *
     * @var UserDTO
     */
    private UserDTO $userDTO;

    /**
     * コンストラクタインジェクション
     *
     * @param UserDTO $userDTO
     */
    public function __construct(UserDTO $userDTO)
    {
        $this->userDTO = $userDTO;
    }

    /**
     * @param User $user
     * @return User
     * @throws Throwable
     */
    public function create(User $user): User
    {
        return DB::transaction(function () use ($user) {
            // ドメインモデルのデータをDTOに詰め替えます．
            $userDTO =  $this->userDTO
                ->create([
                    'name'         => $user->name,
                    'emailAddress' => $user->emailAddress,
                    'password'     => $user->password
                ]);

            // DBアクセス後のDTOをドメインモデルに変換します．
            return $userDTO->toUser();
        });
    }

    /**
     * @param User $user
     * @return User
     * @throws Throwable
     */
    public function update(User $user): User
    {
        $userDTO = $this->userDTO
            ->find($user->id());

        // ドメインモデルのデータをDTOに詰め替えます．
        $userDTO->fill([
            'name'         => $user->name,
            'emailAddress' => $user->emailAddress,
            'password'     => $user->password
        ]);

        return DB::transaction(function () use ($userDTO) {
            $userDTO->save();

            // DBアクセス後のDTOをドメインモデルに変換します．
            return $userDTO->toUser();
        });
    }

    /**
     * @param User $user
     * @return bool
     * @throws Throwable
     */
    public function delete(User $user): bool
    {
        $userDTO = $this->userDTO
            ->find($user->id());

        return DB::transaction(function () use ($userDTO) {
            return $userDTO::delete();
        });
    }
}
