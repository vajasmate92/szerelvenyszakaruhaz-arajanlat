<script>
    $ ( document ) . ready ( () => {
    <?php include 'scripts/script.const.inputfield.js.php'; ?>
            <?php include 'scripts/script.const.hibauzenetablak.js.php'; ?>

            let hiba = false;
        
            hibaUzenetAblak . hide ();

        inputMezok . click ( () => {

            hibaUzenetAblak . hide ();
                uzenetLista . empty ();
                    inputMezok . removeClass ( "border-danger" );
                        hiba = false;

        })

    gomb . click ( () => {
        uzenetLista . empty ();
        if ( inputEmail . val () . length <= 0 ) {

            uzenetLista . append("<li>Az email cím nincs kitöltve!</li>");
                inputEmail . addClass("border-danger");
                    hiba = true;

                }
        if ( inputJelszo . val () . length <= 0 ) {

            uzenetLista . append("<li>A jelszó cím nincs kitöltve!</li>");
                inputJelszo . addClass("border-danger");
                    hiba = true;

                }
        
        if ( hiba ) {

            hibaUzenetAblak . addClass ( "alert alert-danger alert-dismissible fade show" );
                hibaUzenetAblak . show ();

        }  else {
            
            var elkuldottAdatok = $ ( 'form' ) . serialize ();
                // console . log ( elkuldottAdatok );
                $ . post ( "controllers/control.login.php", elkuldottAdatok, ( data ) => {

                    console . log ( data );

                    if ( data == 'Ez az email cím nem létezik' ) {

                        uzenetLista . append ( "<li>" + data +"</li>" );
                            hibaUzenetAblak . addClass( "alert alert-danger alert-dismissible fade show" );
                                inputEmail . addClass ( "border-danger" );
                                    hibaUzenetAblak . show ();
                                        hiba = true;

                    } if ( data == 'A jelszó nem helyes a megadott email címhez' ) {

                        uzenetLista . append ( "<li>" + data +"</li>" );
                            hibaUzenetAblak . addClass ( "alert alert-danger alert-dismissible fade show" );
                                inputEmail . addClass ( "border-danger") ;
                                    hibaUzenetAblak . show ();
                                        hiba = true;

                    } if ( data == 'A felhasználó nincs aktiválva!' ) {

                        uzenetLista . append ( "<li>" + data +"</li>" );
                            hibaUzenetAblak . addClass ( "alert alert-danger alert-dismissible fade show" );
                                inputEmail . addClass ( "border-danger" );
                                    hibaUzenetAblak . show ();
                                        hiba = true;

                    } 
                        
                        window . location . assign ( 'administration.php' );


                        }
                    )
                }
            }
        )
    }
);


    
</script>