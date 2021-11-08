<?php 
// Estas funciones obtienen datos de la página
function get($dato, $tabla) {
$info_query = "select $dato from $tabla";
$result_get = mysql_query($info_query);
$get = mysql_fetch_assoc($result_get);
echo  $get[$dato];
}


//funcion fecha_filtrada obtiene un dato de la fecha para colocarlo en una posición especifica
function fecha_filtrada($date, $opcion) {
	$dia = explode("-", $date, 3);	$year = $dia[0];	$month = (string)(int)$dia[1];	$day = (string)(int)$dia[2];
	$dias = array("domingo","lunes","martes","mi&eacute;rcoles" ,"jueves","viernes","s&aacute;bado");
	$tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
	$meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre","noviembre", "diciembre");
	
		switch ($opcion) {
		case "dia_semana":		return $tomadia;		break;
		case "dia_numerico":	return $day;			break;
		case "mes":				return $meses[$month];	break;
		case "ano":				return $year;			break;
		default:				return $tomadia.", ".$day." de ".$meses[$month]." de ".$year;	break;
		}
}
// funcion fecha_esp que tiene fallo con el utf-8
function fecha_esp($fecha) {
setlocale(LC_ALL,"es_ES.utf8","es_ES.utf8","esp");
$diasemana	=	strftime("%A", strtotime($fecha));
$diames		=	strftime("%d", strtotime($fecha));
$mes		=	strftime("%B", strtotime($fecha));
$anio		=	strftime("%Y", strtotime($fecha));
echo $diasemana.", ".$diames." de ".$mes." de ".$anio;
}

// Esta funcion crea un dato aleatorio
function aleimg ($long = 9, $letras_min = true, $letras_max = true, $num = true) {
$salt = $letras_min?'abchefghknpqrstuvwxyz':'';
$salt .= $letras_max?'ACDEFHKNPRSTUVWXYZ':'';
$salt .= $num?(strlen($salt)?'2345679':'0123456789'):'';
if (strlen($salt) == 0) { return ''; }
$i = 0;
$str = '';
srand((double)microtime()*1000000);
while ($i < $long) {
$num = rand(0, strlen($salt)-1);
$str .= substr($salt, $num, 1);
$i++; }
return $str; }

// Esta funcion crea un select a partir de una tabla
function get_select($tabla, $campo, $name)
{
	$sql = "SELECT * FROM $tabla order by id DESC";
	$result = mysql_query($sql);

	if ($row = mysql_fetch_array($result)){
		echo  "<select name=".$name.">";
	do {
	echo    "<option>".$row[$campo]."</option>";
	}
	while ($row = mysql_fetch_array($result));
	echo  "</select>";
	}
}

// Esta funcion corta una cadena a cierto tamaño especificado
function cortar($texto, $max) {
$cortado = substr($texto,0,strrpos(substr($texto,0,$max)," "));
return $cortado."...";
}

?>
