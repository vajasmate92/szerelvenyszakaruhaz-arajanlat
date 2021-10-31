<script>
    $ ( 'input#kereso' ) . keyup ( () => {
    var elkuldottAdatok = $ ( '#keresesForm' ) . serialize ();
    // console . log ( elkuldottAdatok );
    $ . post ( 'controllers/control.kereses.php' , elkuldottAdatok , ( data ) => { $ ( 'tbody#tablebody' ) . html ( data ) } );
} )
    </script>