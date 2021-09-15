<?php
    include '../modells/pdoconn.class.php';
                include '../modells/registration.class.php';
               
    $registration = new Registration();

    $registration -> regisztraciosIgenyBekuldese($_POST['nev'], $_POST['email'], $_POST['jelszo']);