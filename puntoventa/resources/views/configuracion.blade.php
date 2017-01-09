@extends('master')

@section('titulo','Configuracion')

@section('iconoClase','glyphicon glyphicon-tag')

@section('contenido')

<div class="container" style="margin-top:30px;float:left;width:25%;">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Configuración</h3>
		</div>
		<a href="/api/configuracion/marcas" class="list-group-item active">Marcas</a>
		<a href="/api/configuracion/unidades" class="list-group-item">Unidades</a>
		<a href="/api/configuracion/bodegas" class="list-group-item">Bodega</a>
		<a href="/api/configuracion/cajas" class="list-group-item">Caja</a>
		<a href="/api/configuracion/categorias" class="list-group-item">Categoria</a>
		<a href="/api/configuracion/subcategorias" class="list-group-item">SubCategoria</a>
		<a href="/api/configuracion/usuarios" class="list-group-item">Usuarios</a>
	</div>
</div>

<div class="responsive hidden-xs hidden-sm" style="margin-top:30px;float:left;width:75%">
	@yield('contenidoConfiguracion')
</div>



@endsection