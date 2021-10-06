<?php

include '../modells/modell.pdoconn.class.php';
    include '../modells/modell.admin.class.php';  

$admin = new Admin ();

if ( isset ( $_POST [ 'partnerNev' ] )
    && isset ( $_POST [ 'partnerCegNev' ] )
    && isset ( $_POST [ 'partnerEmail' ] )
    && isset ( $_POST [ 'partnerTelefonszam' ] )
    && isset ( $_POST [ 'partnerKedvezmeny' ] )
    && isset ( $_POST [ 'szallitoLevelLimit' ] )
    && isset ( $_POST [ 'partnerID' ] )
    && isset ( $_POST [ 'adminID' ] )
    && isset ( $_POST [ 'adoszam' ] )
    && isset ( $_POST [ 'partnerCegIrsz' ] )
    && isset ( $_POST [ 'partnerCegVaros' ] )
    && isset ( $_POST [ 'partnerCegCim' ] ) ) {

        $admin -> partnerSzerkesztes (
            $_POST [ 'partnerCegNev' ],
            $_POST [ 'partnerTelefonszam' ],
            $_POST [ 'adoszam' ],
            $_POST [ 'partnerCegIrsz' ],
            $_POST [ 'partnerCegVaros' ],
            $_POST [ 'partnerCegCim' ],
            $_POST [ 'partnerKedvezmeny' ],
            $_POST [ 'szallitoLevelLimit' ],
            $_POST [ 'partnerID' ] );

            $admin -> felhasznaloSzerkesztes (
            $_POST [ 'partnerEmail' ],
            $_POST [ 'partnerNev' ] ,
            $_POST [ 'partnerID' ]
        );
    }