<?php
class Usuario
{
    private $usuarios;
    private $roles;
    private $bd;
    public function __construct()
    {
        require_once('Modelo/Conectar.php');
        $this->bd = Conexion::conectar();
        $this->usuarios = array();
        $this->roles = array(array());
    }


    public function getUsuarios()
    {

        $sql = "SELECT * FROM usuario";
        $cons = $this->bd->query($sql);
        while ($filas = $cons->fetch(PDO::FETCH_ASSOC) ) {
            $this->usuarios[] = $filas;
        }
        return $this->usuarios;
        //SELECT rol.nombre FROM rol INNER JOIN rol_usuario ON rol_usuario.id_rol=rol.id_rol INNER JOIN usuario ON rol_usuario.id_usuario = usuario.id_usuario WHERE usuario.id_usuario=2

    }
    public function rol_usuario($id)
    {
        $this->roles=array();
        foreach ($this->bd->query("SELECT rol.nombre FROM rol INNER JOIN rol_usuario ON rol_usuario.id_rol=rol.id_rol
             INNER JOIN usuario ON rol_usuario.id_usuario = usuario.id_usuario WHERE usuario.id_usuario = " . $id) as $rol) {
                $this->roles[] = $rol;
        }
        return $this->roles;
    }
}

?>