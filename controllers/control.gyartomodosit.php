<?php
include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.admin.class.php';  

$admin = new Admin ();

if ( isset ( $_POST [ "gyarto" ] ) && isset ( $_POST [ "gyartoID" ] ) &&  !empty ( $_POST [ "gyarto" ] ) && !empty ( $_POST [ "gyartoID" ] ) ) {

    $admin -> gyartoSzerkesztes (
        $_POST [ "gyarto" ],
        $_POST [ "gyartoID" ]
    );
}