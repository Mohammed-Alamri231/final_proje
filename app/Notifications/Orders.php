<?php

namespace App\Notifications;

use App\comp_info;
use App\head_billpru;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;

class Orders extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
   public $id_bill;
    public function __construct()//
    {
         //$this->id_bill = $id_bill;
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

    // /**
    //  * Get the mail representation of the notification.
    //  *
    //  * @param  mixed  $notifiable
    //  * @return \Illuminate\Notifications\Messages\MailMessage
    //  */
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
    public function toArray($notifiable)
    {
        $id_billpru = DB::table('head_billprus')->max('id_billpru');
        return [
            'data' => 'We have new order no:'.$id_billpru."<br> order by".admin()->user()->name
           // 'data' => 'We have new order no:'
        ];
    }
}
