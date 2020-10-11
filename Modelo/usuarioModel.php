<?php
class Usuario
{
    private $usuarios;
    private $roles;
    private $bd;
    public function __construct()
    {
        $this->bd = new PDO('mysql:host=localhost;dbname=usuarios', 'root', 'root');
        $this->usuarios = array();
        $this->roles = array(array());
    }


    public function getUsuarios()
    {

        $sql = "SELECT * FROM usuario";

        foreach ($this->bd->query($sql) as $res) {
            $this->usuarios[] = $res;
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
