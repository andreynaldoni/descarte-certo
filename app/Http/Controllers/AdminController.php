<?php

namespace App\Http\Controllers;

use App\CategoriaObjeto;
use App\ObjetoDescarte;
use App\ConteudoObjeto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        $categorias = CategoriaObjeto::all();

        return view('admin.index', compact('categorias'));
    }

    public function categoria($categoria) {
        $categoria = CategoriaObjeto::where('nm_categoria_objeto', $categoria)->first();

        if ($categoria) {
            $objetos = ObjetoDescarte::where('cd_categoria_objeto', $categoria->cd_categoria_objeto)->get();

            return view('admin.category', compact('categoria', 'objetos'));
        } else {
            return redirect()->action('AdminController@index');
        }
    }

    public function objeto($categoria, $objeto) {
        $categoria = CategoriaObjeto::where('nm_categoria_objeto', $categoria)->first();
        $objeto = ObjetoDescarte::where('nm_objeto_descarte', $objeto)->first();
        $conteudos = ConteudoObjeto::where('cd_objeto_descarte', $objeto->cd_objeto_descarte)->get();

        return view('admin.object', compact('categoria', 'objeto', 'conteudos'));
    }

    public function conteudo() {
        return view('admin.content');
    }
}
