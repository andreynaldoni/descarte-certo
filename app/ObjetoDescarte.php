<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjetoDescarte extends Model
{
    protected $table = 'objeto_descarte';
    protected $primaryKey = 'cd_objeto_descarte';
    protected $fillable = ['nm_objeto_descarte', 'ds_objeto_descarte'];

    public $timestamps = false;

    public function conteudos()
    {
        return $this->hasMany(ConteudoObjeto::class, 'cd_objeto_descarte');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaObjeto::class);
    }

    public function pontos()
    {
        return $this->belongsToMany(PontoDescarte::class);
    }
}
