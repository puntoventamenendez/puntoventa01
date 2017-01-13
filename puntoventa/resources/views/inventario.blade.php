@extends('master')

@section('titulo','Inventario')

@section('iconoClase','glyphicon glyphicon-tag')

@section('contenido')

<div class="container" style="margin-top:30px;float:left;width:25%;">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Inventario</h3>
		</div>
		<a href="/api/inventario/productos" class="list-group-item active">Productos</a>
	</div>
</div>

<div class="responsive hidden-xs hidden-sm" style="margin-top:30px;float:left;width:75%">
	@yield('contenidoInventario')
</div>



@endsection