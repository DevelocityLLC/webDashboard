<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskStatus extends Notification
{
    use Queueable;
    private $task ;

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

        return [

           'id' => $this->task->id ,
           'title' => 'The status of the task has been changed to ' ,
           'status' => $this->task->status ,
           'added_by' => auth('user')->user()->name ?? auth('user-api')->user()->name  ,
           'created_at' => date('d/m/Y')

        ];
    }



}
