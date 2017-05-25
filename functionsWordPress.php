<?php
// Listar todos los hooks - List all hooks
$debug_tags = array();
add_action( 'all', function ( $tag ) {
    global $debug_tags;
    if ( in_array( $tag, $debug_tags ) ) {
        return;
    }
    echo "<pre>" . $tag . "</pre>";
    $debug_tags[] = $tag;
} );


//Log
if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}


//Timer
$start = 0;
add_action( 'init', 'iniciar');
function iniciar () {
	$time = microtime();
	$time = explode(' ', $time);
	$time = $time[1] + $time[0];
	$start = $time;
	
	echo $start;
}

add_action( 'init', 'finalizar');
function finalizar () {
	$time = microtime();
	$time = explode(' ', $time);
	$time = $time[1] + $time[0];
	$finish = $time;
	$total_time = round(($finish - $start), 4);
	
	echo "-" . $finish;
	echo "<br />" . $finish - $start;
	//echo 'Page generated in '.$total_time.' seconds.';
}


?>


<?php 
//Incluir una pagina dentro de otra
include (get_template_directory() . '/pagina.php');
?>
