@extends('layouts.admin')
	@section('content')
		@include('alerts.success')
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
				<td>
					{!! link_to_route('pelicula.edit', $title = "Editar", $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary']); !!}
				</td>
			</tbody>
			@endforeach
		</table>	
	@endsection