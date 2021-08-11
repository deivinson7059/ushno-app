// =================== CONTROL DE EVENTOS =================== //

var urlBase = "https://api-web.danisoft.com.co//ushno-api/public/admin/horario/delete";

// =================== FUNCIONES ================== //
function BlockUIDs() {
    $.blockUI({
        overlayCSS: {
            backgroundColor: '#1ab294'
        },
        message: '<h1> Procesando...</h1>'
    });
}

function deleteH(hor_id) {
    swal({
        title: "¿Deseas Eliminar el registro #" + hor_id + "?",
        text: "No podrás deshacer este paso...",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Sí",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            var datos = {
                hor_id: hor_id,

            }
            console.log(datos);
            BlockUIDs();
            utilRequest.send(urlBase, 'POST', datos, true, function (response) {
                UnblockUI();
                response = JSON.parse(response);
                console.log(response);
                if (response.status == 200) {
                    showMessage("OK", "eliminar");
                    window.location.href = "https://api-web.danisoft.com.co//ushno-app/public/admin/horario";

                } else {
                    console.log(response.messages);
                    toastr.error('Error al eliminar', response.messages.error);

                }
            });
        } else {
            swal("¡Opción Cancelada!", "Se Canceló Reset de  la Contraseña", "error");
        }
    });
}


// =================== MAIN CODE =================== //
//validar();
$('#btnSave').focus();

