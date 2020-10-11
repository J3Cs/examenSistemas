<?php 

if(!empty($_POST)){
    if($_POST['action'] == 'info'){
        $id_usuario = $_POST['id_usuario'];
        $conn = mysqli_connect('localhost','root','root','usuario');
        $query = mysqli_query( $conn,"SELECT * FROM `usuario` WHERE `id_usuario` = $id_usuario");
        mysqli_close($conn);
        $res = mysqli_num_rows($query);
        if($res > 0){
            $data = mysqli_fetch_assoc($query);
            echo json_encode($data);
            exit;
        }
        echo 'error';
        exit;
    }
}

?>