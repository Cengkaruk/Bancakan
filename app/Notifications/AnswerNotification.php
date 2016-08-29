<?php

namespace App\Notifications;

use App\Answer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AnswerNotification extends Notification
{
    use Queueable;

    protected $answer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $name = $this->answer->anonymouse ? 'Anonymouse' : $this->answer->user->name;
        $message = $this->answer->answer;
        $question_slug = $this->answer->question->slug;

        return (new MailMessage)
            ->line($name . ' was replied your question.')
            ->line("\"$message\"")
            ->action('Reply', route('questions.show', ['slug' => $question_slug]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->answer->toArray();
    }
}
