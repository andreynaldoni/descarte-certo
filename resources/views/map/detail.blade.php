@extends('layout')

@section('title', 'Pontos de Descarte > ' . $ponto->nm_ponto_descarte)

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="page-header">
            <h1 class="text-center">{{ $ponto->nm_ponto_descarte }}</h1>
        </div>
        <div class="btn-group btn-breadcrumb">
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="/Pontos de Descarte" class="btn btn-success">Pontos de Descarte</a>
            <a href="#" class="btn btn-success disabled" role="button">{{ $ponto->nm_ponto_descarte }}</a>
        </div>
        <div class="thumbnail">
            <div id="gmap_canvas" style="height:440px;width:100%;"></div>
            <div class="caption">
                <p class="lead">{{ $ponto->ds_ponto_descarte }}</p>
            </div>
        </div>
        <h2 class="text-center">Materiais Aceitos</h2>
        <div class="list-group">
            @foreach($ponto->categorias as $categoria)
                <a href="/{{ $categoria->nm_categoria_objeto }}" class="list-group-item">{{ $categoria->nm_categoria_objeto }}</a>
            @endforeach
        </div>
        @if(Auth::check())
            <div class="pull-right">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".delete-site">
                    <h4 style="margin: 2px"><i class="fa fa-minus-circle"></i> Excluir Ponto</h4 style="padding: 0;margin: 0">
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".edit-site">
                    <h4 style="margin: 2px"><i class="fa fa-pencil"></i> Editar Ponto</h4 style="padding: 0;margin: 0">
                </button>
            </div>
            <!-- Admin Map Edit Modal -->
            <form role="form" method="POST" action="/Pontos de Descarte/{{ $ponto->nm_ponto_descarte }}/edit">
                <div class="modal fade edit-site" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title text-center">Editando {{ $ponto->nm_ponto_descarte }}</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="id">Código:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input name="id" type="hidden" value="{{ $ponto->cd_ponto_descarte }}">
                                            <input name="id" type="text" class="form-control" value="{{ $ponto->cd_ponto_descarte }}" disabled>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="nome">Nome:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                            <input name="nome" type="text" class="form-control" placeholder="Ex.: Ecoponto Praia Grande" maxlength="60" value="{{ $ponto->nm_ponto_descarte }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-sm-12">
                                        <label for="descricao">Descrição:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                            <input name="descricao" type="text" class="form-control" placeholder="Ex.: Próximo a FATEC Praia Grande" value="{{ $ponto->ds_ponto_descarte }}" maxlength="100" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-sm-6">
                                        <label for="latitude">Latitude:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <input name="latitude" type="text" class="form-control" placeholder="Ex.: -24.0054046" maxlength="20" value="{{ $ponto->cd_latitude }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="longitude">Longitude:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <input name="longitude" type="text" class="form-control" placeholder="Ex.: -46.41278269999998" maxlength="20" value="{{ $ponto->cd_longitude }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-sm-12">
                                        <label for="nome">Categoria:</label>
                                        <div class="input-group">
                                            @foreach($categorias as $item)
                                                <?php $checked = "" ?>
                                                @foreach($ponto->categorias as $categoria)
                                                    @if ($categoria->nm_categoria_objeto == $item->nm_categoria_objeto)
                                                        <?php $checked = "checked" ?>
                                                    @endif
                                                @endforeach
                                                <input type="checkbox" name="categorias[]" value="{{ $item->cd_categoria_objeto }}" <?= $checked ?>> {{ $item->nm_categoria_objeto }}</input>
                                                <?php $checked = "" ?>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success">Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /Admin Map Edit Modal -->
            <!-- Admin Map Delete Modal -->
            <form method="POST" action="/Pontos de Descarte/{{ $ponto->nm_ponto_descarte }}/delete">
                <input name="id" type="hidden" value="{{ $ponto->cd_ponto_descarte }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal fade delete-site" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title text-center">Excluir {{ $ponto->nm_ponto_descarte }}</h2>
                            </div>
                            <div class="modal-body">
                                <h3 class="text-center">Você realmente tem certeza de que vai excluir "{{ $ponto->nm_ponto_descarte }}"?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /Admin Map Delete Modal -->
        @endif
    </div>
@endsection

@section('script')
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwZLTBPEbTCGs4m8h8zVNfKi8OE6wLDNc&callback=initialize'></script>
    <script type='text/javascript'>
        function init_map() {
            var myOptions = {
                zoom: 17,
                center: new google.maps.LatLng({{ $ponto->cd_latitude }}, {{ $ponto->cd_longitude }}),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng({{ $ponto->cd_latitude }}, {{ $ponto->cd_longitude }})
            });
            infowindow = new google.maps.InfoWindow({
                content: '<strong>{{ $ponto->nm_ponto_descarte }}</strong><br>{{ $ponto->ds_ponto_descarte }}<br>'
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
@endsection