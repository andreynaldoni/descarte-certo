<?php

namespace App\Http\Controllers;

use App\CategoriaObjeto;
use App\ObjetoDescarte;
use App\ConteudoObjeto;
use Illuminate\Http\Request;
use App\Http\Requests;

class ObjectController extends Controller
{
    public function index($categoria, $objeto)
    {
        $categoria = CategoriaObjeto::where('nm_categoria_objeto', $categoria)->first();
        $objeto = ObjetoDescarte::where('nm_objeto_descarte', $objeto)->first();
        $conteudos = ConteudoObjeto::where('cd_objeto_descarte', $objeto->cd_objeto_descarte)->get();

        return view('object.index', compact('categoria', 'objeto', 'conteudos'));
    }
}
