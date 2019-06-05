<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>GREEN MERIDA</title>
    <link rel="shortcut icon" href="logo.ico">
</head>
<body>
<table>
<tr>
<td width="50" height="100"></td>
<td><img src="logito.png" width="300" heigth="200"></td>
<td width="500" height="100"><P><strong> PERFIL DE USUARIO</stong></P></td>
<td><font size="5" face="arial" color="2B8A3B"><i>Haciendo un Mérida verde</i></font></td>
</tr>
</table></CENTER>
<br>
<br> 
<center>
<form action="" method="POST">
<TABLE>
<tr><td><label for="" class="container" color="0E522"><strong>NOMBRE DE USUARIO</strong></label></td>   <td><input type="text" name="nombre2" class="container"></td></tr>
<tr><td><label for="" class="container"  color="0E522">GREENCASH POR BASURA RECICLABLE</label></td>   <td><input type="text" class="container"></td></tr>
<tr><td><label for="" class="container"   color="0E522">GREENCASH POR BASURA VOLUMINOSA</label></td>  <td><input type="text" class="container"></td></tr>
<tr><td><label for="" class="container" color="0E522">GREENCASH TOTALES</label></td>   <td><input type="text" class="container"></td></tr>
</TABLE><br><br><br><br>
</form>
<input class="boton_personalizado tb" type="submit" name="registro" value="AGREGAR CÓDIGO">
<?php
if(isset($_POST['registro'])) // aumenta
{

	if($_POST['nombre2']=='')
	{
		echo "El nombre a buscar no pueda estar vacio, que no mmxd";
		echo  "<script> location.href='folios.php' </script>"; 
	}else{
		$sql="SELECT * FROM login";
		$rec=mysqli_query($conexion,$sql);
		$verificar=0;
		$nombre=$_POST['nombre2'];

		$a="SELECT id FROM login where Usuario='".$nombre."'";
		$consulta=$conexion->query($a);

		if($row=mysqli_fetch_array($consulta)){

			session_start();
			$_session['id']=$row['id'];
			$id=$_session['id'];

			$a="SELECT * FROM recicla where id='".$_session['id']."'";
			$consulta=$conexion->query($a);

			if($row=mysqli_fetch_array($consulta))
			{
				
				//$a="INSERT INTO recicla (ptsbv,ptsbr,ptsttl) VALUES ('0','0','0')";
				$a="UPDATE recicla
				SET ptsbv = ptsbv+'5', ptsbr =ptsbr+'5', ptsttl =ptsttl+ '10'
				WHERE id = $id";
				$consulta=$conexion->query($a);
				echo "hola";
				echo  "<script> location.href='empresa.php' </script>"; 

			}else
			{
				echo "Nose encontró";
				echo  "<script> location.href='empresa.php' </script>"; 
			}

		}else{
			echo "Error";
			echo  "<script> location.href='empresa.php' </script>"; 
		}	}	
}

?> <br><br><br>
<a class="boton_personalizado tb2" href="../evento/INDEX.html">REGRESAR</a></center>
</body>
</html>

