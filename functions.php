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

?>
