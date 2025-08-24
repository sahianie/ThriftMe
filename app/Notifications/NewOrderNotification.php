<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message'    => 'Rental order placed by ' . $this->booking->username,
            'booking_id' => $this->booking->id,
            'user_id'    => $this->booking->user_id,
            'rental_id'  => $this->booking->rental_id,
            'start_date' => $this->booking->start_date,
            'total_days' => $this->booking->total_days,
        ];
    }
}
