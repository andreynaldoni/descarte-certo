<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaObjeto extends Model
{
    protected $table = 'categoria_objeto';
    protected $primaryKey = 'cd_categoria_objeto';
    protected $fillable = [
        'nm_categoria_objeto', 'ds_categoria_objeto'
    ];

    public $timestamps = false;

    public function pontos()
    {
        return $this->hasMany(PontoDescarte::class,'cd_categoria_objeto', 'cd_ponto_descarte');
    }
}
