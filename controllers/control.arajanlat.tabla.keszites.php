<?php
session_start ();

include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.partner.class.php';  
    $partner = new Partner ();

    $partnerID = $partner -> partnerIDLeker ( $_SESSION [ 'id' ] [ 'pk_id' ] );

    if ( 
        isset ( $_GET [ 'arajanlatNev' ] ) && !empty ( $_GET [ 'arajanlatNev' ] ) ) {
        $partner -> arajanlatLetrehozasa (
            $partnerID,
            $_POST [ 'arajanlatNev' ],
            $_POST [ 'arajanlatCimzettNev' ],
            $_POST [ 'arajanlatCimzettVaros' ],
            $_POST [ 'arajanlatCimzettIrsz' ],
            $_POST [ 'arajanlatCimzettCimUtcaHazszam' ]
        );
     }