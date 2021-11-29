<?php
include("../../modelo/mdl_tbl_usuarios.php");
$obj = new tablas();

if(isset($_POST['ver_tabla_user'])){
    $resultado = $obj -> ver_tabla_usuarios();
    echo '
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
    <th>Nombre del usuario</th>
    <th>Correo del usuario</th>
    <th>Contraseña del usuario</th>
    <th>Tipo de usuario</th>
    </tr>
    </thead>
    <tbody>
    ';

    foreach($resultado as $r){
        echo '
        <tr>
                <td>'.$r['usuario_nombre'].'</td>
                <td>'.$r['usuario_correo'].'</td>
                <td>'.$r['usuario_contrasena'].'</td>
                <td>'.$r['usuario_nivel'].'</td>
            </tr>
        ';
    }

    echo '
    </tbody>

</table>
    ';
    echo "
    <script>
    
</script>";
} 

if(isset($_POST['tipo_usuario'])){
    $nombre = $_POST['nombre_usuario'];
    $correo = $_POST['correo_usuario'];
    $contrasena = $_POST['contrasena_usuario'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $resultado = $obj -> add_usuario($nombre,$correo,$contrasena,$tipo_usuario);
    if($resultado == true){
        exit(json_encode([
            "status" => "1"
        ]));
    }else{
        exit(json_encode([
            "status" => "2"
        ]));
    }
}


if(isset($_POST['tbl_eliminar_usuario'])){
    $resultado = $obj -> ver_tabla_usuarios();
    echo '
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
    <th>Nombre del usuario</th>
    <th>Correo del usuario</th>
    <th>Contraseña del usuario</th>
    <th>Tipo de usuario</th>
    <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    ';

    foreach($resultado as $r){
        echo '
        <tr>
                <td>'.$r['usuario_nombre'].'</td>
                <td>'.$r['usuario_correo'].'</td>
                <td>'.$r['usuario_contrasena'].'</td>
                <td>'.$r['usuario_nivel'].'</td>
                <td><button class="btn btn-danger" onclick="eliminar_usuario('.$r['id_usuario'].')">Eliminar Usuario</button></td>
            </tr>
        ';
}

echo '
</tbody>

</table>
';
}

if(isset($_POST['del_user'])){
    $id_user = $_POST['del_user'];
    $resultado = $obj -> eliminar_usuario($id_user);
    if($resultado == true){
        exit(json_encode([
            "status" => "1"
        ]));
    }else{
        exit(json_encode([
            "status" => "2"
        ]));
    }
}
?>