<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sobre;

class SobreController extends Controller
{
    public function __invoke(){
        return response()->json(Sobre::first());
    }
}
