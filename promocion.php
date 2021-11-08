<?php session_start(); header("Location: ".$_SERVER['HTTP_REFERER']); include("conexion.php"); include("hmedia/configuracion.php");

if(isset($_SESSION['usuario'])) { 

$id = $_GET['id'];
$tabla = $_GET['tabla'];
$promocion = $_GET['promocion'];

echo "id = ".$id."<br />";
echo "tabla = ".$tabla."<br />";
echo "publico = ".$promocion."<br />";

if($promocion==0) {
	$sql = "update $tabla set promocion=1, publico=1 where id = $id";
}

else {
	$sql = "update $tabla set promocion=0 where id = $id";
}

mysql_query($sql);

} else { include("login.php"); }
?>