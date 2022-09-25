<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'details' => $this->details,
            'due' => $this->duedate,
            'set' => $this->setdate,
            'subject' => $this->Subject->subject,
            'created' => $this->created_at
        ];
    }
}
