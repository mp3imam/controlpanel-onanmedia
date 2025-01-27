<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Notifications\CustomChannel;

class NewUserNotification extends Notification
{
    use Queueable;
    public $user;
    private $satker;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $noted, $satker=null)
    {
        // dd($satker);

        $this->user = $user;
        $this->noted = $noted;
        $this->satker = $satker;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [CustomChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'noted' => $this->noted,
            'satker_id' => $this->satker
        ];
    }
}
