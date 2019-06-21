<?php
// The php.ini setting phar.readonly must be set to 0
$directoryCode = 'appCode';
$fileExtension = 'app.phar';
$file = 'app';

// clean up
if( file_exists( $fileExtension ) ) {
    unlink( $fileExtension );
}
if( file_exists( $file ) ) {
    unlink( $file );
}

// create phar
$p = new Phar( $fileExtension );

// creating our library using whole directory  
$p->buildFromDirectory( $directoryCode . '/' );

// pointing main file which requires all classes  
$p->setDefaultStub( 'index.php', '/index.php' );

// Comprimimos el phar para que no se vea el codigo directamente
$p->compressFiles( Phar::GZ );

// plus - compressing it into gzip  
//$p->compress(Phar::GZ);
//$p->compress(Phar::BZ2);
//$p->compress(Phar::NONE);

// Creamos la version sin extension
copy( $fileExtension, 'app' );

// Notificamos que todo el proceso se ha realizado correctamente
echo '=========================================================' . PHP_EOL;
echo '=== Phar creado correctamente ===========================' . PHP_EOL;
echo '=========================================================';




