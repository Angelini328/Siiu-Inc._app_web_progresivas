<?php
include("../../modelo/mdl_loginadmin.php");
$obj = new login();

if(isset($_POST['admin_pass'])){
    $usuario = $_POST['user_admin'];
    $pass = $_POST['admin_pass'];
    $resultado = $obj -> login_ad($usuario,$pass);
    if(empty($resultado)){
        exit(json_encode(
            [
                "status" => "3"
            ]
            ));
    }else{
        exit(json_encode(
            [
                "status" => "1"
            ]
            ));
    }

}else{
    
}

?>