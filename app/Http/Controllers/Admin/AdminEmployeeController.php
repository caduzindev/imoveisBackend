<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\addEmployee; 
use Image;

class AdminEmployeeController extends Controller
{
    public function listEmployees(){
        $users = User::paginate(15);

        return UserResource::collection($users);
    }
    public function addEmployee(addEmployee $req){
        $validated = $req->validated();
        $file = $req->file('image');

        //Salva a foto do usuario no diretorio e o hash no banco
        $hash = SaveImageDir($file,300,'Users');
        $user = new User;

        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->image = $hash;

        $user->save();

        return response()->json([
            'errors'=>false
        ]);
    }
}
