@extends('layout')

@section('title', $categoria->nm_categoria_objeto)

@section('content')
    <div class="page-header">
        <h1>{{ $categoria->nm_categoria_objeto }} <small>{{ $categoria->ds_categoria_objeto }}</small></h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">{{ $categoria->nm_categoria_objeto }}</li>
    </ol>
    @if (!$objetos->isEmpty())
        <div class="list-group">
            @foreach ($objetos as $key => $objeto)
                <a href="/{{ $categoria->nm_categoria_objeto }}/{{ $objeto->nm_objeto_descarte }}" class="list-group-item">
                    {{ $objeto->nm_objeto_descarte }}
                    @if (count($objeto->conteudos))
                        <span class="badge">{{ count($objeto->conteudos) }}</span>
                    @endif
                    {{-- <span class="label label-success">Reciclagem</span>
                    <span class="label label-primary">Reaproveitamento</span>
                    <span class="label label-default">Decarte</span> --}}
                </a>
            @endforeach
        </div>
    @else
        <p class="lead text-center">
            Parece que não há objetos cadastrados no momento :(<br>
            Tente novamente mais tarde :)
        </p>
    @endif
@endsection