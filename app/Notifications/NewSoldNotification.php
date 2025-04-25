<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewSoldNotification extends Notification
{
    use Queueable;

    protected $sold;

    public function __construct($sold)
    {
        $this->sold = $sold;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'New thrift item sold by ' . $this->sold->username,
            'sold_id' => $this->sold->id,
            'thrift_id' => $this->sold->thrift_id,
            'user_id' => $this->sold->user_id,
            'total_amount' => $this->sold->total_amount,
        ];
    }
}
