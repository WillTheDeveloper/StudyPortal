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
            'username' => $this->username,
            'bio' => $this->bio,
            'created' => $this->created_at,
            'admin' => $this->is_admin
        ];
    }
}
