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

// Permite embeber codigo PHP en el cuerpo de los post y las paginas de wordpress
//	ejemplo: [insert_php] echo adrotate_group(9); [/insert_php]
add_filter( 'the_content', 'exectPHP_content', 9 );
function exectPHP_content($content)
{
	$will_bontrager_content = $content;
	preg_match_all('!\[insert_php[^\]]*\](.*?)\[/insert_php[^\]]*\]!is',$will_bontrager_content,$will_bontrager_matches);
	$will_bontrager_nummatches = count($will_bontrager_matches[0]);
	for( $will_bontrager_i=0; $will_bontrager_i<$will_bontrager_nummatches; $will_bontrager_i++ )
	{
		ob_start();
		eval($will_bontrager_matches[1][$will_bontrager_i]);
		$will_bontrager_replacement = ob_get_contents();
		ob_clean();
		ob_end_flush();
		$will_bontrager_content = preg_replace('/'.preg_quote($will_bontrager_matches[0][$will_bontrager_i],'/').'/',$will_bontrager_replacement,$will_bontrager_content,1);
	}
	return $will_bontrager_content;
} # function will_bontrager_insert_php()

?>


<?php 
//Incluir una pagina dentro de otra
include (get_template_directory() . '/pagina.php');
?>
