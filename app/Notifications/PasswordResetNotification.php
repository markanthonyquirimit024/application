<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
{
    use Queueable;

    protected $resetToken;

    /**
     * Create a new notification instance.
     */
    public function __construct($resetToken)
    {
        $this->resetToken = $resetToken;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hello!')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->line('Your Password reset Code is:')
            ->line($this->resetToken)
            ->line('If you did not request a password reset, no further action is required.')
            ->salutation('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'reset_code' => $this->resetToken,

        ];
    }
}
