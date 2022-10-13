<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'slug' => $this->slug,
            'user' => $this->User->name,
            'price' => $this->price,
            'shipping' => $this->shipping,
            'active' => $this->active,
            'created' => $this->created_at
        ];
    }
}
