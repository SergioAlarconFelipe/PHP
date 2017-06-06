<?php

function var_dump_return( $a ) {
	ob_start();
	var_dump( $a );
	return ob_get_clean();
}

$a = var_dump_return( array( 'a1' => 'a2', 'b1' => 'b2') );
echo 'length = ' . strlen( $a ) . " | string = " . $a;

function print_r_return( $a ) {
	return ( $a, true );
}

$b = print_r_return( array( 'a1' => 'a2', 'b1' => 'b2') );
echo 'length = ' . strlen( $b ) . " | string = " . $b;

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
