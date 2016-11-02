@extends('layout')

@section('title', 'Administração')

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="page-header">
            <h1 class="text-center">Administração</h1>
        </div>
        <div class="btn-group btn-breadcrumb">
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="/Administrativo" class="btn btn-success">Administrativo</a>
        </div>
        <!-- Admin Categories List -->
        @if (!$categorias->isEmpty())
            <div class="list-group">
                @foreach ($categorias as $key => $categoria)
                    <a href="/Administrativo/{{ $categoria->nm_categoria_objeto }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $categoria->nm_categoria_objeto }}</h4>
                        <p class="list-group-item-text">{{ $categoria->ds_categoria_objeto }}</p>
                    </a>
                @endforeach
            </div>
        @endif
        <div class="pull-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".add-category">
                <h4 style="margin: 2px"><i class="fa fa-plus-circle"></i> Nova categoria</h4 style="padding: 0;margin: 0">
            </button>
        </div>
        {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".remove-category">
            <h4 style="margin: 2px"><i class="fa fa-minus-circle"></i> Apagar categoria</h4 style="padding: 0;margin: 0">
        </button> --}}
        <!-- /Admin Categories List -->
        <!-- Admin Category Add Modal -->
        <div class="modal fade add-category" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title text-center">Adicionando nova categoria</h2>
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
                                <label for="categoria">Categoria:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="categoria" type="text" class="form-control" placeholder="Ex.: Plástico" maxlength="60" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <label for="descricao">Descrição:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="descricao" type="text" class="form-control" placeholder="Ex.: Materiais Plásticos (Garrafas, Copos)" maxlength="60" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-sm-12">
                                <label for="imamgem" style="margin-top: 10px">Imagem:</label>
                            </div>
                            <div class="col-sm-12">
                                <img src="/img/category/3.png" alt="Categoria"height="100">
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
        <!-- /Admin Category Add Modal -->
        <!-- Admin Category Remove Modal -->
        <!-- /Admin Category Remove Modal -->
    </div>
@endsection