<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
//
// use App\Listeners\LogNotification;
// use App\Notifications\AgendamentoPendente;
// use ReflectionClass;
// use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailer;
use Illuminate\Http\Request;
use App\Mail; 

class InvoicePaid extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // dd("not now");
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
        // dd($notifiable);
        $url = url('http://laravel.local/');

        return (new MailMessage)
                    ->subject('Notification Subject')
                    ->greeting('Hello!')
                    ->line('You are now one of our family')
                    ->action('View website', $url)
                    ->line('Thank you for using our website!');
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
