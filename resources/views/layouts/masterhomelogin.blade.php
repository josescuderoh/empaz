<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EmPaz - @yield('title')</title>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  <link rel="stylesheet" href="/css/bootstrap-slider.css">
  <link href="/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/styles.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">

</head>

<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="row">
  <div class="col-md-3">
  <a class="navbar-brand" href="#"><img src="img/logo.svg" width="130"></a>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-6" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Manual de usuario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/faq">Preguntas frecuentes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Glosario</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <span>Cuestionario</span>
          <a class="dropdown-item" href="/cuestionarios">Crear cuestionario</a>
          <a class="dropdown-item" href="/dimensiones">Dimensiones</a>
          <a class="dropdown-item" href="/indicadores">Indicadores</a>
          <a class="dropdown-item" href="/preguntas">Preguntas</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
</div> 
  </div>
  </div>

</nav>
</header>
<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" id="slide1">
      <div class="content-slider">
        <div class="text"><h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo con</h4>
        <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div>
      </div>
    </div>
    <div class="carousel-item" id="slide2">
      <div class="content-slider">
        <div class="text"><h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo con</h4>
        <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div>
      </div>
    </div>
    <div class="carousel-item" id="slide3">
      <div class="content-slider">
        <div class="text"><h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo con</h4>
        <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div>
      </div>
    </div>
  </div>
</div>
</section>
<section id="section02">
  <div class="container">
  <div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-7"><div class="text"><h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo con</h4>
        <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div></div>
  </div>
</div>  
</section>
</body>
<script src="/popper/umd/popper.js"></script>
<script src="/js/bootstrap-slider.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
  crossorigin="anonymous"></script>
<script src="/js/jquery.multi-select.js" type="text/javascript"></script>

</html>