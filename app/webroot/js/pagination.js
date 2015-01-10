function pagina(controller, pagina, role) {
	$.ajax(
		{
			type    : 'get',
			url     : 'http://'+servidor+'/'+controller+'/pagination',
			data    : { pagina : pagina , role : role, buscar : $('#buscar').val(), limit : $('#limit').val() },
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

function buscar(controller, pagina, role) {
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

function buscarTemp(controller, pagina, role) {
	$.ajax(
		{
			type    : 'get',
			url     : 'http://'+servidor+'/'+controller+'/pagination',
			data    : {
				pagina : pagina ,
				role : role ,
				buscar : $('#buscar').val() ,
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

