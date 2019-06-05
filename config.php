<?php

/**
* 
*/
class conexion
{
	
	private $conexion;
	private $server="localhost";
	private $usuario="root";
	private $pass="";
	private $bd="meridaver";
	private $user;
	private $pas;
  
	public function __construct()
	{
		$this->conexion=new mysqli($this->server,$this->usuario,$this->pass,$this->bd);

		if($this->conexion->connect_errno)
		{
			die("fallo en la conexion con mysqli: (".$this->conexion->connect_errno.")");
		}
	}

	public function cerrar()
	{
		$this->conexion->close();
	}


	public function login($usuario, $pass)
	{
		$this->user = $usuario;
		$this->pas= $pass;

		$query="select * from login where usuario='".$this->user."' and Password= '".$this->pas."'";
		$consulta=$this->conexion->query($query);
	
		if($row=mysqli_fetch_array($consulta))
		{
			echo"<script>location.href='perfil.php'</script>";

		}else{
			echo "<script> alert('contraseña incorrecta'); </script>"; 
			echo"<script>location.href='noindex.php'</script>";
		}
	}







}


?>