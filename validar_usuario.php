<?php session_start(); 
// header("Location: ".$_POST['url_destino']);
include_once("conexion.php");


$usuario = $_POST['usuario'];
$password = $_POST['password'];

if($_POST['usuario']&&$_POST['password']){
	$result = mysqli_query($con, "select usuario, password from ".$tabla_usuarios." where usuario = '$usuario' AND publico = 1");
	$fila = mysqli_fetch_assoc($result);
	
	$muser = $fila['usuario']; $mpwd  = $fila['password'];
	
		if($mpwd == $password)
		{
		$_SESSION['usuario'] = $fila["usuario"];
		echo "ENTRO BIEN";
		}
		else {
		echo "Password Equivocado";
		}
} else {echo "Falta alg�n dato";}
?>