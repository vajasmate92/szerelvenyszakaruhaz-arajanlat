<?php
            include '../modells/modell.pdoconn.class.php';
                include '../modells/modell.admin.class.php';  

    $admin = new Admin ();

    if ( isset ( $_POST [ 'partnerNev' ] ) && isset ( $_POST [ 'partnerCegNev' ] ) && isset ( $_POST [ 'partnerEmail' ] ) && isset ( $_POST [ 'partnerTelefonszamRegioKod' ] ) && isset ( $_POST [ 'partnerTelefonszamSzolgaltato' ] ) && isset ( $_POST [ 'partnerTelefonszam' ] ) && isset ( $_POST [ 'partnerKedvezmeny' ] ) && isset ( $_POST [ 'szallitoLevelLimit' ] ) && isset ( $_POST [ 'partnerID' ] ) && isset ( $_POST [ 'adminID' ] ) && isset ( $_POST [ 'adoszamTorzsszam' ] ) && isset ( $_POST [ 'adoszamAFAKod' ] ) && isset ( $_POST [ 'adoszamTeruletiKod' ] ) && isset ( $_POST [ 'partnerCegIrsz' ] ) && isset ( $_POST [ 'partnerCegVaros' ] ) && isset ( $_POST [ 'partnerCegCim' ] ) ) {
        $admin -> partnerElesitese (
            $_POST [ 'partnerCegNev' ],
                $_POST [ 'partnerTelefonszamRegioKod' ],
                    $_POST [ 'partnerTelefonszamSzolgaltato' ],
                        $_POST [ 'partnerTelefonszam' ],
                            $_POST [ 'partnerKedvezmeny' ],
                                $_POST [ 'szallitoLevelLimit' ],
                                    $_POST [ 'partnerID' ],
                                        $_POST [ 'adminID' ],
                                            $_POST [ 'adoszamTorzsszam' ],
                                                $_POST [ 'adoszamAFAKod' ],
                                                    $_POST [ 'adoszamTeruletiKod' ],
                                                        $_POST [ 'partnerCegIrsz' ],
                                                            $_POST [ 'partnerCegVaros' ],
                                                                $_POST [ 'partnerCegCim' ],
                                                                    $_POST [ 'partnerEmail' ],
                                                                        $_POST [ 'partnerNev' ]
        );
        $admin -> felhasznaloAktivalas ( $_POST [ 'partnerID' ] );
    }

