@extends('layout')

@section('title', 'Home')

@section('content')
    <!-- Menu cards - Categories -->
    @if (!$categorias->isEmpty())
        <h2 class="text-center">
            Seja bem vindo ao nosso website! <i class="fa fa-smile-o"></i>
        </h2>
        <p class="text-center lead">
            Neste espaço você irá aprender mais sobre o descarte adequado de lixo.
        </p>
        @foreach($categorias as $key => $categoria)
            {{-- For Each 3 items insert a row --}}
            @if (($key) % 3 == 0)
                <div class="row">
            @endif
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">{{ $categoria->nm_categoria_objeto }}</h3>
                    </div>
                    <div class="panel-body" align="center">
                        <i class="fa fa-recycle" style="font-size: 128px"></i>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="/{{ $categoria->nm_categoria_objeto }}" class="btn btn-success"> Veja mais</a>
                    </div>
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
    <!-- /Menu cards - Categories -->
@endsection