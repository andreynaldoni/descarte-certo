@extends('layout')

@section('title', 'Administrativo - ' . $categoria->nm_categoria_objeto . ' > ' . $objeto->nm_objeto_descarte)

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="page-header">
            <h1 class="text-center">{{ $objeto->nm_objeto_descarte }}</h1>
        </div>
        <div class="btn-group btn-breadcrumb">
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="/Administrativo" class="btn btn-success">Administrativo</a>
            <a href="/Administrativo/{{ $categoria->nm_categoria_objeto }}" class="btn btn-success">{{ $categoria->nm_categoria_objeto }}</a>
            <a href="#" class="btn btn-success disabled" role="button">{{ $objeto->nm_objeto_descarte }}</a>
        </div>
        <blockquote>
            <p class="lead text-success">
                {{ $objeto->ds_objeto_descarte }}
            </p>
        </blockquote>
        <div class="row container">
            <div class="list-group">
                @foreach($conteudos as $key => $conteudo)
                    <a href="/Administrativo/{{ $categoria->nm_categoria_objeto }}/{{ $objeto->nm_objeto_descarte }}/{{ $conteudo->nm_conteudo_objeto }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $conteudo->nm_conteudo_objeto }}</h4>
                        <p class="list-group-item-text">{{ str_limit($conteudo->ds_conteudo_objeto, 200) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection