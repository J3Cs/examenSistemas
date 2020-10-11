<?php

require_once('Modelo/usuarioModel.php');

$usuario = new Usuario();

$usuarios = $usuario->getUsuarios();

require_once('Vista/Usuarios.php')
?>