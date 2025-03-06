<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookingNotification extends Notification
{
    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Booking Request - '.config('app.name'))
            ->greeting('Hello!')
            ->line('A new booking request has been received.')
            ->line('Booking Details:')
            ->line('Customer Name: '.$this->booking->name)
            ->line('Customer Email: '.$this->booking->email)
            ->line('Customer Phone: '.$this->booking->mobile)
            ->line('Service: '.$this->booking->service->name)
            ->line('Date and Time: '.$this->booking->date_and_time)
            ->action('View Booking', url('/admin/bookings/'.$this->booking->id))
            ->line('Please review and update the booking status as needed.');
    }
}
