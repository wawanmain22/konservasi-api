<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdatePosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_pos' => $this->nama_pos,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
}
