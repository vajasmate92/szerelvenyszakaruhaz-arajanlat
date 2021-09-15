<?php
    include '../modells/pdoconn.class.php';
                include '../modells/login.class.php';   

    $login = new Bejelentkezes();

        $login -> bejelentkezesIgenyBekuldese($_POST['email'], $_POST['jelszo']);

