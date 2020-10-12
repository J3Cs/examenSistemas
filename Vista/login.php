<?php
session_start();
if (isset($_SESSION['active'])) {
    header('location: inicio.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Controlador/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Controlador/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="Controlador/assets/css/jquery.dataTables.css">
    <title>Login</title>
</head>

<body >
<div class="container" style="margin-top: 10%;">
        <h1 class="bg-info text-center">Login de Usuario</h1>
        <div class="row">
            <form class="col-md-6 col-md-offset-3" id="frmLogin">
            <input type="hidden" name="action" value="login">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                     <input type="text" class="form-control" required name="usuario" id="usuario">
                </div>
                <div class="form-group">
                    <label for="clave">Password</label>
                    <input type="password" class="form-control" required name="clave" id="clave">
                </div>
                <span id='result'></span>
                <button type="submit" id="sub" onclick="event.preventDefault(); login()" class="btn btn-default">Login</button>
            </form>
        </div>
    </div>


    <script src="Controlador/assets/js/jquery-1.11.3.min.js"></script>
    <script src="Controlador/assets/js/bootstrap-table.min.js"></script>
    <script src="Controlador/assets/js/bootstrap.min.js"></script>
    <script src="Controlador/assets/js/jquery.dataTables.js"></script>
    <script src="Controlador/assets/js/funtions.js"></script>
</body>

</html>