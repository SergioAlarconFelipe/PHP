<?php
//Salida por texto
function var_dump_return( $a ) {
	ob_start();
	var_dump( $a );
	return ob_get_clean();
}

function print_r_return( $a ) {
	return print_r( $a, true );
}

echo '<h2>Prueba 1</h2>';
$a = var_dump_return( array( 'a1' => 'a2', 'b1' => 'b2') );
echo 'length = ' . strlen( $a ) . " | string = " . $a;

echo '<h2>Prueba 2</h2>';
$b = print_r_return( array( 'a1' => 'a2', 'b1' => 'b2') );
echo 'length = ' . strlen( $b ) . " | string = " . $b;


//Sanear strings
function sanear_string1($string){
	$string = trim($string);
 
	$string = str_replace(
		array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
		array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
		$string
	);
 
	$string = str_replace(
		array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
		array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
		$string
	);
 
	$string = str_replace(
		array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
		array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
		$string
	);
 
	$string = str_replace(
		array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
		array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
		$string
	);
 
	$string = str_replace(
		array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
		array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
		$string
	);
 
	$string = str_replace(
		array('ñ', 'Ñ', 'ç', 'Ç'),
		array('n', 'N', 'c', 'C',),
		$string
	);
 
	//Esta parte se encarga de eliminar cualquier caracter extraño
	$string = str_replace(
		array("", "¨", "º", "-", "~", "#", "@", "|", "!",
			 "·", "$", "%", "&", "",
			 "(", ")", "?", "'", "¡",
			 "¿", "[", "^", "<code>", "]",
			 "+", "}", "{", "¨", "´",
			 ">", "< ", ";", ",", ":",
			 ".", " "),
		'',
		$string
	);
	
	return $string;
}
function normaliza ($cadena){
	$originales = 	'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
	$modificadas = 	'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
	$cadena = utf8_decode($cadena);
	$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	$cadena = strtolower($cadena);
	return utf8_encode($cadena);
}

//Validaciones por IP
function obtenerDireccionIP() {
	if (!empty($_SERVER ['HTTP_CLIENT_IP'] ))
		$ip=$_SERVER ['HTTP_CLIENT_IP'];
	elseif (!empty($_SERVER ['HTTP_X_FORWARDED_FOR'] ))
		$ip=$_SERVER ['HTTP_X_FORWARDED_FOR'];
	else
		$ip=$_SERVER ['REMOTE_ADDR'];

	return $ip;
}
function restringirConjuntoIps($ips) {
	$ipCliente = obtenerDireccionIP();
 	
	if (in_array($ipCliente,$ips)) {
		return true;
	} else {
		header('location: http://direccion_envio_salida');
		exit;
	}
}

// Medir tiempo de trabajo
function medirTiempo () {
	// Iniciar contador
	$inicio = microtime(true);
	
	// Parara para probar el codigo
	usleep( 5000000 );	// Igual que "sleep( 5 );"
	
	// Parar contador y mostrar salida
	$fin = microtime(true);
	$salida = '';
	$seg_ini = $fin - $inicio;
	$horas = floor($seg_ini/3600);
	$minutos = floor(($seg_ini-($horas*3600))/60);
	$segundos = round($seg_ini-($horas*3600)-($minutos*60), 2);

	if(!empty($horas))
		$salida .= $horas.' hora(s), ';
	$salida .= $minutos. ' minuto(s) y '.$segundos.' segundo(s)';

	echo $salida;
}

/**
 *  Inserta a item in the indicated array
 *  Example to use:
 *      $arr = insertInArrayAtPosition( array( 'a', 'b', 'c' ), 'i', 1 );
 *      $arr = insertInArrayAtPosition( array( 'a', 'b', 'c' ), array( 'i1', 'i2' ), 1 );
 * 
 *  @param $array   Array where insert the indicated item
 *  @param $insert  Item to insert
 *  @param $pos     Position where insert the indicated item
 * 
 *  @return	        Array with the inserted item
 */
function insertInArrayAtPosition( $array, $insert, $pos ) {
    array_splice( $array, $pos, 0, $insert );
    return $array;
}

?>
