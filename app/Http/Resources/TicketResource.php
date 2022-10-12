<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'question' => $this->question,
            'details' => $this->details,
            'student' => $this->Student->name,
            'tutor' => $this->Tutor->name,
            'subject' => $this->Subject->subject,
            'status' => $this->status,
            'created' => $this->created_at
        ];
    }
}
