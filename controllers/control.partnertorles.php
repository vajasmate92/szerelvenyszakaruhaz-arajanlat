<?php

include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.admin.class.php';  

$admin = new Admin ();

    $admin -> partnerTolrese ( $_GET [ 'id' ] );
    header ( 'Location: ../administration.php' );