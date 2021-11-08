<?php session_start(); header("Location: ".$_SERVER['HTTP_REFERER']); include("conexion.php");

if(isset($_SESSION['usuario'])) { 

$id = $_GET['id'];
$tabla = $_GET['tabla'];
$sql = "delete from $tabla where id = $id";
mysql_query($sql);

if(isset($_GET['archivo'])) {
	unlink($carpeta_imagen."/".$_GET['archivo']);
	unlink($carpeta_thumb."/".$_GET['archivo']);
	}

} else { include("login.php"); }
?>                                                                                           
