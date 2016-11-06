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

    public function detalhe($ponto)
    {
        $ponto = PontoDescarte::where('nm_ponto_descarte', $ponto)->first();
        $categorias = CategoriaObjeto::all();

        return view('map.detail', compact('ponto', 'categorias'));
    }

    public function postPonto(Request $request) {
        $this->validate($request, [
            'nome' => 'bail|required|max:100',
            'descricao' => 'required|max:200',
            'latitude' => 'required|max:50',
            'longitude' => 'required|max:50',
        ]);

        if(PontoDescarte::create([
            'nm_ponto_descarte' => $request->input('nome'),
            'ds_ponto_descarte' => $request->input('descricao'),
            'cd_latitude' => $request->input('latitude'),
            'cd_longitude' => $request->input('longitude'),
        ])){
            return redirect('/Pontos de Descarte');
        } else {
            return redirect('/Pontos de Descarte')->withInput();
        }
    }

    public function postDetalhe(Request $request, $ponto, $id) {
        $this->validate($request, [
            'nome' => 'bail|required|max:100',
            'descricao' => 'required|max:200',
            'latitude' => 'required|max:50',
            'longitude' => 'required|max:50',
        ]);

        if(PontoDescarte::create([
            'nm_ponto_descarte' => $request->input('nome'),
            'ds_ponto_descarte' => $request->input('descricao'),
            'cd_latitude' => $request->input('latitude'),
            'cd_longitude' => $request->input('longitude'),
        ])){
            return redirect('/Pontos de Descarte');
        } else {
            return redirect('/Pontos de Descarte')->withInput();
        }
    }

    public function postEditPonto(Request $request) {

    }

    public function PostEditDetalhe(Request $request, $ponto) {

    }
}
