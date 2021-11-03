<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Constant\StatusCodeConstant;
use App\Domain\User\Services\AuthorizeAccessUserService;
use App\Exceptions\AlreadyExistException;
use App\Exceptions\UnauthorizedAccessException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Providers\RouteServiceProvider;
use App\UseCase\User\Inputs\UserCreateInput;
use App\UseCase\User\Inputs\UserDeleteInput;
use App\UseCase\User\Inputs\UserShowInput;
use App\UseCase\User\Inputs\UserUpdateInput;
use App\UseCase\User\Interactors\UserInteractor;
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
     * @param UserInteractor             $userInteractor
     */
    public function __construct(UserInteractor $userInteractor)
    {
        $this->userInteractor = $userInteractor;
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function showUser(int $id): JsonResponse
    {
        try {
            $userShowInput = new UserShowInput(
                (int)auth()->id(),
                $id
            );

            $userGetByOutput = $this->userInteractor->showUser($userShowInput);
        } catch (UnauthorizedAccessException $e) {
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
        } catch (AlreadyExistException $e) {
            return response()->json(['error' => $e->getMessage()], StatusCodeConstant::CONFLICT);
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
            $validated = $userUpdateRequest->validated();

            $userUpdateInput = new UserUpdateInput(
                (int)auth()->id(),
                $id,
                $validated['name'],
                $validated['email_address'],
                $validated['password']
            );

            $userUpdateResponse = $this->userInteractor->updateUser($userUpdateInput);
        } catch (UnauthorizedAccessException $e) {
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
            $userDeleteInput = new UserDeleteInput(
                (int)auth()->id(),
                $id
            );

            $this->userInteractor->deleteUser($userDeleteInput);
        } catch (UnauthorizedAccessException $e) {
            return response()->json(['error' => $e->getMessage()], StatusCodeConstant::FORBIDDEN);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['error' => 'ユーザの削除に失敗しました'], StatusCodeConstant::BAD_REQUEST);
        }

        // ユーザの削除後に，認証前URLリダイレクトします．
        return redirect(RouteServiceProvider::UNAUTHENTHICATED);
    }
}
