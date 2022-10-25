<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'municipio_id',
    ];

    public function municipio(){
        return $this->belongsTo(Municipio::class,'municipio_id','id');
    }

    public function imovel(){
        return $this->hasMany(Bairro::class, 'municipio_id', 'id');
    }
}
