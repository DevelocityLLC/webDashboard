<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{

    public function toArray($request)
    {
        return [
           'id'            => $this->id,
            'title'         => $this->title,

            'branch_id'        => $this->branch_id,
            'branch' => new BranchResource($this->branch) ,

            'admin_id'         => $this->admin_id,
            'admin'         => new AdminResource( $this->admin),

            'sections'      => SectionResource::collection($this->sections),

            'users'         => UserResource::collection($this->users),
            'desc'          => $this->desc,
            'img'           => url('/Attachments/tasks/' . $this->img),
            'status'        => $this->status,
            'start_date'    => $this->start_date,
            'end_date'      => $this->end_date
        ];
    }
}
