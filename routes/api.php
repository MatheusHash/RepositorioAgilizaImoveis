<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Rota para add uma mensagem de Contato
Route::post('/contato/adicionar', [\App\Http\Controllers\ContatoController::class, 'store'])->name('contato.enviar');


        /*
         * Rotas com controllers */
        Route::prefix('municipios')->group(function(){
            // Rotas para listar e Adicionar Municipios no BD
            Route::get('/{cod_municipio}/bairros', [App\Http\Controllers\admin\BairroController::class, 'bairrosDoMunicipio'])->name('municipio.bairros');

        });



// Route::get('/galeria', [App\Http\Controllers\admin\GaleriaController::class]);

