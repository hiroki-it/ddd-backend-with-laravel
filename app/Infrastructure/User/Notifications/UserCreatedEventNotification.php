<?php

namespace App\Infrastructure\User\Notifications;

use App\Domain\User\Entities\User;
use App\Infrastructure\Notification;
use Illuminate\Notifications\Messages\MailMessage;

final class UserCreatedEventNotification extends Notification
{
    /**
     * @var User
     */
    private User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return array
     */
    public function via(): array
    {
        return ['mail', 'database'];
    }

    /**
     * @param $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())->subject('ユーザ登録が完了いたしました')
             ->markdown('messages.email.userCreatedEmail', [
                 'user_name' => $this->user->userName->name
             ]);
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            'user_email' => $this->user->email->email,
        ];
    }
}
