@extends('layout')

@section('title', 'Pontos de Descarte')

@section('content')
    <div class="page-header">
        <h1 class="text-center">Pontos de Descarte</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Pontos de Descarte</li>
    </ol>
    <div class="row container">
        <div class="list-group">
            @foreach($pontos as $key => $ponto)
                <a href="/Pontos de Descarte/{{ $ponto->nm_ponto_descarte }}" class="list-group-item">{{ $ponto->nm_ponto_descarte }}</a>
            @endforeach
        </div>
    </div>
@endsection