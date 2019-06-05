<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GREEN MERIDA</title>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="logo.ico">
</head>
<body>

<div class="container">



<form action="login.php" method="POST">
	<div class="login"><br><br><br>
	<img src="logito.png" alt="" width="150px"> <br><br><br>
	<label for="">Nombre de Usuario</label><br>      <input type="text" name="usuario"> <br>
	<label for="">Contraseña</label><br>    <input type="password" name="contra"> <br> <br>
	<input class="boton_personalizado" type="submit" name="registrar" value="INICIAR SESION"> <br>
	<br><label for="">Aun no tienes una cuenta? <a href="registro.php">Registrate!</a></label>
	<br><br><br>
	<a class="boton_personalizado" href="INDEX.html">REGRESAR</a>
	</div>
</form>
<form action="perfil.php" method="POST">
<input type="hidden" name="usuario" value="">

<script>$(document).ready(function () {
  $(<input class="boton_personalizado" type="submit" name="registrar" value="INICIAR SESION">).keyup(function () {
        var value = $(this).val();
		$(<input type="hidden" name="usuario" value="">).val(value);
    });
});</script>

</form>

</div>
<br><br><br>
<center><img src=patrocinadores.jpg heigth="600" width="700"></center><br><br>

</body>
</html>