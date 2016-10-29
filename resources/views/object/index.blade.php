@extends('layout')

@section('title', $categoria->nm_categoria_objeto . ' > ' . $objeto->nm_objeto_descarte)

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="page-header">
            <h1 class="text-center">{{ $objeto->nm_objeto_descarte }}</h1>
        </div>
        <div class="btn-group btn-breadcrumb">
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="/{{ $categoria->nm_categoria_objeto }}" class="btn btn-success">{{ $categoria->nm_categoria_objeto }}</a>
            <a href="#" class="btn btn-success disabled" role="button">{{ $objeto->nm_objeto_descarte }}</a>
        </div>
        <blockquote>
            <p class="lead text-success">
                {{ $objeto->ds_objeto_descarte }}
            </p>
        </blockquote>
        {{-- <div class="row text-center">
            <input type="radio" name="tipo" id="1">
            <label for="reciclagem">Reciclagem</label>
            <input type="radio" name="tipo" id="2">
            <label for="descarte">Descarte</label>
            <input type="radio" name="tipo" id="3">
            <label for="reaproveitamento">Reaproveitamento</label>
        </div><br> --}}
        <div class="row container">
            <div class="list-group">
                @foreach($conteudos as $key => $conteudo)
                    <a href="/{{ $categoria->nm_categoria_objeto }}/{{ $objeto->nm_objeto_descarte }}/{{ $conteudo->nm_conteudo_objeto }}" class="list-group-item">{{ $conteudo->nm_conteudo_objeto }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection