<?php
declare(strict_types=1);

use App\Http\Controllers\AtivoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

//Rota Principal da Minha aplicação : Dashboard de Ativos Fabris
Route::get("/", [AtivoController::class, "index"])->name("ativos.index");

//Rota de Infraestrutura Json
Route::get("/status", [AtivoController::class, "status"])->name("ativos.status");

//Criar as rotas nomeadas para Clientes -> para filtro por setor
Route::get("/clientes/setor/{setor?}", [ClienteController::class, "filtrarPorSetor"])
    ->name("clientes.setor")
    ->whereAlphaNumeric("setor");


//Rota RESTful (GET, POST, PUT/PATCH, DELETE)
Route::resource("clientes", ClienteController::class)->whereNumber("cliente");

//Rota RESTful (GET, POST, PUT, DELETE) -> produtos
Route::resource("produtos", ProdutoController::class);