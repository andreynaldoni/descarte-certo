<?php

namespace App\Http\Controllers;

use App\CategoriaObjeto;
use App\ObjetoDescarte;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoryController extends Controller
{
    public function index($categoria)
    {
        $categoria = CategoriaObjeto::where('nm_categoria_objeto', $categoria)->first();

        if ($categoria) {
            $objetos = ObjetoDescarte::where('cd_categoria_objeto', $categoria->cd_categoria_objeto)->get();

            return view('category.index', compact('categoria', 'objetos'));
        } else {
            return redirect()->action('HomeController@index');
        }
    }
}
