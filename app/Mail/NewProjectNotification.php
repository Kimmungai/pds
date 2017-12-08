<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewProjectNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $project;
    public $bidder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client,$project,$bidder)
    {
      $this->client=$client;
      $this->project=$project;
      $this->bidder=$bidder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      if($this->project['projectType']['feature9']!='' && $this->project['projectType']['feature10']!='' && $this->project['projectType']['feature11']!='')
      {
        return $this->view('emails.NewProjectNotification')->attach(asset($this->project['projectType']['feature9']),['as'=>'technical specification doc 1','mime'=>'application/pdf'])->attach(asset($this->project['projectType']['feature10']),['as'=>'technical specification doc 2','mime'=>'application/pdf'])->attach(asset($this->project['projectType']['feature11']),['as'=>'technical specification doc 3','mime'=>'application/pdf']);
      }
      else if($this->project['projectType']['feature9']=='' && $this->project['projectType']['feature10']!='' && $this->project['projectType']['feature11']!='')
      {
        return $this->view('emails.NewProjectNotification')->attach(asset($this->project['projectType']['feature10']),['as'=>'technical specification doc 2','mime'=>'application/pdf'])->attach(asset($this->project['projectType']['feature11']),['as'=>'technical specification doc 3','mime'=>'application/pdf']);
      }
      else if($this->project['projectType']['feature9']=='' && $this->project['projectType']['feature10']=='' && $this->project['projectType']['feature11']!='')
      {
        return $this->view('emails.NewProjectNotification')->attach(asset($this->project['projectType']['feature11']),['as'=>'technical specification doc 3','mime'=>'application/pdf']);
      }
      else if($this->project['projectType']['feature9']!='' && $this->project['projectType']['feature10']=='' && $this->project['projectType']['feature11']!='')
      {
        return $this->view('emails.NewProjectNotification')->attach(asset($this->project['projectType']['feature9']),['as'=>'technical specification doc 1','mime'=>'application/pdf'])->attach(asset($this->project['projectType']['feature11']),['as'=>'technical specification doc 3','mime'=>'application/pdf']);
      }
      else if($this->project['projectType']['feature9']!='' && $this->project['projectType']['feature10']!='' && $this->project['projectType']['feature11']=='')
      {
        return $this->view('emails.NewProjectNotification')->attach(asset($this->project['projectType']['feature9']),['as'=>'technical specification doc 1','mime'=>'application/pdf'])->attach(asset($this->project['projectType']['feature10']),['as'=>'technical specification doc 2','mime'=>'application/pdf']);
      }
      else if($this->project['projectType']['feature9']=='' && $this->project['projectType']['feature10']!='' && $this->project['projectType']['feature11']=='')
      {
        return $this->view('emails.NewProjectNotification')->attach(asset($this->project['projectType']['feature10']),['as'=>'technical specification doc 2','mime'=>'application/pdf']);
      }
      else if($this->project['projectType']['feature9']!='' && $this->project['projectType']['feature10']!='' && $this->project['projectType']['feature11']=='')
      {
        return $this->view('emails.NewProjectNotification')->attach(asset($this->project['projectType']['feature9']),['as'=>'technical specification doc 1','mime'=>'application/pdf'])->attach(asset($this->project['projectType']['feature10']),['as'=>'technical specification doc 2','mime'=>'application/pdf']);
      }
      else
      {
        return $this->view('emails.NewProjectNotification');
      }
    }
}
