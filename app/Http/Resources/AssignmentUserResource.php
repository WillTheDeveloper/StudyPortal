<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentUserResource extends JsonResource
{
    // WORK IN PROGRESS - ONLY WANT TO SHOW USER'S NAME INSIDE PIVOT TABLE

    public function toArray($request)
    {
        return [
            'title' => $this->title,
            /*'students' => $this->User->toArray()*/
        ];
    }
}
