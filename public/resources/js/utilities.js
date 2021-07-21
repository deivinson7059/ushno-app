
/*
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
validMail() => Valida la estructura inicial de un correo
	email => Correo a validar
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
*/

function validMail(email) {
	var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

	if (caract.test(email) == false) {
		return false;
	} else {
		return true;
	}
}

/*
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
saveToDisk => Forza la descarga de cualquier archivo
fileURL => URL del archivo incluyendo el archivo y la extension 
fileName => Nombre que tendra el archivo destino
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
*/
function saveToDisk(fileURL, fileName) {
	// for non-IE
	if (!window.ActiveXObject) {
		var save = document.createElement('a');
		save.href = fileURL;
		save.target = '_blank';
		save.download = fileName || 'unknown';

		var evt = new MouseEvent('click', {
			'view': window,
			'bubbles': true,
			'cancelable': false
		});
		save.dispatchEvent(evt);

		(window.URL || window.webkitURL).revokeObjectURL(save.href);
	}
	// for IE < 11
	else if (!!window.ActiveXObject && document.execCommand) {
		var _window = window.open(fileURL, '_blank');
		_window.document.close();
		_window.document.execCommand('SaveAs', true, fileName || fileURL)
		_window.close();
	}
}

/*
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
sumDate => Sumar o restar fechas
fecha | Fecha en formato YYYY-MM-DD // Formato español
intervalo | Cantidad de días, meses o años // “1”, “+1”, “-1” // Número enteros
dma | Indicador de día, mes o año – “d”, “m”, “y” // days, months o years
simbolo | Símbolo que separa la fecha, si no lo pasamos por defecto será “-”
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
*/
function sumDate(fecha, intervalo, dma, simbolo) {

	if (fecha == '') {
		fecha = utilCurrentDate;
	}

	var simbolo = simbolo || "-";
	var arrayFecha = fecha.split(simbolo);
	var dia = arrayFecha[2];
	var mes = arrayFecha[1];
	var anio = arrayFecha[0];

	var fechaInicial = new Date(anio, mes - 1, dia);
	var fechaFinal = fechaInicial;
	if (dma == "m" || dma == "M") {
		fechaFinal.setMonth(fechaInicial.getMonth() + parseInt(intervalo));
	} else if (dma == "y" || dma == "Y") {
		fechaFinal.setFullYear(fechaInicial.getFullYear() + parseInt(intervalo));
	} else if (dma == "d" || dma == "D") {
		fechaFinal.setDate(fechaInicial.getDate() + parseInt(intervalo));
	} else {
		return fecha;
	}
	dia = fechaFinal.getDate();
	mes = fechaFinal.getMonth() + 1;
	anio = fechaFinal.getFullYear();

	dia = (dia.toString().length == 1) ? "0" + dia.toString() : dia;
	mes = (mes.toString().length == 1) ? "0" + mes.toString() : mes;

	return anio + "-" + mes + "-" + dia;
}

/*
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
BlockUI para bloquear mientras la peticion
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
*/
function BlockUI(div = '') {
	if (div == '') {
		$.blockUI({
			css: {
				//border: 'none', 
				padding: '15px',
				backgroundColor: '#000',
				'-webkit-border-radius': '10px',
				'-moz-border-radius': '10px',
				opacity: .5,
				color: '#fff'
			},
			message: '<img src="../resources/client/images/gears.gif" /> <h2> Por favor espere...</h2>'
		});
	} else {
		$(div).block(
			{
				css: {
					//border: 'none', 
					//padding: '15px', 
					backgroundColor: '#000',
					'-webkit-border-radius': '10px',
					'-moz-border-radius': '10px',
					opacity: .5,
					color: '#fff'
				},
				message: '<img src="../resources/client/images/gears.gif" />'
			});
	}
}

/*
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
UnblockUI Desbloquea el primer Block que encuentre.
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
*/

function UnblockUI() {
	$.unblockUI();
}

/*
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
delayFocus Retarda la asignacion de un focus por aquello de la animación
@selector -> Id o Name del elemento
@time -> Tiempo de espera para asignar el focus por default medio segundo
║║║║║║║║║║║║║║║║║║║║║║║║║║║║
*/
function delayFocus(selector, time = 500) {
	setTimeout(function () {
		$(selector).focus();
	}, time);
}

function utilComillas(str) {
	return str.replace(/'/g, "\\'").replace(/"/g, "\\'\\'");

}

/**
 ============
 Utilidad que permite anular informacion que no es soportada
 en la parte numerica en un campo editable o input de formulario
 ============
/**/

function validNumeric(field, maxLength, removeBR) {
	if (removeBR) {
		$(field).find('br').remove();
	}

	var varField = $(field).html().replace(',', '.');
	var number = varField.split('.');

	if (number.length == 2 && number[1].toString().length > maxLength) {
		varField = number[0] + '.' + number[1].substring(0, 4);
	}

	if ($.isNumeric(varField)) { //UPDATE MAXLENGTH HERE
		$(field).html(varField);
		return true;
	} else {
		$(field).html(0);
		return false;
	}
}

function showMessage(response, message) {
	if (response == 'OK') {
		toastr.success('La operación de ' + message + ' se realizó correctamente', 'Exito!');
	} else {
		toastr.error('Ocurrió un error al ' + message + ' la información', 'Oops :(');
	}
}

// ======================== UTILIDADES GENERALES =======================
/* este objeto se encarga de las peticiones PHP */
var utilRequest = {
	sendFile: function (output, vars, formName, method, urlRequest, async, action) {
		var oOutput = $(output);
		oOutput.html('');

		oData = new FormData(document.forms.namedItem(formName));

		//oData.append("request", "setColores");
		for (i in vars) {
			oData.append(i, vars[i]);
		}

		var oReq = new XMLHttpRequest();
		oReq.open(method, urlRequest, async);
		oReq.onload = function (oEvent) {
			if (oReq.status == 200)
				action(oReq.responseText);
			else
				oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
		};
		oReq.send(oData);
	},

	send: function (url, method, data, async, action) {
		$('html, body').css('cursor', 'wait');
		var request = $.ajax({
			headers: { "Accept": "application/json" },
			crossDomain: true,
			url: url,
			type: method,
			data: data,
			async: async,
			dataType: "html"
		});
		return request.done(function (response) {
			try {
				action(response);
				$('html, body').css('cursor', 'initial');
			} catch (err) {
				//console.log(err.message);
				//console.log(response);
				$('html, body').css('cursor', 'initial');
				action(response);
			}

		});
	},
	showError: function (message) {
		$('.responseErrors').html('<pre>' + message + '</pre>').show();
	}
};

$.extend(utilRequest);

/* muestra/oculta un elemento con el efecto slide
en la direccion pasada (up, down, lef o right) */
//effects.slide.show('#txtRef','left',2000);
var effects = {
	element: null,
	slide: {
		show: function (element, dir, time) {
			this.element = $(element);
			this.element.show('slide', { direction: dir }, time);
		},
		hide: function (element, dir, time) {
			this.element = $(element);
			this.element.hide('slide', { direction: dir }, time);
		},
		toggle: function (element, dir, time) {
			this.element = $(element);
			this.element.toggle('slide', { direction: dir }, time);
		},
	},
	lux: {
		show: function (element) {
			for (var i = 1; i <= 3; ++i) {
				setTimeout(function () {
					$(element).effect('highlight');
				}, 500);
			}
		}
	}
}

var utilForm = {
	form: null,
	clean: function (form) {
		$(form).each(function () {
			this.reset();
		});
	},
	//Hace que el enter funcione como tab. y pasa el focus al siguiente control.
	enterTab: function (form) {
		$(form).on('keydown', 'input, select, textarea', function (e) {
			var self = $(this)
				, form = self.parents('form:eq(0)')
				, focusable
				, next
				;
			if (e.keyCode == 13) {
				focusable = form.find('input,a,select,button,textarea').filter(':enabled');
				next = focusable.eq(focusable.index(this) + 1);
				if (next.length) {
					next.focus();
				} else {
					form.submit();
				}
				return false;
			}
		});
	}
}

// PESTAÑA, TABS,
var utilTabs = {
	change: function (idOption) {
		$('.nav-tabs a[href=#' + idOption + ']').tab('show');
	}
}

//Recuerda linkear la libreria de freeow y los css
//el div de las alertas es <div id="freeow" class="freeow freeow-top-right"></div>
var utilAlert = {
	showAlert: function (div, style, icon, width, autoHide, title, msg) {
		// With options
		$(div).freeow(title, msg, {
			classes: [style, icon, "slide"],
			//clases = simple, osx, smokey, gray
			//icon = slide, notice, pushpin
			autoHide: autoHide,
			showStyle: {
				opacity: 1,
				left: 0
			},
			hideStyle: {
				opacity: 0,
				left: width
			}
		});
	}
}

//============ OBTENER EL VALOR DE UN PARAMETRO GET =========
//===== IMPLEMENTACION: var id = $_GET("id"),
function $_GET(param) {
	/* Obtener la url completa */
	url = document.URL;
	/* Buscar a partir del signo de interrogación ? */
	url = String(url.match(/\?+.+/));
	/* limpiar la cadena quitándole el signo ? */
	url = url.replace("?", "");
	url = url.replace("#", "");
	/* Crear un array con parametro=valor */
	url = url.split("&");

	/* 
	Recorrer el array url
	obtener el valor y dividirlo en dos partes a través del signo = 
	0 = parametro
	1 = valor
	Si el parámetro existe devolver su valor
	*/
	x = 0;
	while (x < url.length) {
		p = url[x].split("=");
		if (p[0] == param) {
			return decodeURIComponent(p[1]);
		}
		x++;
	}
}
