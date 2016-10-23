<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PontoDescarte extends Model
{
    protected $table = 'ponto_descarte';
    protected $primaryKey = 'cd_ponto_descarte';
    protected $fillable = [
        'nm_ponto_descarte',
        'ds_ponto_descarte',
        'cd_latitude',
        'cd_longitude'
    ];

    public $timestamps = false;

    public function categorias()
    {
        return $this->belongsToMany(CategoriaObjeto::class, 'categoria_objeto_ponto_descarte', 'cd_ponto_descarte', 'cd_categoria_objeto');
    }
}
