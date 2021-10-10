<?php
include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.admin.class.php';  

$admin = new Admin ();

$allapot = is_numeric ( $_GET [ 'allapot' ] ); 

if ( 
    isset ( $_GET [ 'termekcsoport' ] ) && !empty ( $_GET [ 'termekcsoport' ] ) 
    &&
    $allapot
    ) {
        $admin -> termekcsoportGyartohozRendel (
        $_GET [ 'termekcsoport' ],
        $_GET [ 'allapot' ]
        );
    header ( 'Location: ' . $_SERVER [ "HTTP_REFERER" ] );
}