<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    
	<link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
    
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
    

    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<h3>Agregar un nuevo producto</h3>


<form method="post" action="registros_insertar.php" enctype="multipart/form-data" id="former1">

	<div class="bloque der mediano">
	<input type="checkbox" name="publico" checked="checked" style="display: inline" /> Publicar inmediatamente<br />

	    Sección:
    <select name="categoria" style="padding: 2px;">
        <option value="industrial">Industrial</option>
        <option value="comercial">Comercial</option>
        <option value="decorativo">Decorativo</option>
        <option value="escolar">Escolar</option>
    </select>
	</div>
    
    
    
    <div class="bloque izq mediano">
    Descripción de la imagen:
    <input type="text" name="descripcion" size="50" />
    

    Escojer imagen: <input name="foto" type="file" size="30">
    </div>

    
    <div class="limpiar"></div>
    <input type="submit" value="Enviar Noticia" class="boton redondo" />
</form>  	


	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>