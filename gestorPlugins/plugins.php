<?php
//set_error_handler( 'controlError' );

$pluginsPaths = array();
$pluginsFunctions = array();

// configuracion
/** 
 *  If it's true, the functions only have a parameter with a object with multiples parameters
 *  If it's false, the functions have a multiples parameters
 */ 
$parametersAsObject = true;

// Get plugins
$paths = new DirectoryIterator( getcwd() . '/plugins/' );
foreach( $paths as $path ) {
	if( !$path->isDot() && $path->isDir() ) {
		if( file_exists( getcwd() . '/plugins/' . $path . '/main.php' ) ) {
			$pluginsPaths[] = getcwd() . '/plugins/' . $path . '/main.php';
		}
	}
}
// Include plugins
foreach( $pluginsPaths as $path ) {
	include $path;
}

// Exec hook
function execAction( $action = '', $params = array() ) {
	global $pluginsFunctions;
	global $parametersAsObject;
	
	if( isset( $pluginsFunctions[ $action ] ) ) {
		foreach( $pluginsFunctions[ $action ] as $priorities ) {
			foreach( $priorities as $priority => $function ) {
				if( $parametersAsObject ) {
					call_user_func_array( $function, array( (object) $params ) );
				} else {
					call_user_func_array( $function, $params );
				}
			}
		}
	}
}

// Add action to hook
function addAction( $action, $function, $priority = 10 ) {
	global $pluginsFunctions;
	
	$pluginsFunctions[ $action ][ $priority ][] = $function;
	
	ksort( $pluginsFunctions[ $action ] );
}

// Warnings
/*
function controlError( $errno, $errstr, $errfile, $errline, $errcontext ) {
	switch ($errno) {
		case 2:
			echo '<b>ERROR</b> [' . $errno . '] La clase "' . get_class( $errcontext[ 'function' ][0] ) . '" no posee el metodo "' . $errcontext[ 'function' ][1] . '".<br />';
			break;

		default:
			echo "Tipo de error desconocido: [$errno] $errstr<br />\n";
			break;
    }
	
    return true;
}
*/
