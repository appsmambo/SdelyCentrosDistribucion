var departamento, provincia, distrito;

$.getJSON(baseUrl + "/json/ubigeo_departamento.json", function(json) {
	departamento = json;
});

$.getJSON(baseUrl + "/json/ubigeo_provincia.json", function(json) {
	provincia = json;
});

$.getJSON(baseUrl + "/json/ubigeo_distrito.json", function(json) {
	distrito = json;
});

function limpiarControles(controles) {
	$('#distrito').html('<option value="">DISTRITO</option>');
	if (controles == 2)
		$('#provincia').html('<option value="">PROVINCIA</option>');
}

$(function() {
	$('#departamento').change(function() {
		var id = $(this).val();
		if (id !== '') {
			var html = '<option value="">PROVINCIA</option>';
			$.each(provincia, function(i, item) {
				if (id == item.id_departamento) {
					html += '<option value="' + item.id + '">' + item.provincia + '</option>';
				}
			});
			$('#provincia').html(html);
			limpiarControles(1);
		} else {
			limpiarControles(2);
		}
	});
	$('#provincia').change(function() {
		var id = $(this).val();
		if (id !== '') {
			var html = '<option value="">DISTRITO</option>';
			$.each(distrito, function(i, item) {
				if (id == item.id_provincia) {
					html += '<option value="' + item.id + '">' + item.distrito + '</option>';
				}
			});
			$('#distrito').html(html);
		}
	});
	$("#formulario").validate();
});