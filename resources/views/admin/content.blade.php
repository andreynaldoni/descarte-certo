@extends('layout')

@section('title', 'Administrativo - ' . $categoria->nm_categoria_objeto . ' > ' . $objeto->nm_objeto_descarte . ' > ' . $conteudo->nm_conteudo_objeto)

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="page-header">
            <h1 class="text-center content"><strong>{{ $conteudo->nm_conteudo_objeto  }}</strong></h1>
        </div>
        <div class="btn-group btn-breadcrumb">
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="/Administrativo" class="btn btn-success">Administrativo</a>
            <a href="/Administrativo/{{ $categoria->nm_categoria_objeto }}" class="btn btn-success">{{ $categoria->nm_categoria_objeto }}</a>
            <a href="/Administrativo/{{ $categoria->nm_categoria_objeto }}/{{ $objeto->nm_objeto_descarte }}" class="btn btn-success">{{ $objeto->nm_objeto_descarte }}</a>
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
        <div class="pull-right">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".delete-content">
                <h4 style="margin: 2px"><i class="fa fa-minus-circle"></i> Excluir conteudo</h4 style="padding: 0;margin: 0">
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".edit-content">
                <h4 style="margin: 2px"><i class="fa fa-pencil"></i> Editar conteudo</h4 style="padding: 0;margin: 0">
            </button>
        </div>
        <!-- Admin Content Edit Modal -->
        <div class="modal fade edit-content" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title text-center">Editando {{ $conteudo->nm_conteudo_objeto }}</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="id">Código:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="id" type="hidden" value="{{ $conteudo->cd_conteudo_objeto }}">
                                    <input name="id" type="text" class="form-control" value="{{ $conteudo->cd_conteudo_objeto }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="categoria">Nome:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="nome" type="text" class="form-control" value="{{ $conteudo->nm_conteudo_objeto }}" maxlength="60" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <label for="descricao">Descrição:</label>
                                <textarea class="form-control" name="descricao" placeholder="Ex.: Escreva uma descrição aqui" rows="8" required>{{ $conteudo->ds_conteudo_objeto }}</textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-6">
                                <label for="video">YouTube Vídeo:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-film"></i></span>
                                    <input name="video" type="text" class="form-control" value="{{ $conteudo->ds_caminho_video }}" placeholder="Ex.: https://www.youtube.com/embed/VB9OgYxDm7M" maxlength="60" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="video">Imagem:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                    <input name="video" type="text" class="form-control" value="{{ $conteudo->ds_caminho_imagem }}" placeholder="Ex.: https://link.com/imagem.jpg" maxlength="60" required>
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
        <!-- /Admin Content Edit Modal -->
        <!-- Admin Content Delete Modal -->
        <div class="modal fade delete-content" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title text-center">Excluir {{ $conteudo->nm_conteudo_objeto }}</h2>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Você realmente tem certeza de que vai excluir "{{ $conteudo->nm_conteudo_objeto }}"?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Admin Content Delete Modal -->
    </div>
@endsection