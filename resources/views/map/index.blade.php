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
        @if (!$pontos->isEmpty())
            <div class="list-group">
                @foreach($pontos as $key => $ponto)
                    <a href="/Pontos de Descarte/{{ $ponto->nm_ponto_descarte }}" class="list-group-item">
                        {{ $ponto->nm_ponto_descarte }}
                    </a>
                @endforeach
            </div>
        @else
            <p class="lead text-center">
                Parece que não há pontos de descarte cadastrados em nosso sistema :(<br>
                Aproveite e cadastre um :)
            </p>
        @endif
        @if(Auth::check())
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".add-site">
                    <h4 style="margin: 2px"><i class="fa fa-plus-circle"></i> Novo Ponto de Descarte</h4 style="padding: 0;margin: 0">
                </button>
            </div>
            <!-- Admin Map Add Modal -->
            <form role="form" method="POST" action="/Pontos de Descarte">
                <div class="modal fade add-site" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title text-center">Adicionando Ponto de Descarte</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="id">Código:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input name="id" type="text" class="form-control" disabled>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="nome">Nome:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                            <input name="nome" type="text" class="form-control" placeholder="Ex.: Ecoponto Praia Grande" maxlength="60" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-sm-12">
                                        <label for="descricao">Descrição:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                            <input name="descricao" type="text" class="form-control" placeholder="Ex.: Próximo a FATEC Praia Grande" maxlength="100" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-sm-6">
                                        <label for="latitude">Latitude:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <input name="latitude" type="text" class="form-control" placeholder="Ex.: -24.0054046" maxlength="20" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="longitude">Longitude:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <input name="longitude" type="text" class="form-control" placeholder="Ex.: -46.41278269999998" maxlength="20" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-sm-12">
                                        <label for="nome">Categoria:</label>
                                        <div class="input-group">
                                            @foreach($categorias as $item)
                                                <input type="checkbox" name="categorias[]" value="{{ $item->cd_categoria_objeto }}"> {{ $item->nm_categoria_objeto }}</input>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /Admin Map Add Modal -->
        @endif
    </div>
@endsection