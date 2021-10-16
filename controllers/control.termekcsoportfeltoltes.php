<?php
    session_start ();

    include '../modells/modell.pdoconn.class.php';
        include '../modells/modell.admin.class.php';  
    
    $admin = new Admin ();

    if ( 
        isset ( $_POST [ "termekcsoport" ] ) && !empty ( $_POST [ "termekcsoport" ] )
        &&
        isset ( $_POST [ "gyarto" ] ) && !empty ( $_POST [ "gyarto" ] )
     ) {
         $admin -> termekcsoportFeltoltes ( 
            $_POST [ "termekcsoport" ],
            $_POST [ "gyarto" ],
            $_SESSION  [ "id" ] [ 'pk_id' ]
          );
     }