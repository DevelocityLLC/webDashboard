<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'branch_id' => $this->branch_id ,
            'branch' => new DefultResource($this->branch) ,


        ];
    }
}
