<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BidClosingNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $project;
    public $bidder;
    public $winner;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client,$project,$bidder,$winner)
    {
      $this->client=$client;
      $this->project=$project;
      $this->bidder=$bidder;
      $this->winner=$winner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.BidClosingNotification');
    }
}
