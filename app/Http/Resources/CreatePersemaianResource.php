<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CreatePersemaianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'pendaratan_id' => $this->pendaratan_id,
            'penyu_id' => $this->penyu_id,
            'tanggal' => $this->tanggal,
            'no_sarang' => $this->no_sarang,
            'jumlah_telur' => $this->jumlah_telur,
            'keterangan' => $this->keterangan,
            'created_at' => $this->created_at,
        ];
    }
}
