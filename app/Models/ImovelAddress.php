<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImovelAddress extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'imovel_id',
        'neigh',
        'cep',
        'city',
        'lat',
        'long'
    ];

    public function imovel(){
        return $this->belongsTo('App\Models\Imoveis','id');
    }
}
