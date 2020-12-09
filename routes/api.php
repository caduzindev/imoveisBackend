<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminImoveisController;
use App\Http\Controllers\Admin\AdminEmployeeController;

//Rotas dos Usuarios comuns
Route::get('/',HomeController::class);
Route::get('/imovel/{id}',[ImovelController::class,"getImovel"]);
Route::post('/imovel/sendOrder/{id}',[ImovelController::class,"sendOrderMail"]);
Route::get('/sobre',SobreController::class);
Route::get('/teste',[AdminImoveisController::class,"teste"]);

//Rotas de Autenticação
Route::post('login',[AuthController::class,"login"]);

Route::middleware(['jwt.auth'])->group(function () {
    Route::post('logout',[AuthController::class,"logout"]);
    Route::post('refresh',[AuthController::class,"refresh"]);
    Route::post('me',[AuthController::class,"me"]);

    //Rotas dos Admins
    //Rotas de Imovel

    Route::get('/listImoveis',[AdminImoveisController::class,"listImoveis"]);
    Route::post('/addImovel',[AdminImoveisController::class,"addImovel"]);
    Route::delete('/deleteImovel/{id}',[AdminImoveisController::class,"deleteImovel"]);
    Route::get('/showImovel/{id}',[AdminImoveisController::class,"showImovel"]);
    Route::post('/updateImovel/{id}',[AdminImoveisController::class,'updateImovel']);

    //Rotas de Funcionarios
    Route::get('/listEmployees',[AdminEmployeeController::class,"listEmployees"]);
    Route::post('/addEmployee',[AdminEmployeeController::class,"addEmployee"]);
});