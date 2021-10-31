<?php
session_start();
    include 'modells/modell.pdoconn.class.php';
    include 'modells/modell.admin.class.php';
    include 'modells/modell.partner.class.php';
    include 'modells/modell.router.class.php';
    include 'view/view.class.php';

    $admin = new Admin ();
    $view = new View ();
    $router = new AdminSiteRouter ();
    $partner = new Partner ();




        if ( ! isset ( $_SESSION [ 'id' ] ) ) {
            header ( 'Location: login.php' );
        }

        $page = $_GET [ 'page' ] ?? 'administration';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezelői felület</title>
    <?php include 'links/link.bootstrap.css.php' ?>
    <?php include 'links/link.bootstrapicons.css.php' ?>
</head>
<?php include 'components/component.navbar.admin.php';?>
<div class="container-fluid">
<div class="row">
    </div>
    <div class="row">
        <div class="col-xl-3">
            </div>
            <div class="col-xl-6">
                <?php
                        include $router -> router ( $page ); 
                    ?>
            </div>
    <div class="row">
        <div class="col-xl-3">
            </div>
</div>

    <?php include 'links/link.bootstrap.js.php';
    include 'links/link.jquery.script.php';
    include 'scripts/script.admin.js.php' ;
    include 'scripts/script.arajanlatletrehozas.php' ;
    ?>
</body>
</body>
</html>