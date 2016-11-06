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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".add-category">
                    <h4 style="margin: 2px"><i class="fa fa-plus-circle"></i> Novo Material Aceito</h4 style="padding: 0;margin: 0">
                </button>
            </div>
            <!-- Admin Category Add Modal -->
            <form role="form" method="POST" action="/Pontos de Descarte">
                <div class="modal fade add-category" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title text-center">Adicionando Ponto de Descarte</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-sm-12">
                                        <label for="nome">Categoria:</label>
                                        <div class="input-group">
                                            <?php $checked = "" ?>
                                            @foreach($categorias as $key => $item)
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
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /Admin Category Add Modal -->
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