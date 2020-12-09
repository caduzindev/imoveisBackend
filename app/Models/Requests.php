<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'imovel_id',
        'name_buyer',
        'email_buyer',
        'message_buyer',
        'status'
    ];

    protected $attributes = [
        'status'=>'pending'
    ];

    public function imovel(){
        return $this->belongsTo('App/Models/Imoveis','id');
    }
}
