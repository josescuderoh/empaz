<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" value="{{ old('viewport') }}" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EmPaz - @yield('title')</title>
  <meta name="description" content="EmPaz es una herramienta en línea, desarrollada por la Fundación Ideas para la Paz (FIP) y la Cámara de Comercio de Bogotá (CCB), que permite evaluar los aportes a la construcción de paz que genera una organización desde su gestión estratégica y a través de iniciativas, en el marco de su operación comercial e inversión social. Está dirigida a empresas de cualquier tamaño y sector, a fundaciones empresariales, asociaciones y gremios.">
  <meta name="keywords" content="Empresas,Paz">
  <meta name="author" content="FIP, CCB">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">

  <link rel="stylesheet" href="/css/bootstrap-slider.css">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link href="/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/styles.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab:100,300,400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
    rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
<script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>

<!-- Analytics for both parties -->

<!--  Google Analytics for FIP -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125477076-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-125477076-1');
</script>

<!-- Google Tag Manager for CCB-->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K45NWW');
</script>
<!-- End Google Tag Manager -->


</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K45NWW"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

<header class="master">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/home">
          <img src="/img/logo-b.png" width="130">
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="/acerca">Acerca de Empaz</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="/manual" target="_blank">Manual</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="/faqs">Preguntas frecuentes</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="/glosario" target="_blank">Glosario</a>
                  </li>

                  <!-- If user is authenticated -->
                  @if(Auth::user())
                  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Acciones de usuario
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if(Auth::user()->role === 'superadmin')
                            <div class="menu-usuarios">
                                <a class="dropdown-item" href="/users"><i class="dropdown-icon fa fa-users" aria-hidden="true"></i>Usuarios</a>
                            </div>
                            @endif
                            @if(Auth::user()->role === 'experto' || Auth::user()->role === 'superadmin')
                                <a class="dropdown-item" href="/cuestionarios"><i class="dropdown-icon fa fa-list-ul" aria-hidden="true"></i>Cuestionario</a>
                                <a class="dropdown-item" href="/dimensiones"><i class="dropdown-icon fa fa-pie-chart" aria-hidden="true"></i>Dimensiones</a>
                                <a class="dropdown-item" href="/indicadores"><i class="dropdown-icon fa fa-area-chart" aria-hidden="true"></i>Indicadores</a>
                                <a class="dropdown-item" href="/preguntas"><i class="dropdown-icon fa fa-question-circle" aria-hidden="true"></i></i>Preguntas</a>
                                <a class="dropdown-item" href="/files"><i class="dropdown-icon fa fa-copy" aria-hidden="true"></i></i>Archivos</a>
                            @endif
                            @if(Auth::user()->role != 'consulta')
                            <a class="dropdown-item" href="/responder"><i class="dropdown-icon fa fa-briefcase" aria-hidden="true"></i>Cuestionario EmPaz</a>
                            @endif
                            @if(Auth::user()->role != 'empresa')
                            <a class="dropdown-item" href="/dashboard"><i class="dropdown-icon fa fa-tachometer" aria-hidden="true"></i>Resultados</a>
                            @endif
                            <a class="dropdown-highlight dropdown-item" href="{{ Auth::user()->role === 'empresa' ? '/profile/empresa' : '/profile/user' }}"><i class="dropdown-icon fa fa-info-circle" aria-hidden="true"></i>Perfil</a>
                            <a class="dropdown-highlight dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="dropdown-icon fa fa-sign-out" aria-hidden="true"></i>Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
            </ul>
            @else
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-user" aria-hidden="true"></i> Ingresar
            </button>
            @endif
        </div>
  </nav>
</header>
  <div class="container app-container">
    @include('inc.messages')
    @yield('content')
  </div>

  <div class="modal {{ !$errors->has('auth') ? 'fade' : '' }}" id="exampleModal" data-keep-showing="{{ $errors->has('auth') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="row">
        <div class="col-md-5 derecha">
          <h3>Registrar nueva empresa</h3>
           <a href="/registro">Crear nuevo perfil</a>
        </div>
        <div class="col-md-7">
        <h3>Ingresar</h3>
           <div class="panel panel-default">

                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                              <div class="col-md-10">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                  <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" value="{{ old('email') }}" required autofocus>
                              </div>
                          </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                              <div class="col-md-10">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" value="{{ old('password') }}" required>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                              </div>
                            </div>

                          <div class="form-group" id="contentemail">
                              <div class="col-md-6 col-md-offset-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember" value="{{ old('remember') }}" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                      </label>
                                  </div>
                              </div>
                              @if ($errors)
                                  <span class="help-block">
                                      <strong>{{ $errors->first() }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group">
                              <div class="col-md-10">
                                  <button type="submit" class="btn btn-primary">
                                      Ingresar
                                  </button>

                                  <a class="recuperarpass" style="color: #fff!important;" href="{{ route('password.request') }}">
                                      ¿Olvidó su contraseña?
                                  </a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div></div></div>
        </div>
      </div>
    </div>
  </div>

  <footer>
  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
      <a class="navbar-brand" href="http://ideaspaz.org/" target="_blank"><img src="/img/logo-fip.svg" width="100"></a>
      <a class="navbar-brand" href="https://www.ccb.org.co/" target="_blank"><img src="/img/CCB_140.png" width="190"></a>
    </div>
  </div>
</footer>
</body>

<script src="/popper/umd/popper.js"></script>
<script src="/js/bootstrap-slider.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
  crossorigin="anonymous"></script>
<script src="/js/jquery.multi-select.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('tbody').sortable();
  })

</script>

</html>
