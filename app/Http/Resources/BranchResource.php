<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'lat' => $this->lat ,
            'lng' => $this->lng ,
            'location' => $this->location ,
            'img' => url('/Attachments/branches/'.$this->img) ,
        ];
    }
}
