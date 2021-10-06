<script>
    <?php include 'script.const.adminelemek.js.php'; ?>


    jovahagyasGomb . click ( () => {
       var elkuldottAdatok = $ ( 'form#partnerInitForm' ) . serialize ();
            console . log ( elkuldottAdatok );

        $ . post ( 'controllers/control.admin.php' , elkuldottAdatok , ( data ) => { console . log ( data ); window . history . back(); } );

    } )

    partnerSzerkesztesGomb . click ( () => {
       var elkuldottAdatok = $ ( 'form#partnerEditForm' ) . serialize ();
            console . log ( elkuldottAdatok );

        $ . post ( 'controllers/control.partnermentes.php' , elkuldottAdatok , ( data ) => { console . log ( data ) } );

    } )

    // ( data ) => { console . log ( data ); window . history . back(); } 
    

</script>