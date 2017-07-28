$(document).ready(function(){
	Cargar();
})

function Cargar() {
	var tablaDatos = $('#datos');
	var route = 'http://localhost:8000/generos';


	$("#datos").empty();
	$.get(route, function(res){
		$(res).each(function(key, value){
			tablaDatos.append("<tr><td>"+value.genre+"</td><td><button value="+value.id+" onClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'﻿>Editar</button><button class='btn btn-danger' value="+value.id+" onClick='Eliminar(this);'>Eliminar</button></td></tr>");
		});
	});
}

function Eliminar(btn) {
	var route = 'http://localhost:8000/genero/'+btn.value;
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			Cargar();
			$("#msj-deleted").fadeIn();
		}
	});
}

function Mostrar(btn) {
	// console.log(btn.value);
	var route = 'http://localhost:8000/genero/'+btn.value+'/edit';

	$.get(route, function(res){
		$("#genre").val(res.genre);
		$("#id").val(res.id);
	});
}

$("#actualizar").click(function(){
	var value = $("#id").val();
	var dato = $("#genre").val();
	var route = 'http://localhost:8000/genero/'+value;
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {genre: dato},
		success: function(){
			Cargar();
			$("#myModal").modal('toggle');
			$("#msj-success").fadeIn();
		}
	});
});