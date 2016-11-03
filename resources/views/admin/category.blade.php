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
        <div class="pull-right">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".delete-category">
                <h4 style="margin: 2px"><i class="fa fa-minus-circle"></i> Excluir categoria</h4 style="padding: 0;margin: 0">
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".edit-category">
                <h4 style="margin: 2px"><i class="fa fa-pencil"></i> Editar categoria</h4 style="padding: 0;margin: 0">
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".add-object">
                <h4 style="margin: 2px"><i class="fa fa-plus-circle"></i> Novo objeto</h4 style="padding: 0;margin: 0">
            </button>
        </div>
        <!-- Admin Object Add Modal -->
        <div class="modal fade add-object" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title text-center">Adicionando novo objeto</h2>
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
                                <label for="nome">Objeto:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="nome" type="text" class="form-control" placeholder="Ex.: Computadores" maxlength="60" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-6">
                                <label for="descricao">Descrição:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="descricao" type="text" class="form-control" placeholder="Ex.: Placa Mãe, Gabinete, Memória" maxlength="60" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="categoria">Categoria:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                    <input name="categoria" type="text" class="form-control" value="{{ $categoria->nm_categoria_objeto }}" maxlength="60" disabled>
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
        <!-- /Admin Object Add Modal -->
        <!-- Admin Category Edit Modal -->
        <div class="modal fade edit-category" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title text-center">Editando {{ $categoria->nm_categoria_objeto }}</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="id">Código:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="id" type="hidden" value="{{ $categoria->cd_categoria_objeto }}">
                                    <input name="id" type="text" class="form-control" value="{{ $categoria->cd_categoria_objeto }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="categoria">Nome:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="nome" type="text" class="form-control" value="{{ $categoria->nm_categoria_objeto }}" maxlength="60" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <label for="descricao">Descrição:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="descricao" type="text" class="form-control" value="{{ $categoria->ds_categoria_objeto }}" maxlength="60" required>
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
        <!-- /Admin Category Edit Modal -->
        <!-- Admin Category Delete Modal -->
        <div class="modal fade delete-category" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title text-center">Excluir {{ $categoria->nm_categoria_objeto }}</h2>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Você realmente tem certeza de que vai excluir "{{ $categoria->nm_categoria_objeto }}"?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Admin Category Delete Modal -->
    </div>
@endsection