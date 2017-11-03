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

//No puede funcionar
$a = var_dump_return( array( 'a1' => 'a2', 'b1' => 'b2') );
echo 'length = ' . strlen( $a ) . " | string = " . $a;

$b = var_dump_return( array( 'a1' => 'a2', 'b1' => 'b2') );
echo 'length = ' . strlen( $b ) . " | string = " . $b;

$c = print_r_return( array( 'a1' => 'a2', 'b1' => 'b2') );
echo 'length = ' . strlen( $c ) . " | string = " . $c;


//Sanear strings
function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
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


?>
