<?php

    include 'modells/constans.php';
        include 'modells/pdoconn.class.php';

        $conn = new PDOConn();
?>

<!DOCTYPE html>
<html lang="hu-HU">
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Regisztráció</title>
                        <?php include 'links/link.bootstrap.css.php' ?>
                            <link rel="stylesheet" href="style/style.form.css">
    </head>
    <body>
        <?php include 'components/component.registration.php';
                include 'links/link.bootstrap.js.php';
                    include 'links/link.jquery.script.php';
                        include 'scripts/script.register.js.php' ?>
    </body>
</html>