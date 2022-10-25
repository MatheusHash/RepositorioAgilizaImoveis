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
        // 'bairro_id',
        // 'municipio_id',
    ];

    public $table = 'imoveis';
//    protected $autoincrement = true;

    public function cidade(){
        return $this->belongsTo(Cidade::class);
    }

    public function galeria(){
        return $this->hasMany(Galeria::class, 'imovel_id', 'id')->where('principal' , 0);
    }
    public function fotoPrincipal(){
        return $this->hasOne(Galeria::class)->where('principal',1);
    }



    // Colocar relacionamento ManyToMany
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class, 'municipio_id','id');
    }
    public function bairro(){
        return $this->belongsTo(Bairro::class, 'bairro_id','id');
    }
}
