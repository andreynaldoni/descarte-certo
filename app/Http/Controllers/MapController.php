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
        $categorias = CategoriaObjeto::all();

        return view('map.index', compact('pontos', 'categorias'));
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
            'longitude' => 'required|max:50'
        ]);
        
        $ponto = PontoDescarte::create([
            'nm_ponto_descarte' => $request->input('nome'),
            'ds_ponto_descarte' => $request->input('descricao'),
            'cd_latitude' => $request->input('latitude'),
            'cd_longitude' => $request->input('longitude')
        ]);

        if($ponto){
            $ponto->categorias()->sync($request->input('categorias'));

            return redirect('/Pontos de Descarte');
        }

        return redirect('/Pontos de Descarte')->withInput();
    }

    public function postEditPonto(Request $request, $ponto) {
        $this->validate($request, [
            'id' => 'required|numeric',
            'nome' => 'bail|required|max:100',
            'descricao' => 'required|max:200',
            'latitude' => 'required|max:50',
            'longitude' => 'required|max:50'
        ]);

        \DB::beginTransaction();

        if(PontoDescarte::find($request->input('id'))->update([
            'nm_ponto_descarte' => $request->input('nome'),
            'ds_ponto_descarte' => $request->input('descricao'),
            'cd_latitude' => $request->input('latitude'),
            'cd_longitude' => $request->input('longitude')
        ])){
            PontoDescarte::find($request->input('id'))
                ->categorias()
                ->sync($request->input('categorias'));
            
            \DB::commit();

            return redirect('/Pontos de Descarte/' . $ponto);
        }

        \DB::rollback();

        return redirect('/Pontos de Descarte/' . $ponto)->withInput();
    }

    public function PostDeletePonto(Request $request, $ponto) {
        $this->validate($request, [
            'id' => 'required'
        ]);
        
        PontoDescarte::find($request->input('id'))->delete();

        return redirect('/Pontos de Descarte');
    }
}
