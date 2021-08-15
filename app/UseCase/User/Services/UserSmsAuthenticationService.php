<?php

declare(strict_types=1);

namespace App\UseCase\User\Services;

use App\Domain\User\Entities\User;
use App\Exceptions\Service\SendAuthenticationCodeException;
use App\UseCase\ApplicationService;
use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;

/**
 * SMS認証サービスクラス
 */
final class UserSmsAuthenticationService extends ApplicationService
{
    /**
     * SNSクライアント
     *
     * @var SnsClient
     */
    private SnsClient $snsClient;

    /**
     * ユーザ
     *
     * @var User
     */
    private User $user;

    /**
     * コンストラクタインジェクション
     *
     * @param SnsClient $snsClient
     * @param User      $user
     */
    public function __constructor(SnsClient $snsClient, User $user)
    {
        $this->snsClient = $snsClient;
        $this->user = $user;
    }

    /**
     * SMSに認証コードを送信します．
     *
     * @throws SendAuthenticationCodeException
     */
    public function sendAuthenticationCode()
    {
        try {
            $this->snsClient->SetSMSAttributes([
                'attributes' => [
                    'DefaultSMSType' => 'Transactional'
                ]
            ]);

            $this->snsClient->publish([
                'Message'     => $this->renderMessage(),
                'PhoneNumber' => $this->user->phoneNumber->phoneNumber
            ]);
        } catch (AwsException $e) {
            $this->app["log"]->error(
                sprintf(
                    '%s : %s at %s line %s',
                    get_class($e),
                    $e->getMessage(),
                    $e->getFile(),
                    $e->getLine()
                )
            );

            throw $e;
        } catch (\Throwable $e) {
            $this->app["log"]->error(
                sprintf(
                    '%s : %s at %s line %s',
                    get_class($e),
                    $e->getMessage(),
                    $e->getFile(),
                    $e->getLine()
                )
            );

            throw new SendAuthenticationCodeException($e->getMessage());
        }
    }

    /**
     * 4桁の認証コードを生成します．
     *
     * @return string
     */
    public function generateAuthenticationCode(): string
    {
        return (string)mt_rand(1000, 9999);
    }

    /**
     * メッセージを返却します．
     *
     * @return string
     */
    private function renderMessage(): string
    {
        return view('message.message-authentication-code', ['authentication_code' => $this->user->authenticationCode->authenticationCode])->render();
    }
}
