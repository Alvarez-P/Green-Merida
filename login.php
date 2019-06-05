<?php

include("config.php");

$user=$_POST['usuario'];
$pas=$_POST['contra'];

$bd=new conexion;
$bd->login($user, $pas);
$bd->cerrar();


?>