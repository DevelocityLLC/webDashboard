<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangStatusRequirement extends Notification
{
    use Queueable;

    private $req;
    public function __construct($req)
    {
        $this->req = $req;
    }


    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
           'id' => $this->req->id ,
           'title' => 'Status' ,
           'status' => $this->req->status ,
           'added_by' => auth('admin')->user()->admin_name ,
           'created_at' => date('d/m/Y')
        ];
    }
}
