<?php

// funciones
function p1_1() {
	echo 'p1_1 => hola: <br/>';
}
function p1_2( $param1 = '' ) {
	echo 'p1_2 => hola: ' . print_r( $param1, true ) . '<br/>';
}
function p1_3( $param1 = '', $param2 = '', $param3 = '' ) {
	echo 'p1_3 => hola: ' . print_r( $param1, true ) . ', ' . print_r( $param2, true ) . ', ' . print_r( $param3, true ) . '<br/>';
}
addAction( 'body', 'p1_1', 4 );
addAction( 'body', 'p1_2', 2 );
addAction( 'body', 'p1_3', 6 );

// metodos de objeto
include 'Dato.php';
$d = new Dato(8);
addAction( 'body', array( $d, 'echoValor' ), -9 );
addAction( 'body', array( $d, 'echoSumarValor' ), -15 );
addAction( 'body', array( $d, 'echoValor' ), -10 );

// metodos de objeto con parametros
$d = new Dato(8);

addAction( 'footer2', array( $d, 'echoValor' ) );
addAction( 'footer2', array( $d, 'setValor' ) );
addAction( 'footer2', array( $d, 'echoValor' ) );



function p1_4( $param1 = '', $param2 = '', $param3 = '' ) {
	echo 'p1_4<br/>';
	var_dump( $param1 );
	var_dump( $param2 );
	var_dump( $param3 );
}
addAction( 'body', 'p1_4' );
