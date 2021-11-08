<?php session_start(); include("conexion.php"); include("hmedia/funciones.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de Control</title>
<link href="hmedia/reset.css" rel="stylesheet" type="text/css" />
<link href="hmedia/estilo.css" rel="stylesheet" type="text/css" />
<link href="hmedia/shadowbox.css" rel="stylesheet" type="text/css" />
<link href="hmedia/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="hmedia/jquery.js"></script>
<script type="text/javascript" src="hmedia/lytebox.js"></script>
<script type="text/javascript" src="hmedia/vanadium.js"></script>
<script type="text/javascript" src="hmedia/jquery-ui-1.7.3.custom.min.js"></script>


<script type="text/javascript">
function pregunta(){ 
   if (!(confirm('¿Estas seguro de ejecutar esta acción?'))){ 
      return false;
   } 
} 
</script> 
</head>

<body>
<div id="contenedor">

    <div id="encabezado">
        <div class="bloque_titulo">
        <h1>Panel de Control</h1>
        <h2><?php echo $nombre_pagina ?></h2>
        </div>
        
    <?php if(isset($_SESSION['usuario'])) { ?>
        <div id="menu">
            <ul>
            <li><a href="registros_nuevo.php">Publicar Artículo</a></li>
            <li><a href="registros.php">Revisar productos</a></li>

            <li><a href="salir.php">Salir</a></li>
            </ul>
        </div>
    <?php } ?>
    </div>


<div id="main">