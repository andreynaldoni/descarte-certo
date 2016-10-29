@extends('layout')

@section('title', 'Home')

@section('content')
    <div id="home-bg">
        <div class="container">
            <div class="black-bg">
                <div class="main-text">
                    <h1 class="text-center white-text" style="font-size: 48px">
                        Seja bem vindo(a) ao nosso website
                    </h1>
                    <p class="text-center white-text lead" style="font-size: 36px">
                        Neste espaço você irá aprender mais sobre o descarte adequado de lixo
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu cards - Categories -->
    <div id="menu-cards" class="container">
        <h1 class="text-center">
            Categorias de Recicláveis
        </h1>
        @if (!$categorias->isEmpty())
            @foreach($categorias as $key => $categoria)
                {{-- For Each 3 items insert a row --}}
                @if (($key) % 3 == 0)
                    <div class="row">
                @endif
                <div class="col-sm-4">
                    <div class="text-center">
                        <h3 class="text-center">{{ $categoria->nm_categoria_objeto }}</h3>
                        <a href="/{{ $categoria->nm_categoria_objeto }}">
                            {{-- <p><i class="fa fa-recycle" style="font-size: 128px"></i></p> --}}
                            <a href="/{{ $categoria->nm_categoria_objeto }}">
                                <p>
                                    <img alt="{{ $categoria->nm_categoria_objeto }}" 
                                         src="{{ $categoria->im_categoria_objeto }}" 
                                         style="height: 128px">
                                </p>
                            </a>
                        </a>
                        <p><a href="/{{ $categoria->nm_categoria_objeto }}" class="btn btn-success home-btn"> Veja mais</a></p>
                    </div>
                </div>
                {{-- For Each 3 items insert a row --}}
                @if ((($key) % 3 == 2) || (count($categorias) == ($key + 1)))
                    </div>
                @endif
            @endforeach
        @else
            <p class="lead text-center">
                Parece que não há materiais cadastrados em nosso sistema :(<br>
                Tente novamente mais tarde.
            </p>
        @endif
    </div>
    <!-- /Menu cards - Categories -->
@endsection