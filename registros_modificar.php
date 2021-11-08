<?php include("encabezado.php"); ?>

    <?php if(isset($_SESSION['usuario'])) { ?>
    
   	<link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
    
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
    
    
    
    <script src="js/nicEdit.js" type="text/javascript"></script>
	<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({buttonList : ['bold','italic','underline','link','unlink','fontFormat'], maxHeight : 300}).panelInstance('caja');
    });
    </script>
    
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->
    
<?php
/*		=============================================		CONFIGURACION DEL ARCHIVO		=============================================		*/
$id = $_GET['id'];
$result = mysql_query("select id, numero, categoria, titulo, autor, subtitulo, contenido, fondo, main from registros where id = '$id'");
if($row = mysql_fetch_assoc($result)) {
?>

<!--		=============================================		IMPRIME EL FORMULARIO		=============================================		-->

<form action="registros_modificando.php" method="post" enctype="multipart/form-data" id="former1">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

Categoría
<input type="text" name="categoria" value="<?php echo $row['categoria']; ?>"  />

Número
<input type="text" name="numero" value="<?php echo $row['numero']; ?>"  />

Titulo
<input type="text" name="titulo" value="<?php echo $row['titulo']; ?>"  />

Autor
<input type="text" name="autor" value="<?php echo $row['autor']; ?>"  />

Titulo del autor
<input type="text" name="subtitulo" value="<?php echo $row['subtitulo']; ?>"  />

Contenido
<textarea name="contenido" id="caja" style="width: 910px; height: 300px;">
<?php echo $row['contenido']; ?>
</textarea>

Color del fondo caja grande
<div style="width: 20px; height:20px; background: #<?php echo $row['fondo']; ?>; display: block; border: 1px solid;"></div>
<input type="text" maxlength="6" size="6" id="colorpickerField2" value="<?php echo $row['fondo']; ?>" name="fondo" />

Color del fondo caja chica
<div style="width: 20px; height:20px; background: #<?php echo $row['main']; ?>; display: block; border: 1px solid;"></div>
<input type="text" maxlength="6" size="6" id="colorpickerField1" value="<?php echo $row['main']; ?>" name="main" />

<input type="submit" value="Enviar modificaciones" class="boton redondo" />
</form>

<?php } ?>


	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>

<?php include("pie.php"); ?>