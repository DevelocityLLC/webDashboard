<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AddTask extends Notification
{
    use Queueable;
    private $task;

    public function __construct($task)
    {
        $this->task = $task;
    }


    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $user = $this->task->users ;
        return [

           'id' => $this->task->id ,
           'title' => ' تم اضافه تاسك  جديد بواسطه : ',
           'added_by' => auth('admin')->user()->admin_name,
           'created_at' => date('d/m/Y') ,
           'status' => 'waiting' ,

        ];
    }





}
