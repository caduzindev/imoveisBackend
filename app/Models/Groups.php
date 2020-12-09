<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rules_ids'
    ];

    public function users(){
        return $this->hasMany('App\Models\User','group_id');
    }
}
