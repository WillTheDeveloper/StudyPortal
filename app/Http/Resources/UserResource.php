<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'admin' => $this->is_admin,
            'moderator' => $this->is_moderator,
            'tutor' => $this->is_tutor,
            'banned' => $this->is_banned,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
