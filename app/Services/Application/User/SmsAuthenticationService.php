<?php

declare(strict_types=1);

namespace App\Services\Application\User;

use App\Domain\Entity\User\User;
use App\Exceptions\SendAuthenticationCodeException;
use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Log;

/**
 * SMS認証サービスクラス
 */
final class SmsAuthenticationService
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
                'PhoneNumber' => $this->user->phoneNumber()->value()
            ]);

        } catch (AwsException $e) {
            Log::error(sprintf(
                    '%s : %s at %s line %s',
                    get_class($e),
                    $e->getMessage(),
                    $e->getFile(),
                    $e->getLine())
            );

            throw $e;

        } catch (Exception $e) {
            Log::error(sprintf(
                    '%s : %s at %s line %s',
                    get_class($e),
                    $e->getMessage(),
                    $e->getFile(),
                    $e->getLine())
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
        return view('message.message-authentication-code', ['authentication_code' => $this->user->authenticationCode()->value()])->render();
    }
}
