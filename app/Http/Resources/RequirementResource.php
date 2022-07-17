<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequirementResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->name,
            "price" => $this->price,
            "status" => $this->status,
            "user" => $this->user->name,
            "task" => $this->task->title

        ];
    }
}
