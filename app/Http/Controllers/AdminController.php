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
            $objetos = ObjetoDescarte::find($categoria->cd_categoria_objeto)->get();

            return view('admin.category', compact('categoria', 'objetos'));
        }
        
        return redirect()->action('AdminController@index');
    }
    
    public function objeto($categoria, $objeto) {
        $categoria = CategoriaObjeto::where('nm_categoria_objeto', $categoria)->first();
        $objeto = ObjetoDescarte::where('nm_objeto_descarte', $objeto)->first();
        $conteudos = ConteudoObjeto::where('cd_objeto_descarte', $objeto->cd_objeto_descarte)->get();

        return view('admin.object', compact('categoria', 'objeto', 'conteudos'));
    }

    public function conteudo($categoria, $objeto, $conteudo) {
        $categoria = CategoriaObjeto::where('nm_categoria_objeto', $categoria)->first();
        $objeto = ObjetoDescarte::where('nm_objeto_descarte', $objeto)->first();
        $conteudo = ConteudoObjeto::where('nm_conteudo_objeto', $conteudo)->first();

        return view('admin.content', compact('categoria', 'objeto', 'conteudo'));
    }

    public function postCategoria(Request $request) {
        $this->validate($request, [
            'categoria' => 'bail|required|max:100',
            'descricao' => 'required|max:200'
        ]);

        if(CategoriaObjeto::create([
            'nm_categoria_objeto' => $request->input('categoria'),
            'ds_categoria_objeto' => $request->input('descricao'),
            'im_categoria_objeto' => '/img/category/3.png',
        ])){
            return redirect('/Administrativo');
        }

        return redirect('/Administrativo')->withInput();
    }

    public function postObjeto(Request $request, $categoria, $id) {
        $this->validate($request, [
            'objeto' => 'bail|required|max:100',
            'descricao' => 'required|max:200'
        ]);

        if(ObjetoDescarte::create([
            'nm_objeto_descarte' => $request->input('objeto'),
            'ds_objeto_descarte' => $request->input('descricao'),
            'cd_categoria_objeto' => $id,
        ])){
            return redirect('/Administrativo/' . $categoria);
        }
        
        return redirect('/Administrativo/' . $categoria)->withInput();
    }

    public function postConteudo(Request $request, $categoria, $objeto, $id) {
        $this->validate($request, [
            'nome' => 'required|max:100',
            'descricao' => 'required|max:5000',
            'video' => 'required|max:100',
            'imagem' => 'required|max:1000'
        ]);

        if(ConteudoObjeto::create([
            'nm_conteudo_objeto' => $request->input('nome'),
            'ds_conteudo_objeto' => $request->input('descricao'),
            'ds_caminho_video' => $request->input('video'),
            'ds_caminho_imagem' => $request->input('imagem'),
            'ic_tipo' => 'Reciclagem',
            'cd_objeto_descarte' => $id,
        ])){
            return redirect('/Administrativo/' . $categoria . '/' . $objeto);
        }

        return redirect('/Administrativo/' . $categoria . '/' . $objeto)->withInput();
    }

    public function postEditCategoria(Request $request, $categoria) {
        $this->validate($request, [
            'categoria' => 'required|max:100',
            'descricao' => 'required|max:200'
        ]);

        if(CategoriaObjeto::find($request->input('id'))->update([
            'id' => 'required|numeric',
            'nm_categoria_objeto' => $request->input('categoria'),
            'ds_categoria_objeto' => $request->input('descricao'),
        ])){
            return redirect('/Administrativo/' . $categoria);
        }
        
        return redirect('/Administrativo/' . $categoria)->withInput();
    }

    public function postEditObjeto(Request $request, $categoria, $objeto) {
        $this->validate($request, [
            'id' => 'required|numeric',
            'objeto' => 'required|max:100',
            'descricao' => 'required|max:200'
        ]);

        if(ObjetoDescarte::find($request->input('id'))->update([
            'nm_objeto_descarte' => $request->input('objeto'),
            'ds_objeto_descarte' => $request->input('descricao')
        ])){
            return redirect('/Administrativo/' . $categoria . '/' . $objeto);
        }

        return redirect('/Administrativo/' . $categoria. '/' . $objeto)->withInput();
    }

    public function postEditConteudo(Request $request, $categoria, $objeto, $conteudo) {
        $this->validate($request, [
            'id' => 'required|numeric',
            'nome' => 'required|max:100',
            'descricao' => 'required|max:5000',
            'video' => 'required|max:100',
            'imagem' => 'required|max:1000'
        ]);

        if(ConteudoObjeto::find($request->input('id'))->update([
            'nm_conteudo_objeto' => $request->input('nome'),
            'ds_conteudo_objeto' => $request->input('descricao'),
            'ds_caminho_video' => $request->input('video'),
            'ds_caminho_imagem' => $request->input('imagem')
        ])){
            return redirect('/Administrativo/' . $categoria . '/' . $objeto . '/' . $conteudo);
        }

        return redirect('/Administrativo/' . $categoria. '/' . $objeto . '/' . $conteudo)->withInput();
    }

    public function postDeleteCategoria(Request $request) {
        $this->validate($request, [
            'id' => 'required'
        ]);

        CategoriaObjeto::find($request->input('id'))->delete();

        return redirect('/Administrativo/');
    }

    public function postDeleteObjeto(Request $request, $categoria) {
        $this->validate($request, [
            'id' => 'required'
        ]);
        
        ObjetoDescarte::find($request->input('id'))->delete();

        return redirect('/Administrativo/' . $categoria);
    }

    public function postDeleteConteudo(Request $request, $categoria, $objeto) { 
        $this->validate($request, [
            'id' => 'required'
        ]);

        ConteudoObjeto::find($request->input('id'))->delete();

        return redirect('/Administrativo/' . $categoria . '/' . $objeto);
    }
}
