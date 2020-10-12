<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sistema De Usuarios</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="inicio.php">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="usuarios.php">Agregar Usuarios</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="font-size: 1.5em;">
                <li><a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['nombre']; ?></a></li>
                <li onclick="closeSession()"><a href="#"><i class="fa fa-power-off"></i></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<script src="Controlador/assets/js/funtions.js"></script>