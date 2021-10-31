<?php
    include '../modells/modell.pdoconn.class.php';
                include '../modells/modell.registration.class.php';
               
    $registration = new Registration();

    $emailCimEll = $registration -> foglaltEAzEmailCim ( $_POST [ 'email' ] );

    if ( $emailCimEll ) {
        $registration -> regisztraciosIgenyBekuldese ( $_POST [ 'nev' ], $_POST [ 'email' ], $_POST  [ 'jelszo' ] );
    }
