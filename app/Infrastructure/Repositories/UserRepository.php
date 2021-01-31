<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Criteria\UserCriteria;
use App\Domain\Entity\User\User;
use App\Domain\Repositories\UserRepository as DomainUserRepository;
use App\Infrastructure\DTO\User as UserDTO;
use Illuminate\Support\Facades\DB;

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
     * @return void
     */
    public function create(User $user): void
    {
        DB::transaction(function () use ($user) {

            $this->userDTO
                ->create([
                    'name'         => $user->name(),
                    'emailAddress' => $user->emailAddress(),
                    'password'     => $user->password()
                ]);
        });
    }

    /**
     * @param User $user
     * @return void
     */
    public function update(User $user): void
    {
        $userDTO = $this->userDTO
            ->find($user->id());

        $userDTO->fill([
            'name'         => $user->name(),
            'emailAddress' => $user->emailAddress(),
            'password'     => $user->password()
        ]);

        DB::transaction(function () use ($userDTO) {

            $userDTO->save();
        });
    }

    /**
     * @param User $user
     * @return void
     */
    public function delete(User $user): void
    {
        $userDTO = $this->userDTO
            ->find($user->id());

        DB::transaction(function () use ($userDTO) {

            $userDTO->delete();
        });
    }
}
