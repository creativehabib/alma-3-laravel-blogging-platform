<?php

namespace App\Notifications\Comment;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentReplyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Comment $comment,
    ) {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type' => 'comment_reply',
            'user' => [
                'name' => $this->comment->user->name,
                'nickname' => $this->comment->user->username,
                'avatar' => $this->comment->user->getAvatar(),
            ],
            'comment' => [
                'id' => $this->comment->id,
                'parent_id' => $this->comment->parent_id,
                'body' => $this->comment->comment,
            ],
            'story' => [
                'id' => $this->comment->commentable_id,
                'title' => $this->comment->commentable->title,
                'slug' => $this->comment->commentable->slug,
            ],
        ];
    }
}
