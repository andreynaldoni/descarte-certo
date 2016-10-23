<?php

namespace App\Http\Controllers;

use App\CategoriaObjeto;
use App\ObjetoDescarte;
use App\ConteudoObjeto;
use Illuminate\Http\Request;
use App\Http\Requests;

class ContentController extends Controller
{
    public function index($categoria, $objeto, $conteudo)
    {
        $categoria = CategoriaObjeto::where('nm_categoria_objeto', $categoria)->first();
        $objeto = ObjetoDescarte::where('nm_objeto_descarte', $objeto)->first();
        $conteudo = ConteudoObjeto::where('nm_conteudo_objeto', $conteudo)->first();

        return view('content.index', compact('categoria', 'objeto', 'conteudo'));
    }
}
