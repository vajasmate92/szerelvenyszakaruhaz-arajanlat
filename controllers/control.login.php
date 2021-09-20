<?php
    session_start ();
        include '../modells/modell.pdoconn.class.php';
                    include '../modells/modell.login.class.php';   

    $login = new Bejelentkezes ();

    $_POST['email'] = $email;
    $_POST['jelszo'] = $jelszo;

        $login -> bejelentkezesIgenyBekuldese($email, $jelszo);
            $loginId = $login -> sessionID($email);
                $_SESSION['id'] = $loginId;
                    //header ('Location: ../vizsgamunka-2/administration.php');

