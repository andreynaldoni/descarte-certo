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
        @if (!$conteudos->isEmpty())
            <div class="list-group">
                @foreach($conteudos as $key => $conteudo)
                    <a href="/Administrativo/{{ $categoria->nm_categoria_objeto }}/{{ $objeto->nm_objeto_descarte }}/{{ $conteudo->nm_conteudo_objeto }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $conteudo->nm_conteudo_objeto }}</h4>
                        <p class="list-group-item-text">{{ str_limit($conteudo->ds_conteudo_objeto, 200) }}</p>
                    </a>
                @endforeach
            </div>
        @else
            <p class="lead text-center">
                Parece que não há conteúdos cadastrados no momento :(<br>
                Aproveite o momento e cadastre um :)
            </p>
        @endif
        <div class="pull-right">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".delete-object">
                <h4 style="margin: 2px"><i class="fa fa-minus-circle"></i> Excluir objeto</h4 style="padding: 0;margin: 0">
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".edit-object">
                <h4 style="margin: 2px"><i class="fa fa-pencil"></i> Editar objeto</h4 style="padding: 0;margin: 0">
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".add-content">
                <h4 style="margin: 2px"><i class="fa fa-plus-circle"></i> Novo conteúdo</h4 style="padding: 0;margin: 0">
            </button>
        </div>
        <!-- Admin Content Add Modal -->
        <div class="modal fade add-content" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title text-center">Cadastrando novo conteúdo</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="id">Código:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="id" type="text" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="nome">Nome:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="nome" type="text" class="form-control" placeholder="Ex.: Lixo Eletrônico" maxlength="60" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <label for="descricao">Descrição:</label>
                                <textarea class="form-control" name="descricao" placeholder="Ex.: Escreva uma descrição aqui" rows="8" required></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-6">
                                <label for="video">YouTube Vídeo:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-film"></i></span>
                                    <input name="video" type="text" class="form-control" placeholder="Ex.: https://www.youtube.com/embed/VB9OgYxDm7M" maxlength="60" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="video">Imagem:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                    <input name="video" type="text" class="form-control" placeholder="Ex.: https://link.com/imagem.jpg" maxlength="60" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Admin Content Add Modal -->
        <!-- Admin Object Edit Modal -->
        <div class="modal fade edit-object" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title text-center">Editando {{ $objeto->nm_objeto_descarte }}</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="id">Código:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="id" type="hidden" value="{{ $objeto->cd_objeto_descarte }}">
                                    <input name="id" type="text" class="form-control" value="{{ $objeto->cd_objeto_descarte }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="categoria">Nome:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="nome" type="text" class="form-control" value="{{ $objeto->nm_objeto_descarte }}" maxlength="60" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <label for="descricao">Descrição:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="descricao" type="text" class="form-control" value="{{ $objeto->ds_objeto_descarte }}" maxlength="60" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Admin Object Edit Modal -->
        <!-- Admin Object Delete Modal -->
        <div class="modal fade delete-object" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title text-center">Excluir {{ $objeto->nm_objeto_descarte }}</h2>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Você realmente tem certeza de que vai excluir "{{ $objeto->nm_objeto_descarte }}"?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Admin Object Delete Modal -->
    </div>
@endsection