@extends('layout')

@section('title', 'Administração > ' . $categoria->nm_categoria_objeto)

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="page-header">
            <h1 class="text-center">{{ $categoria->nm_categoria_objeto }}</h1>
        </div>
        <div class="btn-group btn-breadcrumb">
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="/Administrativo" class="btn btn-success">Administrativo</a>
            <a href="/Administrativo/{{ $categoria->nm_categoria_objeto }}" class="btn btn-success disabled" role="button">{{ $categoria->nm_categoria_objeto }}</a>
        </div>
        <blockquote>
            <p class="lead text-success">
                {{ $categoria->ds_categoria_objeto }}
            </p>
        </blockquote>
        @if (!$objetos->isEmpty())
            <div class="list-group">
                @foreach ($objetos as $key => $objeto)
                    <a href="/Administrativo/{{ $categoria->nm_categoria_objeto }}/{{ $objeto->nm_objeto_descarte }}" class="list-group-item">
                        @if (count($objeto->conteudos))
                            <span class="badge">{{ count($objeto->conteudos) }}</span>
                        @endif
                        <h4 class="list-group-item-heading">{{ $objeto->nm_objeto_descarte }}</h4>
                        <p class="list-group-item-text">{{ $objeto->ds_objeto_descarte }}</p>
                    </a>
                @endforeach
            </div>
        @else
            <p class="lead text-center">
                Parece que não há objetos cadastrados no momento :(<br>
                Tente novamente mais tarde :)
            </p>
        @endif
    </div>
@endsection