<?php
function p1_1() {
	echo 'hola: <br/>';
}
function p1_2( $param1 = '' ) {
	echo 'hola: ' . $param1 . '<br/>';
}
function p1_3( $param1 = '', $param2 = '', $param3 = '' ) {
	echo 'hola: ' . $param1 . ', ' . $param2 . ', ' . $param3 . '<br/>';
}
addAction( 'body', 'p1_1', 4 );
addAction( 'body', 'p1_2', 2 );
addAction( 'body', 'p1_3', 6 );

include 'Dato.php';
$d = new Dato(8);
addAction( 'body', array( $d, 'echoValor' ), -9 );
addAction( 'body', array( $d, 'echoSumarValor' ), -15 );