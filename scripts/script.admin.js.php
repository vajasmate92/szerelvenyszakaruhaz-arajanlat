<script>
    <?php include 'script.const.adminelemek.js.php'; ?>


    jovahagyasGomb . click ( () => {
       var elkuldottAdatok = $ ( 'form#partnerElesites' ) . serialize ();
            console.log ( elkuldottAdatok );

        $ . post ( 'controllers/control.admin.php', elkuldottAdatok, ( data ) => {
            console.log ( data );
        } );

    } )
    

</script>