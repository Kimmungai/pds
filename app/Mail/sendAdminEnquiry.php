<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Enquiry;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendAdminEnquiry extends Mailable
{
    use Queueable, SerializesModels;
    public $enquiry;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enquiry $enquiry)
    {
        $this->enquiry=$enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendAdminEnquiry');
    }
}
