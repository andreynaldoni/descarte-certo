@extends('layout')

@section('title', $categoria->nm_categoria_objeto . ' > ' . $objeto->nm_objeto_descarte . ' > ' . $conteudo->nm_conteudo_objeto)

@section('content')
    <div class="page-header">
        <h1 class="text-center">{{ $conteudo->nm_conteudo_objeto  }}</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/{{ $categoria->nm_categoria_objeto }}">{{ $categoria->nm_categoria_objeto }}</a></li>
        <li><a href="/{{ $categoria->nm_categoria_objeto }}/{{ $objeto->nm_objeto_descarte }}">{{ $objeto->nm_objeto_descarte }}</a></li>
        <li class="active">{{ $conteudo->nm_conteudo_objeto }}</li>
    </ol>
    <p>{{ $conteudo->ds_conteudo_objeto }}</p>
    <div class="thumbnail">
        <img src="{{ $conteudo->ds_caminho_imagem }}" alt="{{ $conteudo->nm_conteudo_objeto  }}">
        <div class="caption">
            <h3>{{ $conteudo->nm_conteudo_objeto }}</h3>
            <p>{{ $objeto->ds_objeto_descarte }}</p>
        </div>
    </div>
    <div class="thumbnail">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $conteudo->ds_caminho_video }}" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="caption">
            <h3>{{ $conteudo->nm_conteudo_objeto }}</h3>
            <p>{{ $objeto->ds_objeto_descarte }}</p>
        </div>
    </div>
@endsection