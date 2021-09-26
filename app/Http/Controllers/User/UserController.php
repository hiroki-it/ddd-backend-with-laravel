<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Constant\StatusCodeConstant;
use App\Exceptions\AuthorizationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Providers\RouteServiceProvider;
use App\UseCase\User\Inputs\UserCreateInput;
use App\UseCase\User\Inputs\UserDeleteInput;
use App\UseCase\User\Inputs\UserShowInput;
use App\UseCase\User\Inputs\UserUpdateInput;
use App\UseCase\User\Interactors\UserInteractor;
use App\UseCase\User\Services\Authorizers\UserAuthorizer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
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
     * @var UserAuthorizer
     */
    private UserAuthorizer $userAuthorizer;

    /**
     * @param UserInteractor $userInteractor
     * @param UserAuthorizer $userAuthorizer
     */
    public function __construct(UserInteractor $userInteractor, UserAuthorizer $userAuthorizer)
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
        } catch (AuthorizationException $e) {
            return response()->json(['error' => $e->getMessage()], StatusCodeConstant::FORBIDDEN);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['error' => 'ユーザの閲覧に失敗しました'], StatusCodeConstant::BAD_REQUEST);
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
            report($e);
            return response()->json(['error' => 'ユーザの作成に失敗しました'], StatusCodeConstant::BAD_REQUEST);
        }

        return response()->json($userCreateOutput->toArray());
    }


    /**
     * @param UserUpdateRequest $userUpdateRequest
     * @param int               $id
     * @return JsonResponse
     */
    public function updateUser(UserUpdateRequest $userUpdateRequest, int $id): JsonResponse
    {
        try {
            $userId = (int)auth()->id();

            $this->userAuthorizer->canUpdateUser($userId, $id);

            $validated = $userUpdateRequest->validated();

            $userUpdateInput = new UserUpdateInput(
                $userId,
                $validated['name'],
                $validated['email_address'],
                $validated['password']
            );

            $userUpdateResponse = $this->userInteractor->updateUser($userUpdateInput);
        } catch (AuthorizationException $e) {
            return response()->json(['error' => $e->getMessage()], StatusCodeConstant::FORBIDDEN);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['error' => 'ユーザの更新に失敗しました'], StatusCodeConstant::BAD_REQUEST);
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
        } catch (AuthorizationException $e) {
            return response()->json(['error' => $e->getMessage()], StatusCodeConstant::FORBIDDEN);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['error' => 'ユーザの削除に失敗しました'], StatusCodeConstant::BAD_REQUEST);
        }

        // ユーザの削除後に，認証前URLリダイレクトします．
        return redirect(RouteServiceProvider::UNAUTHENTHICATED);
    }
}
