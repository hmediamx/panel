<?php include("encabezado.php"); ?>

    <?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<?php if(isset($_POST['busqueda'])) { ?>
	<a class="boton redondo" href="<?php $_SERVER['PHP_SELF'] ?>">Mostrar Todos</a>
<?php } else { ?>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="buscar">
    Filtrar por: <input type="text" name="busqueda">
    <input type="submit" value="Buscar" />
    </form>
<?php } ?>



<?php
/*		=============================================		CONFIGURACION DEL ARCHIVO		=============================================		*/

$borrar = true;
$modificar = false;
$publicar = true;
$destacado = false;
$numero_acciones = $borrar + $modificar + $publicar + $destacado;


/*		=============================================		CREA LA CONSULTA Y EL ORDEN DE DATOS		=============================================		*/
if(isset($_GET['order'])) {
	
	if($_SESSION['order'] == 1) { 
		$modo_orden = "ASC";
		$_SESSION['order'] = 0;
		}
		else {
			$modo_orden = "DESC";
			$_SESSION['order'] = 1;
			}
	$order = $_GET['order'];
	}
else {
	$order = "id";
	$modo_orden = "ASC";
}



if(isset($_POST['busqueda'])) {
	$busqueda = $_POST['busqueda'];
	$consulta = "SELECT id, publico, imagen, categoria, descripcion FROM registros WHERE id like '%$busqueda%' or categoria like '%$busqueda%'";
	$result = mysqli_query($con, $consulta);
}
else { 
	$consulta = "SELECT id, publico, imagen, categoria, descripcion from registros WHERE categoria!='noticia' order by $order $modo_orden";
	$result = mysqli_query($con, $consulta);
}



/*		=============================================		IMPRIME LOS ENCABEZADOS DE LA TABLA		=============================================		*/
$i = 0;
echo '<table class="registros"><tr>';

while ($i < mysqli_num_fields($result)) {

    $meta = mysqli_fetch_field($result);
	
	switch($meta->name) {
		case "id":				$par = " width=35 >";	break;
		case "publico":			$par = " width=25 >";	break;
		case "imagen":			$par = " width=25 >";	break;
		default: $par = ">";
		}
	
	echo "<th".$par."<a href=".$_SERVER['PHP_SELF']."?order=$meta->name>".$meta->name."</a></th>";
	$i++;


}
	echo "<th colspan=".$numero_acciones.">Acciones</th></tr>";


/*		=============================================		IMPRIME LOS REGISTROS		=============================================		*/



if(isset($_POST['busqueda'])) {
	$_busqueda = $_POST['busqueda'];
	$_consulta = "SELECT id, publico, imagen, categoria, descripcion FROM registros WHERE id like '%$busqueda%' or categoria like '%$busqueda%'";
	$_result = mysqli_query($con, $consulta);
}
else { 
	$_consulta = "SELECT id, publico, imagen, categoria, descripcion from registros WHERE categoria!='noticia' order by $order $modo_orden";
	$_result = mysqli_query($con, $consulta);
}


while($_row = mysqli_fetch_assoc($_result)) {
	$i = 0;
	
	if(isset($_row['publico']) && $_row['publico']==0) {
		$class_row = "row_oculto";
	} else {
		$class_row = "publico";
	}
	
	
	echo "<tr class='".$class_row."'>";

	while ($i < mysqli_num_fields($_result)) {
		
		$meta = mysqli_fetch_field($_result);
		echo "<td>A:";
		
/*		=============================================		REVISANDO E IMPRIMIENDO LA CADENA		=============================================		*/
		
		if(strstr($_row[$meta->name], "jpg")) {
			echo '<a rel="shadowbox" href="'.$carpeta_imagen.'/'.$_row[$meta->name].'"><img src="'.$carpeta_imagen.'/'.$_row[$meta->name].'" />';
			$hay_imagen = $_row[$meta->name];
			}
		// Revisa la cadena 
		elseif($_row[$meta->name]=="1") {
			echo "Si";
			}
		elseif($_row[$meta->name]=="0") {
			echo "No";
			}
		else echo $_row[$meta->name];
    	echo "</td>";
		
	$i++;
	}

?>

<!--		=============================================		ACCIONES EN LA TABLA		=============================================		-->
    <?php if($borrar) { ?>
    <td class="eliminar" width="32">
    <a href="borrar.php?id=<?php echo $row['id']; ?>&amp;tabla=<?php echo $tabla_this; if(isset($hay_imagen)) { echo "&amp;archivo=".$hay_imagen;} ?>" onclick="return pregunta();" title="Borrar registro">Eliminar</a>
    </td>
    <?php } ?>
    
    <?php if($modificar) { ?>
    <td class="modificar" width="32">
    <a title="Modificar Registro" href="registros_modificar.php?id=<?php echo $row['id']; ?>">Modificar</a>
    </td>
    <?php } ?>
    
    <?php if($destacado) { ?>
    <td class="destacar" width="32">
    <a title="Activar/Desactivar Destacado" href="destacar.php?id=<?php echo $row['id']; ?>&amp;tabla=<?php echo $tabla_this ?>&amp;destacado=<?php echo $row['destacado'] ?>">Destacar</a>
    </td>
    <?php } ?>
    
    <?php if($publicar) { ?>
    <td class="publicar" width="32">
    <a title="Activar/Desactivar Registro" href="publicar.php?id=<?php echo $row['id']; ?>&amp;tabla=<?php echo $tabla_this ?>&amp;publico=<?php echo $row['publico'] ?>">Publicar</a>
    </td>
    <?php } ?>
    
        
<?php    
	echo "</tr>";
	}
echo "</table>";
?>

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>

<?php include("pie.php"); ?>