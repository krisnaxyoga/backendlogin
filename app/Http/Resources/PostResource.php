<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'judul' =>$this->title,
            'konten' =>$this->content,
            'pessanDariSaya' =>"ini yoga krisna testing",
            // 'created_at' =>$this->created_at->format('d/m/y'),
        ];
    }
}
