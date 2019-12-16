<?php
spl_autoload_register(function ($class) {
    include '../../class/'. $class. '/' . $class . '.class.php';
});

$id = $session->getValue("id");

$userInfo = new UserInformation(new Conexion);
$userInfo->setId($id);
$name = $userInfo->getUserInfo()['name'];
$lastName   = $userInfo->getUserInfo()['lastname'];
$user = $userInfo->getUserInfo()['user'];
$email = $userInfo->getUserInfo()['email'];


?>