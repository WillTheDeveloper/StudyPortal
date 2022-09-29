<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebhookResource extends JsonResource
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
            'url' => $this->url,
            'user' => $this->User->name,
            'active' => $this->active,
            'triggers' => [
                'posts' => $this->posts,
                'comments' => $this->comments,
                'assignments' => $this->assignments,
                'blog' => $this->blog
            ]
        ];
    }
}
