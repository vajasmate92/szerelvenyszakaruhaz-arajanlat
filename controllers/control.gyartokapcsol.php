<?php
include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.admin.class.php';  

$admin = new Admin ();

$allapot = is_numeric ( $_GET [ 'allapot' ] ); 

if ( 
    isset ( $_GET [ 'gyarto' ] ) && !empty ( $_GET [ 'gyarto' ] ) 
    &&
    $allapot
    ) {
        $admin -> gyartoKapcsol (
        $_GET [ 'gyarto' ],
        $_GET [ 'allapot' ]
        );
        header ( 'Location: ' . $_SERVER [ "HTTP_REFERER" ] );
}