<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Controlador/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Controlador/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="Controlador/assets/css/jquery.dataTables.css">

    <title>Home</title>

</head>

<body>
    <header>
        <?php
        include_once('navbar.php');
        ?>
    </header>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Bienvenido <?php echo $_SESSION['nombre'] ?></h1>
            <div class="row text-center">
                <a href="usuarios.php" class="btn btn-primary">Agregar Usuarios</a>
            </div>
            <div style="display: flex; flex-direction: column;">
                <h3>Informacion del Usuario</h3>
                <label>Correo: </label><span><?php echo $_SESSION['correo'] ?></span>
                <label>Telefono: </label><span><?php echo $_SESSION['telefono'] ?></span>
            </div>
        </div>
    </div>
    <script src="Controlador/assets/js/jquery-1.11.3.min.js"></script>
    <script src="Controlador/assets/js/bootstrap-table.min.js"></script>
    <script src="Controlador/assets/js/bootstrap.min.js"></script>
    <script src="Controlador/assets/js/jquery.dataTables.js"></script>
</body>

</html>