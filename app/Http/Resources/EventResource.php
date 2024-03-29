<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'user' => $this->user->name,
            'notes' => $this->notes,
            'dt_start' => $this->dt_start,
            'dt_end' => $this->dt_end,
        ];
    }
}
