<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        if (!isset($_SESSION['id'])) {
            echo 'Nincs bejelentkezve';
        } else {
            echo 'Be van jelentkezve';
        }
    ?>

    <h1>Üdvözlöm, <?php echo $_SESSION['id']; ?></h1>
    
</body>
</html>