<?php
session_start();
include '../modells/modell.pdoconn.class.php';
include '../modells/modell.admin.class.php';
include '../modells/modell.router.class.php';
include '../view/view.class.php';

$admin = new Admin();
$view = new View();
$router = new AdminSiteRouter();

$termekekTomb = $view->termekekLista();
$dataListGyarto = $view-> gyartokLista ();
$dataListTermekkategoria = $view->termekkategoriak ();
$dataListTermekcsoport = $view->termekcsoportLista ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezelői felület</title>
    <?php include '../links/link.bootstrap.css.php' ?>
    <?php include '../links/link.bootstrapicons.css.php' ?>
</head>
<table class="table table-hover">
    <thead>
            <th class="text-center" scope="col">Cikkszám</th>
            <th class="text-center" scope="col">Gyártó</th>
            <th class="text-center" scope="col">Termékcsoport</th>
            <th class="text-center" scope="col">Kategória</th>
            <th class="text-center" scope="col">Termék</th>
            <th class="text-center" scope="col">Ár</th>
            <th class="text-center" scope="col">Mennyiség</th>
        </tr>
    </thead>
    <tbody id="tablebody">
    <?php for ($i = 0; $i < count($termekekTomb); $i++) {
        echo '<tr>';
        if ($termekekTomb[$i]['allapot'] == 1) {
            echo '<td class="text-center"><code>' .
                $termekekTomb[$i]['cikkszam'] .
                '</code></td>';
            echo '<td class="text-center">' .
                $termekekTomb[$i]['gyarto'] .
                '</td>';
            echo '<td class="text-center position-relative">' .
                $termekekTomb[$i]['termekcsoport'] .
                '</td>';
            echo '<td class="text-center">' .
                $termekekTomb[$i]['termekkategoria'] .
                '</td>';
            echo '<td class="text-center">' .
                $termekekTomb[$i]['termeknev'] .
                '</td>';
            echo '<td class="text-center">' .
                $termekekTomb[$i]['ar'] .
                ',- Ft</td>';
                echo '<td>';
                echo '<div class="row">';
                echo '<div class="col-xl-6">';
                echo '<input type="number" class="form-control form-control-sm" name="'.$termekekTomb[$i]['pk_id'].'" min="0">';
                echo '</div>';
                echo '<div class="col-xl-6">';
                echo '<a href="#" class="btn btn-primary btn-sm" type="button"><i class="bi bi-plus-lg"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '</td>';
        }
    } ?>
        </tbody>
        </table>
        </body>
</html>