<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imoveis;
use App\Models\ImovelAddress;
use App\Models\ImovelImages;
use App\Http\Resources\Imoveis as ImoveisResource;
use App\Http\Requests\addImovel;
use App\Http\Requests\updateImovel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminImoveisController extends Controller
{
    public function listImoveis(){
      $imoveis = Imoveis::with('address')->with('images')->paginate(15);
      
      return ImoveisResource::collection($imoveis);
    }
    public function showImovel($id){
      return new ImoveisResource(Imoveis::find($id)->loadMissing(['address','images']));
    }
    public function addImovel(addImovel $req){
      $validated = $req->validated();
      $files = $req->file('photos');

      try{
        DB::beginTransaction();
        $imovel = Imoveis::create([
          'title'=>$req->title,
          'status'=>$req->status,
          'desc'=>$req->desc,
          'type'=>$req->type,
          'dorms'=>intval($req->dorms),
          'price'=>floatval($req->price),
          'details'=>$req->details,
        ]);
  
        ImovelAddress::create([
          'imovel_id'=>$imovel->id,
          'city'=>$req->city,
          'cep'=>$req->cep,
          'neigh'=>$req->neigh,
          'lat'=>$req->lat,
          'long'=>$req->long
        ]);
  
        foreach($files as $file){
          $hash = SaveImageDir($file,600,'images');

          ImovelImages::create([
            'imovel_id'=>$imovel->id,
            'url'=>$hash
          ]);
        }
        DB::commit();

      }catch(Exception $e){
        DB::rollBack();
        Log::danger('[Error] Erro ao criar Imovel no banco de dados',[$e]);

        return response()->json([
          "errors"=>true,
          "message"=>"Erro ao criar Imovel"
        ]);
      }

      return response()->json([
        "errors"=>false
      ]);
    }
    public function deleteImovel($id){
      Imoveis::find($id)->delete();

      return response()->json([
        'errors'=>false
      ]);
    }
    public function updateImovel(updateImovel $req,$id){
      $validated = $req->validated();

      if($req->hasAny(['title','status','desc','type','dorms','price','details'])){
        $imovel =Imoveis::where('id',$id)->update($req->input());

        return response()->json([
          'errors'=>false
        ]);
      }
    }
}
