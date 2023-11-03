<?php
include("../include/conexion.php");

//Recibir la informacion
$dni = $_POST['dni'];
$ap_nom = $_POST['ap_nom'];
$correo = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$fecha_nac = $_POST['fecha_nac'];
$id_rol = $_POST['id_rol'];

$nombre_archivo = $dni.".jpg";
$ruta_foto = "../img_usuarios/".$nombre_archivo;

$pass_secure = password_hash($dni, PASSWORD_DEFAULT);

if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto)) {
    $consulta = "INSERT INTO usuario (dni, apellidos_nombres, correo, telefono, direccion, fecha_nacimiento, password, id_rol, foto, activo, reset_password, token_password) VALUES ('$dni', '$ap_nom', '$correo', '$telefono', '$direccion', '$fecha_nac', '$pass_secure','$id_rol','$nombre_archivo', 1,0,' ')";

$ejecutar = mysqli_query($conexion, $consulta);

if ($ejecutar) {
    echo "Registro Exitoso";
}else {
    echo "Error en el Registro";
}
}else {
    echo "Error al subir la Foto";
}
