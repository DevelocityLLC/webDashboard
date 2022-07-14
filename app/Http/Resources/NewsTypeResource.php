<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsTypeResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'title' => $this->title ,

        ];
    }
}
