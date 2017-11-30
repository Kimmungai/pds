<?php

namespace App\Mail;
use App\user;
use App\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class winnerNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Project $project)
    {
        $this->user=$user;
        $this->project=$project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.winnerNotification');
    }
}
