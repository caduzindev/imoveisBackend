<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImovelAddress extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'cep'=>$this->cep,
            'city'=>$this->city,
            'neigh'=>$this->neigh,
            'lat'=>$this->lat,
            'long'=>$this->long
        ];
    }
}
