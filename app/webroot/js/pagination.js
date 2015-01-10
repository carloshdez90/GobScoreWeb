function pagina(controller, pagina) {
	$.ajax({
		type    : 'get',
		url     : 'http://'+servidor+'/'+controller+'/pagination',
		data    : {
			pagina : pagina,
			buscar : $('#buscar').val(),
			limit  : $('#limit').val()
		},
		success : function (data) {
			$('#pagination').html(data);
		},
		error   : function(e) {
			alert("An error occurred: " + e.responseText.message);
		}
	});	
}

function buscarAnterior(controller, action, pagina, role) {
	$.ajax(
		{
			type    : 'get',
			url     : 'http://'+servidor+'/'+controller+'/pagination',
			data    : {
				pagina : pagina ,
				role : role ,
				buscar : $('#buscar').val(),
				limit : $('#limit').val()
			},
			success : function (data) {
				$('#pagination').html(data);
			},
			error   : function(e) {
				alert("An error occurred: " + e.responseText.message);
				console.log(e);
			}
		}
	);	
}

function buscar(controller, action, pagina) {
	$.ajax({
		type    : 'get',
		url     : 'http://'+servidor+'/'+controller+'/'+action,
		data    : {
			pagina : pagina,
			buscar : $('#buscar').val(),
			limit  : $('#limit').val()
		},
		success : function (data) {
			$('#pagination').html(data);
		},
		error   : function(e) {
			alert(pagina)
			alert("An error occurred: " + e.responseText.message);
		}
	});	
}

