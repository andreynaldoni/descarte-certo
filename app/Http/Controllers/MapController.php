<?php

namespace App\Http\Controllers;

use App\CategoriaObjeto;
use App\PontoDescarte;
use Illuminate\Http\Request;
use App\Http\Requests;

class MapController extends Controller
{
    public function index()
    {
        $pontos = PontoDescarte::all();
        return view('map.index', compact('pontos'));
    }

    public function detail($ponto)
    {
        $ponto = PontoDescarte::where('nm_ponto_descarte', $ponto)->first();
        $categorias = CategoriaObjeto::all();
        return view('map.detail', compact('ponto', 'categorias'));
    }
}
