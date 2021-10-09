<?php
session_start ();

include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.admin.class.php';  

$admin = new Admin ();

if ( isset ( $_POST [ 'gyarto' ] ) && !empty ( $_POST [ 'gyarto' ] ) ) {
    $admin -> gyartoFeltoltes (
        $_POST [ 'gyarto' ],
        $_SESSION [ 'id' ]
    );
}