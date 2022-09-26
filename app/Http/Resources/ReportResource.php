<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'post' => $this->post_id,
            'user' => $this->User->name,
            'reason' => $this->reason,
            'severity' => $this->severity,
            'comment' => $this->comment,
            'reported' => $this->created_at,
            'resolved' => $this->resolved,
            'this' => $this->id
        ];
    }
}
