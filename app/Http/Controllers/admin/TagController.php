<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;


class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return view("admin/tags/tags",['tags'=>$tags]);
    }

    public function store(Request $request){
        // dd($request->all());
        if($request->nome){
            Tag::create($request->all());
            return back();
        }
        return back();
    }}
