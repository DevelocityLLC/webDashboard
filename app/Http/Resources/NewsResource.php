<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'title' => $this->title ,
            'desc' => $this->desc ,
            'img' => url('/Attachments/news/'.$this->img) ,
            'type_id' => $this->type_id ,
            'branch_id' => $this->branch_id ,
        ];
    }
}
