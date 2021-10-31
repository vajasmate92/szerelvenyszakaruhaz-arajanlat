<?php
session_start();
include 'modells/modell.pdoconn.class.php';
include 'modells/modell.admin.class.php';
include 'modells/modell.router.class.php';
include 'view/view.class.php';

$admin = new Admin();
$view = new View();
$router = new AdminSiteRouter();

$termekekTomb = $view->termekekLista();
$dataListGyarto = $view-> gyartokLista ();
$dataListTermekkategoria = $view->termekkategoriak ();
$dataListTermekcsoport = $view->termekcsoportLista ();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}

$page = $_GET['page'] ?? 'administration';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezelői felület</title>
    <?php include 'links/link.bootstrap.css.php'; ?>
    <?php include 'links/link.bootstrapicons.css.php'; ?>
</head>
<?php include 'components/component.navbar.admin.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <h1 class="text-center">Árajánlat adatai</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7">
            <div class="row">
                <p class="mt-3 text-center h1">Termék listája</p>
                <p class="text-center">Ebben a táblázatban található a Szerelvény Szakáruház Kft. által forgalmazott termékek listája</p>
            </div>
            <div class="row">
                <div class="col-xl-2"><button class="btn btn-primary">Szűrés</button></div>
                <div class="col-xl-3">
                <div class="input-group flex-nowrap">
            <span class="input-group-text">Gyártó</span>
            <input list="gyartokDatalist" name="gyarto" class="form-control">
            <datalist id="gyartokDatalist">
            <?php for ($i = 0; $i < count($dataListGyarto); $i++) {
                echo '<option value="' . $dataListGyarto[$i]['gyarto'] . '">';
            } ?>
            </datalist>
</div>
</div>
                <div class="col-xl-4">
                <div class="input-group flex-nowrap">
                <span class="input-group-text" >Termékcsoport</span>
            <input list="termekcsoportDatalist" name="termekcsoport" class="form-control">
            <datalist id="termekcsoportDatalist">
            <?php for ($i = 0; $i < count($dataListTermekcsoport); $i++) {
                echo '<option value="' . $dataListTermekcsoport[$i]['termekcsoport'] . '">';
            } ?>
            </datalist>
</div>
</div>
                <div class="col-xl-3">
                <div class="input-group flex-nowrap">
                <span class="input-group-text">Kategória</span>
            <input list="termekkategoriaDatalist" name="termekkategoria" class="form-control">
            <datalist id="termekkategoriaDatalist">
            <?php for ($i = 0; $i < count($dataListTermekkategoria); $i++) {
                echo '<option value="' . $dataListTermekkategoria[$i]['termekkategoria'] . '">';
            } ?>
            </datalist>
</div>
</div>
        </div>

        <div class="row mt-2">
        <div class="col-xl-2"><p class="h3">Keresés</p></div>
            <div class="col-xl-10">
                <form id="keresesForm">
                    <input type="text" class="form-control" name="kereso" id="kereso">
                </form>
            </div>


        </div>


            <div class="row">
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
    </div>
    </div>
    </div>
    <?php
    include 'links/link.bootstrap.js.php';
    include 'links/link.jquery.script.php';
    include 'scripts/script.keresomezo.js.php';
    ?>
</body>
</html>