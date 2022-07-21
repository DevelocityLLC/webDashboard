<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            //'title' => $this->title ,
            'message' => $this->message ,
            'type' => $this->type ,
            'user_id' => $this->user_id ,
            'user'   => new UserResource($this->user),
            //'task_id' => $this->task_id ,
            'date'                  => $this->created_at->diffForHumans()
        ];
    }
}
