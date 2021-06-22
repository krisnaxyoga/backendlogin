<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataKehamilanResource extends JsonResource
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
            'tempatpelayanan' =>$this->tempatpelayanan,
            'tanggal' =>$this->tanggal,
            'uk' =>$this->uk,
            'beratbadan' =>$this->beratbadan,
            'td' =>$this->td,
            'lila' =>$this->lila,
            'tinggi_fundus' =>$this->tinggi_fundus,
            'letakjanin' =>$this->letakjanin,
            'tablettambahdarah' =>$this->tablettambahdarah,
            'laboratorium' =>$this->laboratorium,
            'tatalaksana' =>$this->tatalaksana,
            'konseling' =>$this->konseling,
        ];
    }
}
