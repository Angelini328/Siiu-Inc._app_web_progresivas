<?php
include 'mdl_conexion.php';

class login{

    private $db;
    private $lista;

    public function __construct()
    {
        $this->db = conexion::connect_db();
        $this->arraybd =  array();
    }
public function login_ad($usuario,$pass){
        $resultado = $this->db->query("SELECT * FROM admi WHERE admin_email = '$usuario' AND admin_contrasena='$pass'");
        while ($filas = $resultado->fetch_assoc()) {
            $this->lista[] = $filas;
        }
        return $this->lista;
    }
    
    }
    ?>