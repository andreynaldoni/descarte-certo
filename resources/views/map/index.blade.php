@extends('layout')

@section('title', 'Pontos de Descarte')

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="page-header">
            <h1 class="text-center">Pontos de Descarte</h1>
        </div>
        <div class="btn-group btn-breadcrumb">
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-success disabled" role="button">Pontos de Descarte</a>
        </div>
        <div class="row container">
            <div class="list-group">
                @foreach($pontos as $key => $ponto)
                    <a href="/Pontos de Descarte/{{ $ponto->nm_ponto_descarte }}" class="list-group-item">{{ $ponto->nm_ponto_descarte }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection