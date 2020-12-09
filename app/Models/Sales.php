<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;s
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'imovel_id',
        'name_buyer',
        'email_buyer',
        'message_buyer'
    ];

    public function imovel(){
        return $this->belongsTo('App\Models\Imoveis','id');
    }
}
