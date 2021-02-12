<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Controlador/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Controlador/assets/css/jquery.dataTables.css">
    <link rel="stylesheet" href="Controlador/assets/css/font-awesome.min.css">
    <title>Personas</title>
</head>

<body>
    <header>
        <?php
        include_once('navbar.php');
        session_start();
        if (!isset($_SESSION['active'])) {
        header('location: index.php');
        session_destroy();
}

        ?>
    </header>

    <h1 class="text-center mb-3 mt-4">Administrar Usuarios</h1>
    <div class="container">
        <div class="row">
            <table class="table" id="tblUsers">
                <thead class="thead-dark">
                    <tr>
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
                            <td><?php echo $us['nombre'] ?></td>
                            <td><?php echo $us['correo'] ?></td>
                            <td><?php echo $us['telefono'] ?></td>
                            <td>
                                <?php
                                //Imprime los roles de cada usuario
                                $rol_us = $usuario->rol_usuario($us['id_usuario']);

                                if (count($rol_us) > 0) {
                                    foreach ($rol_us as $rol) {
                                        echo "<span class='badge'>" . $rol[0] . "</span>";
                                    }
                                }
                                include_once('frmModal.php');
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-warning edit" data-toggle="modal" data-target="#frmModal" usr="<?php echo $us['id_usuario']; ?>"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#frmDel" usr="<?php echo $us['id_usuario']; ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <button class="btn btn-success" data-toggle="modal" data-target="#frmAgg"><i class="fa fa-user"></i> AGREGAR</button>
        </div>
    </div>
    <script src="Controlador/assets/js/jquery-1.11.3.min.js"></script>
    <script src="Controlador/assets/js/bootstrap-table.min.js"></script>
    <script src="Controlador/assets/js/bootstrap.min.js"></script>
    <script src="Controlador/assets/js/jquery.dataTables.js"></script>
    <script src="Controlador/assets/js/funtions.js"></script>
</body>


</html>