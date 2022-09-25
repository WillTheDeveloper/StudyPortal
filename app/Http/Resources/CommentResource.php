<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment' => $this->comment,
            'user' => $this->User->name,
            'post' => [
                'title' => $this->Post->title,
                'user' => $this->Post->User->name,
                'created' => $this->Post->created_at
            ],
            'commented' => $this->created_at
        ];
    }
}
