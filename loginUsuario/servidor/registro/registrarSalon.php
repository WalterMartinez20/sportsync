<?php
include "../../clases/Auth.php";

$jsonData = file_get_contents("php://input");

$datos = json_decode($jsonData, true);

$email = $datos['email'];
$password = password_hash($datos['password'], PASSWORD_DEFAULT);
$servicios = implode(",", $datos['servicios']);

$Auth = new Auth();

if ($Auth->registrarSalon($email, $password, $servicios)) {
    $response = array("success" => true);
} else {
    $response = array("success" => false);
}

echo json_encode($response);
