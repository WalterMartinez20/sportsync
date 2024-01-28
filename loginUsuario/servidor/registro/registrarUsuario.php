<?php
include "../../clases/Auth.php";

$correo = $_POST['correo'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$Auth = new Auth();

if ($Auth->registrarUsuario($correo, $password)) {
    $info = $Auth;
    $response = array("success" => true, "info" => $info);
    //header("location:../../../inicio/login.php");
} else {
    $response = array("success" => false);
}

echo json_encode($response);
