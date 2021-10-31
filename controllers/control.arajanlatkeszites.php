<?php
session_start ();

include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.partner.class.php';  
    $partner = new Partner ();

    $partnerID = $partner -> partnerIDLeker ( $_SESSION [ 'id' ] [ 'pk_id' ] );

    if ( 
        isset ( $_POST [ 'arajanlatNev' ] ) && !empty ( $_POST [ 'arajanlatNev' ] )
        &&
        isset ( $_POST [ 'arajanlatCimzettNev' ] ) && !empty ( $_POST [ 'arajanlatCimzettNev' ] )
        &&
        isset ( $_POST [ 'arajanlatCimzettIrsz' ] ) && !empty ( $_POST [ 'arajanlatCimzettIrsz' ] )
        &&
        isset ( $_POST [ 'arajanlatCimzettVaros' ] ) && !empty ( $_POST [ 'arajanlatCimzettVaros' ] )
        &&
        isset ( $_POST [ 'arajanlatCimzettCimUtcaHazszam' ] ) && !empty ( $_POST [ 'arajanlatCimzettCimUtcaHazszam' ] )
     ) {
        $partner -> arajanlatLetrehozasa (
            $partnerID,
            $_POST [ 'arajanlatNev' ],
            $_POST [ 'arajanlatCimzettNev' ],
            $_POST [ 'arajanlatCimzettVaros' ],
            $_POST [ 'arajanlatCimzettIrsz' ],
            $_POST [ 'arajanlatCimzettCimUtcaHazszam' ]
        );
     }