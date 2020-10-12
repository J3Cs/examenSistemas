$(function () {
    $('#tblUsers').dataTable({});
});

function login() {
    $.ajax({
        url: 'Modelo/ajax.php',
        type: 'POST',
        async: true,
        data: $('#frmLogin').serialize(),
        cache: false,
        beforeSend: function () {
            $('#sub').val('Conectando...')
        },
        success: function (response) {
            console.log(response)
            $('#sub').val('Login')
            if (response === '1') {
                window.location.reload();
            } else {
                $('#result').html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dissmiss='alert'>&times</button><strong>ERROR</strong> Las credenciales son incorrectas</div>");
            }
        },
        error: function (error) {
            console.log(error)
        }

    })
}

$(function () {
    $(".edit").click(function (e) {
        e.preventDefault()
        var id_usuario = $(this).attr('usr');
        var action = 'info'
        $.ajax({
            url: 'Modelo/ajax.php',
            type: 'POST',
            async: true,
            data: {
                action: action,
                id_usuario: id_usuario
            },

            success: function (response) {
                if (response != 'error') {
                    var info = JSON.parse(response);
                    $('#id').val(info.id_usuario)
                    $('#nombre').val(info.nombre)
                    $('#clave').val(info.clave)
                    $('#correo').val(info.correo)
                    $('#telefono').val(info.telefono)
                } else {
                    console.log('caca')
                }
            },
            error: function (error) {
                console.log(error)
            }

        })
    })
})


$(function () {
    $(".delete").click(function (e) {
        e.preventDefault()
        var id_usuario = $(this).attr('usr');
        var action = 'info'
        $.ajax({
            url: 'Modelo/ajax.php',
            type: 'POST',
            async: true,
            data: {
                action: action,
                id_usuario: id_usuario
            },

            success: function (response) {
                if (response != 'error') {
                    var info = JSON.parse(response);
                    console.log(info)
                    $('#dn').text(info.nombre)
                    $('#id2').val(info.id_usuario)
                } else {
                    console.log('caca')
                }
            },
            error: function (error) {
                console.log(error)
            }

        })
    })
})

function agregar() {
    event.preventDefault()
    $.ajax({
        url: 'Modelo/ajax.php',
        type: 'POST',
        async: true,
        data: $('#frmAg').serialize(),
        success: function (response) {
            console.log(response);
            if (response == "OK") {
                window.location.reload();
            }
        },
        error: function (error) {
            console.log(error)
        }

    })
}

function eliminar() {
    event.preventDefault()
    $.ajax({
        url: 'Modelo/ajax.php',
        type: 'POST',
        async: true,
        data: $('#formDelete').serialize(),

        success: function (response) {
            if (response == "OK") {
                window.location.reload();
            }
        },
        error: function (error) {
            console.log(error)
        }
    })
}

function editarUsuario() {
    event.preventDefault()
    $.ajax({
        url: 'Modelo/ajax.php',
        type: 'POST',
        async: true,
        data: $('#form_edit').serialize(),

        success: function (response) {
            if (response == 'hecho') {
                window.location.reload()
            }
        },
        error: function (error) {
            console.log(error)
        }

    })
}

function closeSession() {
    $.ajax({
        url: 'Modelo/ajax.php',
        type: 'POST',
        async: true,
        data: {
            action: 'close'
        },

        success: function () {
            window.location.reload()
        },
        error: function (error) {
            console.log(error)
        }

    })
}