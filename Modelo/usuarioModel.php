<?php 
header("Access-Control-Allow-Origin: *");   
class Usuario
{
    private $usuarios;
    private $roles;
    private $rol;
    private $bd;

    //Constructor
    public function __construct()
    {
        $this->bd = new PDO('mysql:host=localhost;dbname=usuarios', 'root', 'Rockheavymetal123@');
        $this->usuarios = array();
        $this->roles = array(array());
        $this->rol = array();
    }

    //Obtiene todos los usuarios
    public function getUsuarios()
    {

        $sql = "SELECT * FROM usuario";

        foreach ($this->bd->query($sql) as $res) {
            $this->usuarios[] = $res;
        }
        return $this->usuarios;

    }
    //Obtiene todos los roles
    public function getRoles(){
        $sql = "SELECT * FROM rol";

        foreach ($this->bd->query($sql) as $res) {
            $this->rol[] = $res;
        }
        return $this->rol;
    }
    
    //Obtiene todos los roles por usuario
    public function rol_usuario($id)
    {
        foreach ($this->bd->query("SELECT rol.rol FROM rol INNER JOIN rol_usuario ON rol_usuario.id_rol=rol.id_rol
             INNER JOIN usuario ON rol_usuario.id_usuario = usuario.id_usuario WHERE usuario.id_usuario = " . $id) as $rol) {
                $this->roles[] = $rol;
        }
        return $this->roles;
    }

    
}

?>
