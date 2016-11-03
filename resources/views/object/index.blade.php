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
        @if (!$conteudos->isEmpty())
            <div class="list-group">
                @foreach($conteudos as $key => $conteudo)
                    <a href="/{{ $categoria->nm_categoria_objeto }}/{{ $objeto->nm_objeto_descarte }}/{{ $conteudo->nm_conteudo_objeto }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $conteudo->nm_conteudo_objeto }}</h4>
                        <p class="list-group-item-text">{{ str_limit($conteudo->ds_conteudo_objeto, 200) }}</p>
                    </a>
                @endforeach
            </div>
        @else
            <p class="lead text-center">
                Parece que não há conteúdos cadastrados no momento :(<br>
                Tente novamente mais tarde :)
            </p>
        @endif
    </div>
@endsection