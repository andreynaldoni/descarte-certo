@extends('layout')

@section('title', $categoria->nm_categoria_objeto . ' > ' . $objeto->nm_objeto_descarte . ' > ' . $conteudo->nm_conteudo_objeto)

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="page-header">
            <h1 class="text-center content"><strong>{{ $conteudo->nm_conteudo_objeto  }}</strong></h1>
        </div>
        <div class="btn-group btn-breadcrumb">
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="/{{ $categoria->nm_categoria_objeto }}" class="btn btn-success">{{ $categoria->nm_categoria_objeto }}</a>
            <a href="/{{ $categoria->nm_categoria_objeto }}/{{ $objeto->nm_objeto_descarte }}" class="btn btn-success">{{ $objeto->nm_objeto_descarte }}</a>
            <a href="#" class="btn btn-success disabled" role="button">{{ $conteudo->nm_conteudo_objeto }}</a>
        </div>
        <p class="content">{!! nl2br(e($conteudo->ds_conteudo_objeto)) !!}</p>
        <div class="thumbnail">
            <img src="{{ $conteudo->ds_caminho_imagem }}" alt="{{ $conteudo->nm_conteudo_objeto  }}">
            <div class="caption text-center">
                Foto reprodução: {{ $objeto->ds_objeto_descarte }}
            </div>
        </div>
        <h2 class="text-center">Aprenda mais sobre tema</h2>
        <div class="thumbnail">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ $conteudo->ds_caminho_video }}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection