<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Mailmessege extends Notification
{
    use Queueable;

     protected $user;
     protected $subject;
     protected $messege;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$subject,$messege)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->messege = $messege;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user =$this->user;
        $subject =$this->subject;
        $messege =$this->messege;
        return (new MailMessage)->markdown('mail.sendmail',compact('user','subject','messege'))
        ->subject($subject);
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
            //
        ];
    }
}
