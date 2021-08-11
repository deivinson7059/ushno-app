// =================== CONTROL DE EVENTOS =================== //
$('#frmLogin').on('submit', function (e) {
	e.preventDefault();
	login();
})

var urlBase = "https://api-web.danisoft.com.co//ushno-api/public/auth/login";

// =================== FUNCIONES ================== //
function BlockUIDs() {
	$.blockUI({
		overlayCSS: {
			backgroundColor: '#1ab294'
		},
		message: '<h1> Procesando...</h1>'
	});
}

function login() {
	var datos = {
		user_mail: $('#user_mail').val(),
		user_pass: $('#user_pass').val(),

	}
	console.log(datos);
	BlockUIDs();
	utilRequest.send(urlBase, 'POST', datos, true, function (response) {
		UnblockUI();

		response = JSON.parse(response);
		console.log(response);
		if (response.status == 200) {
			toastr.success('!Bienvenido!', 'Bienvenido');
			localStorage.clear();
			localStorage.setItem('token', response.token);
			window.location.href = "https://api-web.danisoft.com.co//ushno-app/public/admin";

		} else {
			console.log(response.messages);
			toastr.error('Por favor verifíque sus credenciales', response.messages.error);
			$('#user_mail').focus();
		}
	});
}

// =================== MAIN CODE =================== //
//validar();
$('#user_mail').focus();