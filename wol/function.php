<?php
function wol( $broadcast, $mac ) {
    $mac_array = split( ':', $mac );
	
    $hwaddr = '';

    foreach( $mac_array AS $octet ) {
        $hwaddr .= chr( hexdec( $octet ) );
    }
	
	// Create Magic Packet

    $packet = '';
    for ($i = 1; $i <= 6; $i++) {
        $packet .= chr(255);
    }

    for ($i = 1; $i <= 16; $i++) {
        $packet .= $hwaddr;
    }
	
	var_dump( $packet );

    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
	
    if( $sock ) {
        $options = socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, true);

        if( $options >= 0 ) {    
            $e = socket_sendto( $sock, $packet, strlen( $packet ), 0, $broadcast, 4343 );
			
            socket_close( $sock );
        }    
    }
}
?>
