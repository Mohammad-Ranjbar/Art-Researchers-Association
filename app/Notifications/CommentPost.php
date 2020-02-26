<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentPost extends Notification
{
    use Queueable;
    public $user;
    public $forum;

    public function __construct($user, $forum)
    {
        $this->user  = $user;
        $this->forum = $forum;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->user->name . ' به پست  ' . $this->forum->title . '  نظر داد.',
            'url'     => '/forum/'. $this->forum->id,
        ];
    }
}
