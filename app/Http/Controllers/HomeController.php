<?php

namespace App\Http\Controllers;

use App\CategoriaObjeto;
use Illuminate\Http\Request;
use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = CategoriaObjeto::all();

        return view('home.index', compact('categorias'));
    }
}
