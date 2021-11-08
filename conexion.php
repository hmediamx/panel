<?php

$servidor_mysql = "35.225.116.249";
$usuario_mysql = "root";
$password_mysql = "imb090503";
$base_mysql = "fibradevidrio";

$con = mysqli_connect($servidor_mysql, $usuario_mysql, $password_mysql, $base_mysql) 
or die("No se pudo conectar con el servidor");

mysqli_select_db($con, $base_mysql) 
or die("No se pudo conectar a la base de datos.");

mysqli_query($con, "SET NAMES 'utf8'");



$nombre_pagina = "proyectosenfibradevidrio.com";
$tabla_usuarios = "usuarios";

$carpeta_thumb = "../subidas/th";
$carpeta_imagen = "../subidas";

?>