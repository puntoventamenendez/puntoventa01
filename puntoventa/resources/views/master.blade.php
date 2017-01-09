<!DOCTYPE html>
<html lang="en" ng-app="puntoVenta">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Venta . @yield('titulo')</title>
  </head>

  <body>

    <div class="header clearfix" style="height:30px">
        <nav class="navbar navbar-inverse navbar-fixed-top" style="padding-left:15px;padding-top: 5px;">
          <div class="container-fluid">
            <div class="navbar-header" id="menu-logo">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <i style="font-size:40px;" class="@yield('iconoClase')"></i>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav responsive" id="menu-izquierda" style="margin-left:2%">
                <li role="presentation" class="active"><a href="/venta">Ventas</a></li>
                <li role="presentation" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  Compras <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li role="presentation"><a href="#">Movimientos</a></li>
                    <li role="presentation"><a href="#">Proveedores</a></li>
                  </ul>
                </li>
                <li role="presentation"><a href="#">Inventario</a></li>
                <li role="presentation"><a href="/api/configuracion">Configuracion</a></li>
              </ul>
            </div>
        </nav>
    </div>

    <div class="container" style="width:100%">

      <div class="mainmenu-wrapper">
          @yield('contenido')
      </div>

    </div> <!-- /container -->

    <footer class="footer">

    </footer>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
    <script src="{{asset('angular/app.js')}}"></script>
    <script src="{{asset('angular/controllers/MarcasController.js')}}"></script>
    <script src="{{asset('angular/controllers/UnidadesController.js')}}"></script>
    <script src="{{asset('angular/controllers/BodegasController.js')}}"></script>
    <script src="{{asset('angular/controllers/CajasController.js')}}"></script>
    <script src="{{asset('angular/controllers/CategoriasController.js')}}"></script>
    <script src="{{asset('angular/controllers/SubCategoriasController.js')}}"></script>
  </body>
</html>