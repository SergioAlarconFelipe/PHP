<?php
// The php.ini setting phar.readonly must be set to 0
$fileExtension = 'app.phar';
$file = 'app';

// clean up
if( file_exists( $file . '.tar' ) ) {
    unlink( $file . '.tar' );
}

// create phar
$p = new Phar( $fileExtension );

// decrypt
$p->convertToData( Phar::TAR );

// Notificamos que todo el proceso se ha realizado correctamente
echo '=========================================================' . PHP_EOL;
echo '=== Phar desencriptado correctamente ====================' . PHP_EOL;
echo '=========================================================';