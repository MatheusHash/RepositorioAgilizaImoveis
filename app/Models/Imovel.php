<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $idImovel)
 */
class Imovel extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'corretor',
        'valor',
        'endereco',
        'visibility',
        'quarto',
        'banheiro',
        'suite',
        'garagem',
        'motivo',
        'categoria_id',
        'googlemaps',
        'descricao',
        'cidade_id',
    ];

    public $table = 'imoveis';
//    protected $autoincrement = true;

    public function galeria(){
        return $this->hasMany(Galeria::class, 'imovel_id', 'id');
    }


    // Colocar relacionamento ManyToMany
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
