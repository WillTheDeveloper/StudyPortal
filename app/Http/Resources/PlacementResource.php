<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlacementResource extends JsonResource
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
            'company' => $this->company,
            'location' => $this->location,
            'role' => $this->role,
            'user' => $this->User->name,
            'slug' => $this->slug,
            'open' => $this->open,
            'active' => $this->active,
            'closing' => $this->closing->diffForHumans()
        ];
    }
}
