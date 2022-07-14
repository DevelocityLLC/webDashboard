<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'title' => $this->title ,
            'message' => $this->message ,
            'type' => $this->type ,
            'user_id' => $this->user_id ,
            'task_id' => $this->task_id ,

        ];
    }
}
