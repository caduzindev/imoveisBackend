<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class Imoveis extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'status'=>$this->status,
            'title'=>$this->title,
            'desc'=>$this->desc,
            'price'=>$this->price,
            'details'=>$this->details,
            'dorms'=>$this->dorms,
            'type'=>$this->type,
            'image'=>new ImovelImages($this->whenLoaded('image')),
            'images'=>ImovelImages::collection($this->whenLoaded('images')),
            'address'=>new ImovelAddress($this->whenLoaded('address')),
        ];
    }
}
