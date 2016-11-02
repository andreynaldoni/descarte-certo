<?php

namespace App\Http\Controllers;

use App\CategoriaObjeto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $categorias = CategoriaObjeto::all();

        return view('home.index', compact('categorias'));
    }
}
