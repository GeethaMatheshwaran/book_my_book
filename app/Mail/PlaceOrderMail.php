<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlaceOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Your Subject')
                    ->view('admin.category.create'); // Replace 'emails.place_order' with your blade template
    }
}
