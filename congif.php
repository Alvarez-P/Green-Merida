<?php

    $host = "localhost";
    $hostuser = "root";
    $hostpw = "";
    $hostdb = "meridaver";

    $conexion = mysqli_connect($host,$hostuser,$hostpw,$hostdb);

    if($conexion)
    {
    	return "CONECTADO";
    }else{
    	return "NO CONECTADO";
    }

?>