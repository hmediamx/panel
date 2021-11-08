<?php session_start(); header("Location: ".$_SERVER['HTTP_REFERER']); include("conexion.php"); include("hmedia/configuracion.php");

if(isset($_SESSION['usuario'])) { 

$id = $_GET['id'];
$tabla = $_GET['tabla'];
$destacado = $_GET['destacado'];

if($destacado==0) {
	$sql = "update $tabla set destacado=1, publico = 1 where id = $id";
}

else {
	$sql = "update $tabla set destacado=0 where id = $id";
}

mysql_query($sql);

} else { include("login.php"); }
?>