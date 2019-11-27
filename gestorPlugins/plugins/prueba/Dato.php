<?php
class Dato {
	private $valor;
	
	function __construct( $valor ) {
		$this->valor = $valor;
	}
	
	function getValor() {
		return $this->valor;
	}
	
	function setValor( $valor = 0 ) {
		$this->valor = $valor->arg1;
	}
	
	function echoValor() {
		echo $this->valor . '<br/>';
	}
	
	function echoSumarValor() {
		$this->valor ++;
		echo $this->valor . '<br/>';
	}
	
}
