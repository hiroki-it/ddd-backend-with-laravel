<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\UseCase\User\Requests\UserCreateInput;
use App\UseCase\User\Interactors\UserInteractor;
use Illuminate\Http\JsonResponse;
use Throwable;

/**
 * ユーザコントローラクラス
 */
final class UserController extends Controller
{
    /**
     * ユースケースクラス
     *
     * @var UserInteractor
     */
    private UserInteractor $userInteractor;

    /**

     * @param UserInteractor $userInteractor
     */
    public function __construct(UserInteractor $userInteractor)
    {
        $this->userInteractor = $userInteractor;
    }

    /**
     * ユーザを作成します．
     *
     * @param UserRequest $userRequest
     * @return JsonResponse
     */
    public function createUser(UserRequest $userRequest): JsonResponse
    {
        try {
            $validated = $userRequest->validated();

            $userCreateInput = new UserCreateInput(
                $validated['name'],
                $validated['email_address'],
                $validated['phone_number'],
                $validated['password']
            );

            $articleCreateOutput = $this->userInteractor->createUser($userCreateInput);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json($articleCreateOutput->toArray());
    }
}
