<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imoveis extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'status',
        'type',
        'desc',
        'dorms',
        'price',
        'details',
    ];

    protected $attributes = [
        'status'=>"aluga",
        'type'=>'alvenaria',
        'dorms'=>1,
    ];

    public function images(){
        return $this->hasMany('App\Models\ImovelImages','imovel_id');
    }

    public function image(){
        return $this->hasOne('App\Models\ImovelImages','imovel_id');
    }

    public function address(){
        return $this->hasOne('App\Models\ImovelAddress','imovel_id');
    }
    
    public function sale(){
        return $this->hasOne('App\Models\Sales','imovel_id');
    }

    public function requests(){
        return $this->hasMany('App\Models\Requests','imovel_id');
    }

    public function getStatusAttribute($value){
        return strtoupper($value);
    }

    public function getPriceAttribute($value){
        return number_format(floatval($value),2,',',' ');
    }

    public function scopeSearch($query,$request){
        $query->join('imovel_addresses','imoveis.id','=','imovel_addresses.imovel_id');
        $query->select('imoveis.*','imovel_addresses.cep','imovel_addresses.city','imovel_addresses.neigh');

        $terms = $request->only('city','neigh');
        $equals = $request->only('status','type');
        $between = $request->only('price','dorms');

        foreach ($terms as $nome => $valor) {
            if($valor){ 
                $query->where($nome,'ILIKE','%'.$valor.'%');
            }
        }

        foreach($equals as $nome => $valor) {
            if($valor) { 
                $query->where($nome,'=',$valor);
            }
        }

        foreach($between as $nome => $valor) {
            if($valor) { 
                $query->whereBetween($nome,[0,$valor]);
            }
        }

        return $query;
    }
}
