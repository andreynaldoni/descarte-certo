<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConteudoObjeto extends Model
{
    protected $table = 'conteudo_objeto';
    protected $primaryKey = 'cd_conteudo_objeto';
    protected $fillable = [
        'nm_conteudo_objeto',
        'ds_conteudo_objeto',
        'ds_caminho_imagem',
        'ds_caminho_video',
        'ic_tipo'
    ];

    public $timestamps = false;

    public function objeto()
    {
        return $this->belongsToMany(ObjetoDescarte::class);
    }
}
