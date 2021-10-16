<?php
session_start ();

include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.admin.class.php';  

$admin = new Admin ();

if ( isset ( $_POST [ 'termekkategoria' ] ) && !empty ( $_POST [ 'termekkategoria' ] ) ) {
    $admin -> termekKategoriaFeltoltes (
        $_POST [ 'termekkategoria' ],
        $_SESSION [ 'id' ] [ 'pk_id' ]
    );
}