<?php

session_start();
if(!isset($_SESSION['active'])){
    header('location: index.php');
}
//Vista de la pantalla principal
require_once('Vista/vistaInicio.php')
?>