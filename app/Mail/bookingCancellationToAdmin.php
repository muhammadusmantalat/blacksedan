<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class bookingCancellationToAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.bookingCancellationToAdmin')
        ->subject('Booking Cancelled | ' . $this->booking->vehicle->name . ' | ' . $this->booking->first_name . ' ' . $this->booking->last_name);
    }
}
