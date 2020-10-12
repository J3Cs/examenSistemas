<?php


if (!empty($_POST)) {
    session_start();
    $conn = mysqli_connect('localhost', 'root', 'root', 'usuarios');

    //metodo para loguearse
    if ($_POST['action'] == 'login') {

        if (isset($_POST['usuario']) && isset($_POST['clave'])) {
            $user = mysqli_real_escape_string($conn, $_POST['usuario']);
            $pass = mysqli_real_escape_string($conn, $_POST['clave']);

            $query = mysqli_query($conn, "SELECT * FROM usuario WHERE nombre = '$user' AND clave = '$pass'");

            $res = mysqli_num_rows($query);

            if ($res == "1") {
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['id_usuario'] = $data['id_usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['telefono'] = $data['telefono'];
                $_SESSION['correo'] = $data['correo'];
                $_SESSION['conect'] = $data['ultima_conexion'];
                echo "1";
            } else {
                echo "error";
            }
        } else {
            echo "error var";
        }
    }

    //Obtener informacion de un usuario
    if ($_POST['action'] == 'info') {
        $id_usuario = $_POST['id_usuario'];
        $query = mysqli_query($conn, "SELECT * FROM `usuario` WHERE `id_usuario` = $id_usuario");
        mysqli_close($conn);
        $res = mysqli_num_rows($query);
        if ($res > 0) {
            $data = mysqli_fetch_assoc($query);
            $json = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $json;
            exit;
        }
        echo 'error';
        exit;
    }
    //Agregar un Usuario
    if ($_POST['action'] == 'Agg') {
        //print_r($_POST);
        if (!empty($_POST['nombre']) || !empty($_POST['clave']) || !empty($_POST['telefono']) || !empty($_POST['correo'])) {
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $arr = array();
            $num = 1;
            $id_rol = array();
            //obtener los roles
            if (count($_POST) > 5) {
                for ($i = 5; $i < count($_POST); $i++) {
                    if (!isset($_POST['rol' . $num])) {
                        $num = $num + 1;
                        continue;
                    } else {
                        $arr[] = $_POST['rol' . $num];
                    }
                    $num = $num + 1;
                }
            }
            $query = mysqli_query($conn, "INSERT INTO usuario(nombre,clave,telefono,correo) 
                                  values ('$nombre','$clave','$telefono','$correo')");
            if ($query) {
                if (count($arr) > 0) {
                    $query = mysqli_query($conn, "SELECT usario.id_usuario FROM usuario WHERE rol.nombre = '$nombre'");
                    $user_id = mysqli_fetch_assoc($query);
                    for ($i = 0; $i < count($arr); $i++) {
                        $query = mysqli_query($conn, "SELECT rol.id_rol FROM rol WHERE rol.nombre = '$arr[$i]'");
                        $id_rol = mysqli_fetch_assoc($query);
                        $query = mysqli_query($conn, "INSERT INTO rol_usuario(id_usuario, id_rol) 
                                                          values ('$user_id[id_usuario]','$clave[id_rol]')");
                    }
                }
                echo "OK";
            }else {
              echo "Error al agregar";
            }
        }
    }

    //Editar un usuario
    if ($_POST['action'] == 'edit') {
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $query = mysqli_query($conn, "UPDATE usuario SET nombre='$nombre', telefono='$telefono', correo='$correo'
                                        , clave='$clave' WHERE id_usuario = '$id'");
        if (isset($_POST['rol'])) {
            $rol_nombre = $_POST['rol'];
            $query = mysqli_query($conn, "SELECT rol.id_rol FROM rol WHERE rol.nombre = '$rol_nombre'");
            $res = mysqli_num_rows($query);
            $data = mysqli_fetch_assoc($query);
            $id_rol = $data['id_rol'];
            $query = mysqli_query($conn, "UPDATE  rol_usuario SET id_rol='$id_rol' WHERE rol_usuario = '$id'");
        }
        mysqli_close($conn);
        echo 'hecho';
        exit;
    }
    //Eliminar un usuario
    if ($_POST['action'] == 'del') {
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $query = mysqli_query($conn, "DELETE FROM usuario WHERE id_usuario = $id");
            mysqli_close($conn);
            if ($query) {
                echo "OK";
            } else {
                echo "Error al eliminar";
            }
        } else {
            echo 'Error objeto vacio';
        }
    }

    //Cerrar Sesion
    if ($_POST['action'] == 'close') {
        $time = date('Y-m-d H,i,s', time());
        $query = mysqli_query($conn, "UPDATE usuario SET ultima_conexion ='$time' WHERE rol_usuario = '$_SESSION[id_usuario]'");
        session_destroy();
    }
}
