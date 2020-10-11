<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Controlador/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Controlador/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Controlador/assets/css/jquery.dataTables.css">

    <title>Usuarios</title>
</head>

<body>
    <header>
        <?php
        include_once('navbar.php')
        ?>
    </header>
    <?php
    include_once('frmModal.php')
    ?>
    <h1 class="text-center mb-3 mt-4">Administrar Usuarios</h1>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $us) : ?>

                        <tr>
                            <td><?php echo $us['id_usuario'] ?></td>
                            <td><?php echo $us['nombre'] ?></td>
                            <td><?php echo $us['correo'] ?></td>
                            <td><?php echo $us['telefono'] ?></td>
                            <td>
                                <?php
                                $rol_us = $usuario->rol_usuario($us['id_usuario']);
                                if (count($rol_us) > 0) {
                                    foreach ($rol_us as $rol) {
                                        echo "<span class = 'badge' >" . $rol['nombre'] . "</span>";
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning edit" data-toggle="modal" data-target="#frmModal" usr="<?php echo $us['id_usuario']; ?>">Editar</a>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <button class="btn btn-success">AGREGAR</button>
        </div>
    </div>
    <script src="../Controlador/assets/js/jquery-1.11.3.min.js"></script>
    <script src="../Controlador/assets/js/bootstrap-table.min.js"></script>
    <script src="../Controlador/assets/js/bootstrap.min.js"></script>
    <script src="../Controlador/assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".edit").click(function(e) {
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

                    success: function(response) {
                        if (response != 'error') {
                            var info = JSON.parse(response)
                            console.log(info)
                            $('#id').val(info.id_usuario)
                        }else{
                            console.log('caca')
                        }
                    },
                    error: function(error) {
                        console.log(error)
                    }

                })
            })
        })
    </script>
</body>

</html>