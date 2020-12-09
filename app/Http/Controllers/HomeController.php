<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imoveis;
use App\Http\Resources\Imoveis as ImoveisResource;

class HomeController extends Controller
{
    public function __invoke(Request $req){
        $imoveis = Imoveis::search($req)->with('images')->paginate(2);

        if($imoveis->isEmpty()){
            return response()->json([
                'error'=>true,
                'message'=>"Nenhum imovel encontrado"
            ]);
        } 
        // depois nos repondemos a requeste com o json
        return ImoveisResource::collection($imoveis);
    }
}
