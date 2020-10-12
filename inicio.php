<?php

session_start();
if(!isset($_SESSION['active'])){
    header('location: index.php');
}

 require_once('Vista/vistaInicio.php')
?>