<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<?php

if(isset($_POST['publico'])) $publico = 1;
else $publico = 0;

$destacado = 0;
	
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
$fecha = date("y-m-d");


include_once("conexion.php");
include_once("hmedia/funciones.php");

$foto = "foto tmp name = ".$_FILES['foto']['tmp_name']."<br />";

if($_FILES['foto']['tmp_name']=="") {
	$file_name = NULL;
	}
else {
	include_once("hmedia/imagen_class.php");
	$file_name = aleimg().".jpg";
	
	$picture = new Image;
	$picture->loadImage($_FILES['foto']['tmp_name']);
	$picture->resizeW(650, true);
	
	$picture->saveImage($carpeta_imagen."/".$file_name, 60);
}


$sql = "insert into registros values('', '$publico', '$categoria', '$descripcion', '$file_name', '$fecha');";

mysql_query($sql);

echo "¡Se ha publicado!<br>";
echo "test...";
?>



	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>