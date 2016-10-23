<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Descarte Certo - @yield('title')</title>
    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" aria-expanded="false" aria-controls="navbar" type="button" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Menu saduíche</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><i class="fa fa-recycle" style="vertical-align:middle"></i> Descarte Certo</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li {{ Request::segment(1) == '' ? 'class=active' : '' }}><a href="/"><i class="fa fa-home"></i> Home</a></li>
                    <li {{ Request::segment(1) == 'Pontos%20de%20Descarte' ? 'class=active' : '' }}><a href="/Pontos de Descarte"><i class="fa fa-map-o"></i> Pontos de descarte</a></li>
                    <!-- <li><a href="#about"><i class="fa fa-info-circle"></i> Sobre</a></li>
                    <li><a href="#contact"><i class="fa fa-paper-plane-o"></i> Contato</a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer">
        <div class="container">
            <p class="text-footer">&copy; 2016 Descarte Certo · Todos os direitos reservados</p>
        </div>
    </footer>
    <!-- JS Dependencies -->
    <script src="/js/jquery-3.1.0.js"></script>
    <script src="/js/bootstrap.js"></script>
    @yield('script')
</body>
</html>