<?php

namespace App\Http\Controllers\admin;
use App\Models\Contato;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $mensagens = Contato::all();
        return view('/admin/dashboard', ['mensagens'=>$mensagens]);
    }
}
