<!DOCTYPE html>
<html lang="en">
<head>
<html lang="en" class="no-js">
	<meta charset="UTF-8">
	<title>GREEN MERIDA</title>
	<link rel="stylesheet" href="style.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="logo.ico">
</head>
<body>

<div class="container">



<form action="" method="POST">
	<div class="login"><br><br><br>
	<img src="lgito.png" alt="" width="150px"> <br><br><br>
	<label for="">Nombre de Usuario</label><br>      <input type="text" name="usuario"> <br>
	<label for="">Contraseña</label><br>    <input type="password" name="contra"> <br> <br>
	<input class="boton_personalizado" type="submit" name="registrar" value="Registrarme"> <br><br><br>
	<a class="boton_personalizado" href="INDEX.html">REGRESAR</a>
	</div>
</form>

</div>


	<?php

        include("congif.php");
      

        if(isset($_POST['registrar']))
        {
        	if($_POST['usuario'] == '' or $_POST['contra'] == '')
    {
         echo "<script> alert('Rellena todos los campos'); </script>"; 
    }else{
        
             $sql = 'SELECT * FROM login';
             $rec = mysqli_query($conexion,$sql);
             $verificar = 0;
        
             while($resultado = mysqli_fetch_object($rec))
             {
                 if($resultado->Usuario == $_POST['usuario'])
                 {
                     $verificar = 1;
                 }
             }
             if($verificar == 0)
             {
                         $nom = $_POST['usuario'];
                         $pw = $_POST['contra'];
            
                         $conexion->query("INSERT INTO login (Usuario,Password) VALUES ('$nom','$pw')");
                         mysqli_query($conexion,$sql);
                 
                 
                          echo "<script> alert('Registro Exitoso'); </script>"; 

                         echo  "<script> location.href='noindex.php' </script>"; 

             }else{
                    echo "<script> alert('El nombre de la cuenta ya esta siendo utilizada, elija una cuenta diferente'); </script>"; 

              }
        }
        }
	?>
<br><br><br><br>
<center><img src=patrocinadores.jpg heigth="600" width="700"></center><br><br>

</body>
</html>