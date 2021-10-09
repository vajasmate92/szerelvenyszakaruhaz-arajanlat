<script>
    <?php include 'script.const.adminelemek.js.php'; ?>


    jovahagyasGomb . click ( () => {
       var elkuldottAdatok = $ ( 'form#partnerInitForm' ) . serialize ();
            // console . log ( elkuldottAdatok );

        $ . post ( 'controllers/control.admin.php' , elkuldottAdatok , ( data ) => { console . log ( data ); window . history . back(); } );

    } )

    partnerSzerkesztesGomb . click ( () => {
       var elkuldottAdatok = $ ( 'form#partnerEditForm' ) . serialize ();
        // console . log ( elkuldottAdatok );

        $ . post ( 'controllers/control.partnermentes.php' , elkuldottAdatok , ( data ) => { console . log ( data ); window . history . back(); } );

    } )

    gyartoFeltoltesGomb . click ( () => {
        var elkuldottAdatok = $ ( "form#gyartoUploadForm" ) . serialize ();
        // console . log ( elkuldottAdatok );

        $ . post ( 'controllers/control.gyartofeltoltes.php' , elkuldottAdatok , ( data ) => { console . log ( data ); location . reload (); } );

    } )

    gyartoModositGomb . click ( () => {
        var elkuldottAdatok = $ ( "form#gyartoEditForm" ) . serialize ();
        // console . log ( elkuldottAdatok );

        $ . post ( 'controllers/control.gyartomodosit.php' , elkuldottAdatok , ( data ) => { console . log ( data ); window . history . back(); } ); 

    } )

    termekcsoportFeltoltesGomb . click ( () => {
        var elkuldottAdatok = $ ( "form#termekcsoportUploadForm" ) . serialize ();
        console . log ( elkuldottAdatok );

        $ . post ( 'controllers/control.termekcsoportfeltoltes.php' , elkuldottAdatok , ( data ) => { console . log ( data ); location . reload (); } ); 

    } )

</script>