<?php 
class Usuario
{
    private $usuarios;
    private $roles;
    private $rol;
    private $bd;
    public function __construct()
    {
        $this->bd = new PDO('mysql:host=localhost;dbname=usuarios', 'root', 'root');
        $this->usuarios = array();
        $this->roles = array(array());
        $this->rol = array();
    }


    public function getUsuarios()
    {

        $sql = "SELECT * FROM usuario";

        foreach ($this->bd->query($sql) as $res) {
            $this->usuarios[] = $res;
        }
        return $this->usuarios;

    }

    public function getRoles(){
        $sql = "SELECT * FROM rol";

        foreach ($this->bd->query($sql) as $res) {
            $this->rol[] = $res;
        }
        return $this->rol;
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
