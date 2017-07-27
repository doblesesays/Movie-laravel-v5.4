$("#registro").click(function() {
	var dato = $("#genre").val();
	var route = "http://localhost:8000/genero";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: {genre: dato},
		success: function(){
			$("#msj-error").fadeOut();
			$("#msj-success").fadeIn();
		},
		error: function(msj) {
			$("#msj-success").fadeOut();
			$("#msj").html(msj.responseJSON.genre);
			$("#msj-error").fadeIn();
		}
	});
})