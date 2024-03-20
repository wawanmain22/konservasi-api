<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdatePendaratanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pos_id' => $this->pos_id,
            'tanggal' => $this->tanggal,
            'jam_mendarat' => $this->jam_mendarat,
            'mendarat_bertelur' => $this->mendarat_bertelur,
            'mendarat_tdk_bertelur' => $this->mendarat_tdk_bertelur,
            'jumlah_telur' => $this->jumlah_telur,
            'keterangan' => $this->keterangan,
            'updated_at' => $this->updated_at,
        ];
    }
}
