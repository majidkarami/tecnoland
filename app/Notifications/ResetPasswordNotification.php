<?php

namespace App\Notifications;

use function dd;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;
//    public $user;

    /**
     * Create a new notifications instance.
     *
     * @return void
     */
    public function __construct($token)
    {

        $this->token = $token;
//        $this->user = $user;
    }

    /**
     * Get the notifications's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notifications.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('سلام')
            ->line('لینک زیر به درخواست شما برای بازیابی کلمه عبورتان در سایت موبایل ایران برای شما ارسال شده است.')
            ->action('تغییر کلمه عبور', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('اگر تنظیم مجدد رمز عبور را درخواست نکردید، هیچ اقدام دیگری لازم نیست به وبسایت برگردید.')->subject('تغییر کلمه عبور');
    }

    /**
     * Get the array representation of the notifications.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
