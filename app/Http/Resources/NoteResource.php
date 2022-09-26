<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
            'uuid' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'note' => $this->note,
            'user' => $this->User->name,
            'private' => $this->private,
            'created' => $this->created_at,
            'updated' => $this->updated_at
        ];
    }
}
