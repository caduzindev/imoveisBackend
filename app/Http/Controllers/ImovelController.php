<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imoveis;
use App\Http\Resources\Imoveis as ImoveisResource;
use App\Http\Requests\ImovelOrder;
use App\Jobs\SendOrderMail;

class ImovelController extends Controller
{
    public function getImovel($id){
        if(!Imoveis::find($id)){
            return reponse()->json([
                'error'=>true,
                'message'=>'Este Imovel não existe'
            ]);
        }
        //retornara todas as inforamções de um determinado imovel... incluindo endereço e imagens
        return new ImoveisResource(Imoveis::find($id)->loadMissing(['images','address']));
    }

    public function sendOrderMail(ImovelOrder $req,$idImovel){
        $validated = $req->validated();
        $imovel = Imoveis::find($idImovel)->loadMissing(['address']);

        SendOrderMail::dispatch($imovel,$req->name,$req->email,$req->message);

        return response(['status'=>true],200)->header('Content-Type','application/json');
    }
}
