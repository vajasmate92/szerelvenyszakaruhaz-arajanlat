<?php
include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.admin.class.php';

$admin = new Admin ();

$termekcsoportID = is_numeric ( $_GET [ 'id' ] ); 
$allapot = is_numeric ( $_GET [ 'allapot' ] ); 

if ( 
    isset ( $_GET [ 'id' ] ) && !empty ( $_GET [ 'id' ] ) 
    &&
    $allapot
    ) {
        $admin -> termekcsoportKapcsol (
        $_GET [ 'id' ],
        $_GET [ 'allapot' ]
        );
        header ( 'Location: ' . $_SERVER [ "HTTP_REFERER" ] );
}