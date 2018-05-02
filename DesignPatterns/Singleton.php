<?php
class Singleton {
    private static $instancia;
    private $contador;


    private function __construct()
    {
	echo "He creado un " . __CLASS__ . "\n";
	$this->contador = 0;
    }

    public static function getInstance()
    {
	if( !self::$instancia instanceof self )
	{
	    self::$instancia = new self;
	}
	return self::$instancia;
    }

    public function incrementar()
    {
	return ++$this->contador;
    }

    public function disminuir()
    {
	return --$this->contador;
    }
    
    // Se ejecuta cuando se hace un clone
    public function __clone()
    {
	trigger_error("Operación Invalida: No puedes clonar una instancia de ". get_class($this) ." class.", E_USER_ERROR );
    }
    
    // Se ejecuta cuando se hace un serilize
    public function __sleep()
    {
	trigger_error("No puedes serializar una instancia de ". get_class($this) ." class.");
    }
    
    // Se ejecuta cuando se hace un desserialize
    public function __wakeup()
    {
	trigger_error("No puedes deserializar una instancia de ". get_class($this) ." class.");
    }
}
