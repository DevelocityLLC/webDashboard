<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;


class AddRequirement extends Notification
{
    use Queueable;

    private $req ;

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
           'title' => 'New requirements created by ' ,
           'added_by' => auth('user')->user()->name ,
           'status' => 'waiting' ,
           'created_at' => date('d/m/Y')

        ];
    }

}
