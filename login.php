<?php
        include 'modells/pdoconn.class.php';

        $conn = new PDOConn();
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Login</title>
                        <?php include 'links/link.bootstrap.css.php' ?>
                            <link rel="stylesheet" href="style\style.form.css">
    </head>
    <body>
        <?php include 'components/component.login.php';
            include 'links/link.bootstrap.js.php';
                include 'links/link.jquery.script.php';
                    include 'scripts/script.login.js.php' ?>
    </body>
</html>