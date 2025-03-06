<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerBookingNotification extends Notification
{
    private $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $subject = $this->status === 'accepted' ? 'Booking Confirmed!' : 'Booking Status Update';
        $message = $this->status === 'accepted'
            ? 'Your booking has been confirmed. We look forward to seeing you!'
            : 'Unfortunately, we cannot accommodate your booking at this time.';

        return (new MailMessage)
            ->subject($subject)
            ->greeting('Hello!')
            ->line('Thank you for choosing our services.')
            ->line($message)
            ->line('If you have any questions, please don\'t hesitate to contact us.');
    }
}
