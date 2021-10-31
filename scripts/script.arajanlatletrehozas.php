<script>
    $ ( 'button#arajanlatLetrehozasGomb' ) . click ( () => {
        var elkuldottAdatok = $ ( "form#arajanlatUploadForm" ) . serialize (); 

        // console . log ( elkuldottAdatok );

        $ . post ( 'controllers/control.arajanlatkeszites.php' , elkuldottAdatok, () => { location . reload () } ); 
    } );
</script>