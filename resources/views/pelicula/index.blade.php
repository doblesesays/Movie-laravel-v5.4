@extends('layouts.admin')
	@include('alerts.success')
	@section('content')
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Genero</th>
				<th>Direccion</th>
				<th>Portada</th>
				<th>Operaciones</th>
			</thead>
			@foreach($movies as $movie)
			<tbody>
				<td>{{ $movie->name }}</td>
				<td>{{ $movie->genre }}</td>
				<td>{{ $movie->direction }}</td>
				<td>
					<img src="movies/{{ $movie->path }}" alt="" style="width: 120px">
				</td>
				<td>Editar</td>
			</tbody>
			@endforeach
		</table>	
	@endsection