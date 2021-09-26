<?php
session_start();
    include 'modells/modell.pdoconn.class.php';
        include 'modells/modell.admin.class.php';

    $admin = new Admin ();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezelői felület - Szerőzöd partnerek</title>
    <?php include 'links/link.bootstrap.css.php';
        include 'links/link.bootstrapicons.css.php'; ?>
</head>
<body>
    <?php include 'components/component.navbar.admin.php';?>
<div class="container-fluid">
<div class="row">
        <div class="col-xl-12"><h1 class="text-center my-2">Szerződött parntereink</h1></div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            </div>
            <div class="col-xl-6">
                <?php 
                    if ( $_GET [ 'adminPage' == 'partnerek'] ) {
                        include 'components/component.partnerek.table.php';?>
                    } 
                
            </div>
    <div class="row">
        <div class="col-xl-3">
            </div>
</div>

    <?php include 'links/link.bootstrap.js.php';
                    include 'links/link.jquery.script.php';
                        include 'scripts/script.admin.js.php' ?>
</body>
</html>