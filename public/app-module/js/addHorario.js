// =================== CONTROL DE EVENTOS =================== //
$('#frmLogin').on('submit', function (e) {
    e.preventDefault();
    save();
})

var urlBase = "https://api-web.danisoft.com.co//ushno-api/public/admin/horario/save";

// =================== FUNCIONES ================== //
function BlockUIDs() {
    $.blockUI({
        overlayCSS: {
            backgroundColor: '#1ab294'
        },
        message: '<h1> Procesando...</h1>'
    });
}

function save() {
    var datos = {
        user_id: 5,
        horario: $('#txtHorario').val(),
        descripcion: $('#txtDesc').val(),
        te_id: $('#cbTeam').val(),
        dia_id: $('#cbDia').val(),
        frase: $('#txtFrase').val(),
        hor_id: $('#hor_id').val(),

    }
    console.log(datos);
    BlockUIDs();
    utilRequest.send(urlBase, 'POST', datos, true, function (response) {
        UnblockUI();
        response = JSON.parse(response);
        console.log(response);
        if (response.status == 200) {
            showMessage("OK", "guardar");
            window.location.href = "https://api-web.danisoft.com.co//ushno-app/public/admin/horario";

        } else {
            console.log(response.messages);
            toastr.error('Error al guardar la informacion', response.messages.error);
            $('#btnSave').focus();
        }
    });
}

// =================== MAIN CODE =================== //
//validar();
$('#btnSave').focus();

