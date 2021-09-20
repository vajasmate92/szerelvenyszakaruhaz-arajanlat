<?php
session_start();
    include 'modells/modell.pdoconn.class.php';
        include 'view/view.admin.class.php';

    $admin = new Admin ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezelői felület</title>
    <?php include 'links/link.bootstrap.css.php' ?>
        <link rel="stylesheet" href="style/style.administration.css">
</head>
<body>


<?php include 'components/component.navbar.admin.php';
                include 'links/link.bootstrap.js.php';
                    include 'links/link.jquery.script.php';
                        include 'scripts/script.register.js.php' ?>
    
</body>
</html>