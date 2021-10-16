<?php
session_start ();

include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.admin.class.php';  

$admin = new Admin ();

if (
    isset ( $_POST [ 'gyarto' ] ) && !empty ( $_POST [ 'gyarto' ] ) 
    &&
    isset ( $_POST [ 'termekcsoport' ] ) && !empty ( $_POST [ 'termekcsoport' ] ) 
    &&
    isset ( $_POST [ 'termekkategoria' ] ) && !empty ( $_POST [ 'termekkategoria' ] ) 
    &&
    isset ( $_POST [ 'termek' ] ) && !empty ( $_POST [ 'termek' ] ) 
    &&
    isset ( $_POST [ 'cikkszam' ] ) && !empty ( $_POST [ 'cikkszam' ] ) 
    &&
    isset ( $_POST [ 'ar' ] ) && !empty ( $_POST [ 'ar' ] ) 
) {
    $admin -> termekFeltoltes (
        $_POST [ 'gyarto' ],
        $_POST [ 'termekcsoport' ],
        $_POST [ 'termekkategoria' ],
        $_POST [ 'termek' ],
        $_POST [ 'cikkszam' ],
        $_POST [ 'ar' ],
        $_SESSION [ 'id' ] [ 'pk_id' ]
    );
}