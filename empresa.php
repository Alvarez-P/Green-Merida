<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>GREEN MERIDA</title>
    <link rel="shortcut icon" href="../logo.ico">
    
</head>
<body>
<table>
<tr>
<td width="50" height="100"></td>
<td><img src="logito.png" width="300" heigth="200"></td>
<td width="500" height="100"></td>
<td><font size="5" face="arial" color="2B8A3B"><i>Haciendo un Mérida verde</i></font></td>
</tr>
</table></CENTER>
<style type="text/css">
input
{
    font-size: 30px;
}

form
{
    text-align: center;
}
</style>

</head>
<br>



<p>GENERAR FOLIOS</p>
<form action="" method="POST" >
<center>
<input type="text" name="folio" id="hola"> <br><br>
<input type="button" onclick="nombrar()" value="GENERAR FOLIO"class="boton_personalizado">
<input type="submit" name="registrar" value="GUARDAR FOLIO" class="boton_personalizado"></center> <br><br>


<P>BUSCAR FOLIO E IGUALAR</P>
<center>
<input type="text" name="nombre" id="hola"> <br><br>
<input type="submit" name="registra" value="BUSCAR FOLIO" class="boton_personalizado"></center> <br><br>
<?php


include("congif.php");

if(isset($_POST['registrar']))// crea codigo
{
	if($_POST['folio']=='')
	{
		echo "Primero debe generar el codigo";
		echo  "<script> location.href='noindex.php' </script>"; 
	}
	else
	{
		$sql="SELECT * FROM folio";
		$rec=mysqli_query($conexion,$sql);
		$verificar=0;

		while($resultado=mysqli_fetch_object($rec))
		{
			if($resultado->folio==$_POST['folio'])
			{
				$verificar=1;
			}
		}
		if($verificar==0)
		{
			if(isset($_POST['folio']))
			{
				$nom=$_POST['folio'];

				$conexion->query("INSERT INTO folio (folio) VALUES ('$nom')");
				mysqli_query($conexion,$sql);
				echo "<script> alert('Registro Exitoso'); </script>"; 
				echo  "<script> location.href='empresa.php' </script>"; 
			}
		}
		else
		{
			echo "<script> alert('Folio ya registrado'); </script>"; 
			echo  "<script> location.href='empresa.php' </script>"; 
		}
	}
}


if(isset($_POST['registra'])) // iguala a 0 los puntos
{

	if($_POST['nombre']=='')
	{
		echo "El nombre a buscar no puede estar vacio";
		echo  "<script> location.href='empresa.php' </script>"; 
	}else{
		$sql="SELECT * FROM login";
		$rec=mysqli_query($conexion,$sql);
		$verificar=0;
		$nombre=$_POST['nombre'];

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
				SET ptsbv = '0', ptsbr = '0', ptsttl = '0'
				WHERE id = $id";
				$consulta=$conexion->query($a);
				echo "hola";
				echo  "<script> location.href='folios.php' </script>"; 

			}else
			{
				echo "No se encontró";
				echo  "<script> location.href='folios.php' </script>"; 
			}

		}else{
			echo "no jalo";
			echo  "<script> location.href='folios.php' </script>"; 
		}	}	
}
?>
</body>
</html>
