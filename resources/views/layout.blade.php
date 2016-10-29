<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Descarte Certo - @yield('title')</title>
    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#4caf50">
    <meta name="theme-color" content="#4caf50">
    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
</head>
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
                <ul id="menu-itens" class="nav navbar-nav navbar-right">
                    <li {{ Request::segment(1) == '' ? 'class=active' : '' }}><a href="/"><i class="fa fa-home"></i> Home</a></li>
                    <li {{ Request::segment(1) == 'Pontos%20de%20Descarte' ? 'class=active' : '' }}><a href="/Pontos de Descarte"><i class="fa fa-map-o"></i> Pontos de descarte</a></li>
                    <li><a href="#"><i class="fa fa-user-circle-o"></i> Administrativo</li></a>
                    <!-- <li><a href="#about"><i class="fa fa-info-circle"></i> Sobre</a></li>
                    <li><a href="#contact"><i class="fa fa-paper-plane-o"></i> Contato</a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->
    
        @yield('content')
    
    <footer>
        <div class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Descarte Certo</h2>
                        <p>
                            Objeto de aprendizagem criado pelos alunos Andrey, Paulo, Yunes 
                            Luiz e Emerson da <a href="www.fatecpg.com.br">FATEC Praia Grande</a>, 
                            para a disciplina de Gestão de Projetos do Profº Me.: 
                            <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4418727P0">Nelson Nascimento Junior.</a>
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <h2>Contato</h2>
                        <ul class="footer-team">
                            <li>
                                <a href="https://en.linkedin.com/in/andreynaldoni" target="_blank">
                                    <i class="fa fa-linkedin-square"></i><span class="fa-text"> /in/andreynaldoni</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://br.linkedin.com/in/yunesnoronha" target="_blank">
                                    <i class="fa fa-linkedin-square"></i><span class="fa-text"> /in/yunesnoronha</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://br.linkedin.com/in/paulosb" target="_blank">
                                    <i class="fa fa-linkedin-square"></i><span class="fa-text"> /in/paulosb</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h2>Siga-nos</h2>
                        <p class="footer-logo"><i class="fa fa-recycle"></i></p>
                        <h3>Descarte Certo</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bar">
            <div class="container">
                <p class="text-footer">&copy; 2016 Descarte Certo · Todos os direitos reservados</p>
            </div>
        </div>
    </footer>
    <!-- JS Dependencies -->
    <script src="/js/jquery-3.1.0.js"></script>
    <script src="/js/bootstrap.js"></script>
    @if (Request::path() == '/')
        <script src="/js/main.js"></script>
    @endif    
    @yield('script')
</body>
</html>