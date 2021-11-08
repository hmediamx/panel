<?php header("Location: registros.php"); 
include("encabezado.php"); ?>


    <?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->
<?php
$id = $_POST['id'];
$categoria = $_POST['categoria'];
$numero = $_POST['numero'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$subtitulo = $_POST['subtitulo'];
$contenido = $_POST['contenido'];
$fondo = $_POST['fondo'];
$main = $_POST['main'];



$sql = "update registros set categoria = '$categoria', numero = '$numero', titulo = '$titulo', autor = '$autor', subtitulo = '$subtitulo', contenido = '$contenido', fondo = '$fondo', main = '$main' where id = '$id';";
echo $sql;

mysql_query($sql);

?>


	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>

<?php include("pie.php"); ?>