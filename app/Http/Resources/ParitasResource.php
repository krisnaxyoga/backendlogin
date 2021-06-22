<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParitasResource extends JsonResource
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
            'id' =>$this->id,
            'banyak_lahir'=>$this->banyak_lahir,
            'banyak_hidup'=>$this->banyak_hidup,
            'banyak_meninggal'=>$this->banyak_meninggal,
        ];
    }
}
