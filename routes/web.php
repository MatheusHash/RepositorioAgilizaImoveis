<?php

use Illuminate\Support\Facades\Route;

/*
 * Rotas Controllers
 * */
Route::get('/',       [\App\Http\Controllers\HomeController::class,  'index'])->name('home');

Route::get('/alugar', [\App\Http\Controllers\HomeController::class, 'alugar'])->name('alugar');
Route::get('/comprar', [\App\Http\Controllers\HomeController::class, 'comprar'])->name('comprar');
Route::get('/lancamentos', [\App\Http\Controllers\HomeController::class, 'lancamentos'])->name('lancamentos');

// Ordenacoes
Route::get('/ordenadoMenorPreco/{motivo}', [\App\Http\Controllers\HomeController::class, 'ordenaMenorPreco'])->name('ordenaMenorPreco');
Route::get('/ordenadoMaiorPreco/{motivo}', [\App\Http\Controllers\HomeController::class, 'ordenaMaiorPreco'])->name('ordenaMaiorPreco');

Route::get('/imoveis_filtrados', [\App\Http\Controllers\HomeController::class, 'filtrar_imoveis'])->name('imoveis.filtrados.home');


// Route::get('/imoveisFiltradosHome', [\App\Http\Controllers\HomeController::class, 'imoveisFiltradosPelaHome'])->name('imoveis.filtrados.home');
// Route::get('/imoveisFiltrados', [\App\Http\Controllers\HomeController::class, 'filtrar_imoveis'])->name('imoveis.filtrados.form2');
Route::get('/imovel/{id}', [\App\Http\Controllers\HomeController::class, 'imovel'])->name('imovel');

// // Rota para add uma mensagem de Contato
// Route::post('/contato/adicionar', [\App\Http\Controllers\ContatoController::class, 'store'])->name('contato.enviar');

/*
 * Fim das rotas Controllers
 * */

    //  Route::get('/',       [\App\Http\Controllers\HomeController::class,  'temporario'])->name('home');


// Rota para pagina de LOGIN
Route::get('/login',function (){
    return view('login');
})->name('login');

Route::middleware('auth')->group(function (){ //Middleware para autenticar o usuario antes de entrar nas rotas Admin


    Route::prefix('admin')->group(function(){// Grupo de rotas Admin
        /*
         * Rotas com controllers */
        Route::get('/dashboard', [\App\Http\Controllers\admin\DashboardController::class, 'index'])->name('dashboard');

        Route::delete('/contato/{id}/delete', [\App\Http\Controllers\ContatoController::class, 'destroy'])->name('contato.destroy');
        Route::put('/contato/{id}/update', [\App\Http\Controllers\ContatoController::class, 'update'])->name('contato.update');


        Route::prefix('imoveis')->group(function (){

            // Rotas para formulario e adicionar um Imovel no BD
            Route::get('/adicionar', [App\Http\Controllers\admin\ImovelController::class, 'page'])->name('imoveis.store.form');
            Route::post('/adicionar',[App\Http\Controllers\admin\ImovelController::class, 'store'])->name('imoveis.store');

            // Rotaa para listar todos os imoveis
            Route::get('/listaDeImoveis', [App\Http\Controllers\admin\ImovelController::class,'show'])->name('imoveis.show');
            Route::get('/searchImoveis', [App\Http\Controllers\admin\ImovelController::class,'adminSearchImoveis'])->name('imoveis.filter');



            // Rota para um mostrar imovel pelo ID
            Route::get('/{id}', [App\Http\Controllers\admin\ImovelController::class,'showById'])->name('showById.index');

            // Rota para mostrar o formulario de update do Imovel
            Route::get('/{id}/editar',[App\Http\Controllers\admin\ImovelController::class, 'edit'])->name('imoveis.edit');
            Route::put('/{id}/update',[App\Http\Controllers\admin\ImovelController::class, 'update'])->where('id', '[0-9]+')->name('imoveis.update');

            // Rota para deletar um ímovel //=> No controller também será erxcluído as imagens da galeria
            Route::post('/{id}/delete',[App\Http\Controllers\admin\ImovelController::class, 'destroy'])->where('id', '[0-9]+')->name('imoveis.destroy');

            // Rota para alterar a visibilidade de um ímovel
            Route::post('/{id}/visibilidade',[App\Http\Controllers\admin\ImovelController::class, 'visibilidade'])->where('id', '[0-9]+')->name('imoveis.visibility');


            //rotas da galeria
            Route::prefix('galeria')->group(function(){
                Route::get('/{idImovel}',[App\Http\Controllers\admin\GaleriaController::class, 'index'])->name('galeria');

                Route::post('/novasImagens',[App\Http\Controllers\admin\GaleriaController::class, 'store'])->name('store.images');

                Route::put('novaImagemPrincipal/{idImovel}',[App\Http\Controllers\admin\GaleriaController::class, 'novaImagemCapa'])->name('imagemCapa.update');
                Route::delete('deletarImagem/{idImagem}',[App\Http\Controllers\admin\GaleriaController::class, 'destroy'])->name('imagem.destroy');
            });
        });

        Route::prefix('cidades')->group(function(){
            // Rotas para listar e Adicionar cidades no BD
            Route::get('/', [App\Http\Controllers\admin\CidadeController::class, 'index'])->name('cidades.index');
            Route::post('/adicionar', [App\Http\Controllers\admin\CidadeController::class, 'store'])->name('cidades.store');

            // Route::get('/popularTabelaMunicipios', [App\Http\Controllers\admin\CidadeController::class, 'trocar_tabela_cidades_para_municipios_bairros'])->name('cidades.para.municipios');

        });

        Route::prefix('categorias')->group(function(){
            // Rotas para listar e Adicionar categorias no BD
            Route::get('/', [App\Http\Controllers\admin\CategoriaController::class, 'index'])->name('categorias.index');
            Route::post('/adicionar', [App\Http\Controllers\admin\CategoriaController::class, 'store'])->name('categorias.store');
        });

        Route::prefix('tags')->group(function(){
            // Rotas para listar e Adicionar cidades no BD
            Route::get('/', [App\Http\Controllers\admin\TagController::class, 'index'])->name('tags.index');
            Route::post('/adicionar', [App\Http\Controllers\admin\TagController::class, 'store'])->name('tags.store');
        });

        Route::prefix('municipios')->group(function(){
            // Rotas para listar e Adicionar Municipios no BD
            Route::get('/',             [App\Http\Controllers\admin\MunicipioController::class, 'index'])->name('municipios.index');
            Route::post('/adicionar',   [App\Http\Controllers\admin\MunicipioController::class, 'store'])->name('municipios.store');
            Route::post('/bairros/adicionar',   [App\Http\Controllers\admin\BairroController::class, 'store'])->name('bairros.store');

        });


    });
});

/*
 * Para tratar erros de rotas que não existem
 *
 * */
Route::fallback(function (){

    return "Página não encontrada";

});

require __DIR__.'/auth.php';
