<?php
    session_start ();
        include '../modells/modell.pdoconn.class.php';
                    include '../modells/modell.login.class.php';   

    $login = new Bejelentkezes ();

    $emailCimEllenorzes = $login -> letezikEAzEmailCim ( $_POST [ "email" ] ) ;

    if ( $emailCimEllenorzes ) {
        
        $jelszoEllenorzes = $login -> helyesEAJelszo ( $_POST [ "email" ] , $_POST [ "jelszo" ] ) ;

        if ( $jelszoEllenorzes ) {

            $felhasznaloAllapotEllenorzes = $login -> felhasznaloAllapot ( $_POST [ "email" ] ) ;

            if ( $felhasznaloAllapotEllenorzes ) {

                $sessionID = $login -> felhasznaloAdatokLekerdezes ( $_POST [ "email" ] ) ;
                $_SESSION [ 'id' ] = $sessionID;
            }
        }
    }

