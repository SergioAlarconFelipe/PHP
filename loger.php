<?php
class logger {
	private $output;
	private $methodOutput;
	
	private $format;
	
	private $pathOutputFile;
	private $nameOutputFile;
	private $extensionOutputFile;
	
	
	public function __construct() {
		define( 'LOG_OUTPUT_STANDAR', 0 );
		define( 'LOG_OUTPUT_STRING', 1 );
		$methodOutput = LOG_OUTPUT_STANDAR;
		
		$this->format = "msg";
		
	}
	
	public function get() {
	
	}
	public function set() {
	
	}
	
	public function getLineCalled() {
	
	}
	public function getFileCalled() {
	
	}
	public function getFuncitonCalled() {
	
	}
	public function getClassCalled() {
	
	}
	
	public function setFormar( $str ) {
	
	}
	
	public function writeLog( $str ) {
	
	}
	
	public function delLog() {
	
	}
	
	public function existsLog() {
	
	}
}
?>
