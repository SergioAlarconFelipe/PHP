<?php
/** 
 * Tipos de log:
 * log
 * debug
 * info
 * warn
 * error
 * trace
 * group
 * dir
 */
class ConsoleLog {
	public $msg;
	public $tipo;
 
	public function __construct($tipo, $msj) {
		$this->tipo = $tipo;
		$this->msg = $msj;
		$this->consolePrint();
	}
 
	public function consolePrint() {
		$script = '<script type="text/javascript">';
		$script .= 'console.' . $this->tipo . '(\'"' . addslashes($this->msg) . '"\')';
		$script .= '</script>';
		echo $script; 
	}
}

$mensaje = "Prueba";
$m = var_dump ($mensaje);
echo $m;
new ConsoleLog("trace", $mensaje );
new ConsoleLog("trace", $m );

?>
