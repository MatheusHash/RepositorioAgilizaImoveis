<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
      'nome',
    ];

  public function imoveis(){
    return $this->belongsToMany(Imovel::class);
  }
}
