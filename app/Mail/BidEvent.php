<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BidEvent extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $project;
    public $bidder;
    public $bid;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bid,$client,$project,$bidder)
    {
      $this->client=$client;
      $this->project=$project;
      $this->bidder=$bidder;
      $this->bid=$bid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.BidEvent');
    }
}
