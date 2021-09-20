<?php 
session_start();
include 'modells/modell.pdoconn.class.php';
include 'modells/modell.login.class.php';
$conn = new PDOConn();

$login = new Bejelentkezes();


?>

<!DOCTYPE html>
<html lang="hu-HU">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teszt</title>
    </head>
    <body>
        <form action="test.php" method="POST">
            <input type="text" name="email">
            <input type="text" name="jelszo">
            <input type="submit" value="Teszt" name="submit">
        </form>
        <?php
            if (isset($_POST['email']) && isset($_POST['jelszo']) && !empty($_POST['email']) && !empty($_POST['jelszo'])) {

                $login -> bejelentkezesIgenyBekuldese($_POST['email'], $_POST['jelszo']);
                //$_SESSION['id'] = $login -> sessionID($_POST['email']);
                //echo $_SESSION['id'];
                $loginId = $login -> sessionID($_POST['email']);
                $_SESSION['id'] = $loginId;
                header ('Location: components/component.test.php');
                
            }
            
                //header('Location: components/component.test.php')
            // if (isset($_POST['email']) && $_POST['jelszo'] && $_POST['submit'] && !empty($_POST['email']) && !empty($_POST['jelszo'])) {

            // }
            ?>
    
</body>
</html>