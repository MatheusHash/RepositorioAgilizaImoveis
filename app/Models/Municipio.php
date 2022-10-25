<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function bairros(){
        return $this->hasMany(Bairro::class, 'municipio_id', 'id')->orderBy('nome','asc');
    }

    public function imoveis(){
        return $this->hasMany(Imovel::class);
    }

}
