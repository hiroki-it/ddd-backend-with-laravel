<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\UseCase\User\Inputs\UserCreateInput;
use App\UseCase\User\Interactors\UserInteractor;
use Illuminate\Http\JsonResponse;
use Throwable;

/**
 * ユーザコントローラクラス
 */
final class UserController extends Controller
{
    /**
     * @var UserInteractor
     */
    private UserInteractor $userInteractor;

    /**
     * @param UserInteractor $userInteractor
     */
    public function __construct(UserInteractor $userInteractor)
    {
        $this->userInteractor = $userInteractor;
        $this->userAuthorizer = $userAuthorizer;
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function showUser(int $id): JsonResponse
    {
        try {
            $this->userAuthorizer->canShowUser((int)auth()->id(), $id);

            $userShowInput = new UserShowInput($id);

            $userGetByOutput = $this->userInteractor->showUser($userShowInput);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

        return response()->json($userGetByOutput->toArray());
    }

    /**
     * ユーザを作成します．
     *
     * @param UserCreateRequest $userRequest
     * @return JsonResponse
     */
    public function createUser(UserCreateRequest $userRequest): JsonResponse
    {
        try {
            $validated = $userRequest->validated();

            $userCreateInput = new UserCreateInput(
                $validated['name'],
                $validated['email_address'],
                $validated['password']
            );

            $userCreateOutput = $this->userInteractor->createUser($userCreateInput);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json($userCreateOutput->toArray());
    }


    /**
     * @param UserUpdateRequest $userUpdateRequest
     * @param int                  $id
     * @return JsonResponse
     */
    public function updateUser(UserUpdateRequest $userUpdateRequest, int $id): JsonResponse
    {
        try {
            $this->userAuthorizer->canUpdateUser((int)auth()->id(), $id);

            $validated = $userUpdateRequest->validated();

            $userUpdateInput = new UserUpdateInput(
                $validated['name'],
                $validated['email_address'],
                $validated['password']
            );

            $userUpdateResponse = $this->userInteractor->updateUser($userUpdateInput);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

        return response()->json($userUpdateResponse->toArray());
    }

    /**
     * @param int $id
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function deleteUser(int $id)
    {
        try {
            $this->userAuthorizer->canDeleteUser((int)auth()->id(), $id);

            $userDeleteInput = new UserDeleteInput($id);

            $this->userInteractor->deleteUser($userDeleteInput);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

        // ユーザの削除後に，認証前URLリダイレクトします．
        return redirect(RouteServiceProvider::UNAUTHENTHICATED);
    }
}
