<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HphtResource extends JsonResource
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
            'hari_pertama'=>$this->hari_pertama,
        'hari_terakhir'=>$this->hari_terakhir,
            
        ];
    }
}
