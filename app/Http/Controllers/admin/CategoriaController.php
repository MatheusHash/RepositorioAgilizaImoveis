<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view("admin/categorias/categoria",['categorias'=>$categorias]);
    }
    public function store(Request $request ){
        if($request->nome){
            Categoria::create($request->all());
            return back();
        }
        return back();
    }
}
