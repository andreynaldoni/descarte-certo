@extends('layout')

@section('title', 'Pontos de Descarte > ' . $ponto->nm_ponto_descarte)

@section('content')
    <div class="page-header">
        <h1 class="text-center">{{ $ponto->nm_ponto_descarte }}</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/Pontos de Descarte">Pontos de Descarte</a></li>
        <li class="active">{{ $ponto->nm_ponto_descarte }}</li>
    </ol>
    <div class="thumbnail">
        <div id="gmap_canvas" style="height:440px;width:100%;"></div>
        <div class="caption">
            <p class="lead">{{ $ponto->ds_ponto_descarte }}</p>
        </div>
    </div>
    <div class="row container">
        <h2 class="text-center">Materiais Aceitos</h2>
        <div class="list-group">
            @foreach($ponto->categorias as $categoria)
                <a href="/{{ $categoria->nm_categoria_objeto }}" class="list-group-item">{{ $categoria->nm_categoria_objeto }}</a>
            @endforeach
        </div>
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