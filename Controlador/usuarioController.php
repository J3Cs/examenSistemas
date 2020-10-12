<?php
//Llamada al modelo
require_once("Modelo/usuarioModel.php");
$usuario=new Usuario();
$usuarios=$usuario->getUsuarios();
$roles = $usuario->getRoles();
$numero = 1;
$frmRol = array();
//Llamada a la vista
require_once("Vista/usuarios.php");
