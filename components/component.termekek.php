<?php
$termekekTomb = $view-> termekekLista ();
$dataListGyarto = $view-> gyartokLista ();
$dataListTermekkategoria = $view->termekkategoriak ();
$dataListTermekcsoport = $view->termekcsoportLista ();
$tablazatTombGyartokEsTermekcsoportok = $view->gyartoLekerdezeseTermekcsoportAlapjan();
?>
<div class="row mt-3">
    <p class="text-center h1">Termék feltöltése</p>
</div>
<div class="row mt-3">
    <div class="col-xl-4">
    <form id="termekUploadForm">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Gyártó</span>
            <input list="gyartokDatalist" name="gyarto" class="form-control" required>
            <datalist id="gyartokDatalist">
            <?php for ($i = 0; $i < count($dataListGyarto); $i++) {
                echo '<option value="' . $dataListGyarto[$i]['gyarto'] . '">';
            } ?>
            </datalist>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Termékcsoport</span>
            <input list="termekcsoportDatalist" name="termekcsoport" class="form-control" required>
            <datalist id="termekcsoportDatalist">
            <?php for ($i = 0; $i < count($dataListTermekcsoport); $i++) {
                echo '<option value="' . $dataListTermekcsoport[$i]['termekcsoport'] . '">';
            } ?>
            </datalist>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Kategória</span>
            <input list="termekkategoriaDatalist" name="termekkategoria" class="form-control" required>
            <datalist id="termekkategoriaDatalist">
            <?php for ($i = 0; $i < count($dataListTermekkategoria); $i++) {
                echo '<option value="' . $dataListTermekkategoria[$i]['termekkategoria'] . '">';
            } ?>
            </datalist>
        </div>
    </div>
    </div>
    <div class="row mt-3">
    <div class="col-xl-12">
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Termék</span>
            <input type="text" class="form-control " name="termek" required>
            </div>
    </div>
</div>
<div class="row mt-3">
<div class="col-xl-5">
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Cikkszám</span>
            <input type="text" class="form-control " name="cikkszam" required>
            </div>
    </div>
    <div class="col-xl-3">
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Ár</span>
            <input type="number" class="form-control " name="ar" required>
            </form>
            </div>
    </div>
<div class="col-xl-2 d-grid">
            <button class="btn btn-primary" id="termekFeltoltesGomb">Feltöltés</button>
        </div>
        <div class="col-xl-2 d-grid">
  <input class="form-control" type="file" id="termekCSV" accept=".csv">
</div>
</div>
<div class="row">
    
    <p class="mt-3 text-center h1">Termék listája</p>
    <p class="text-center">Ebben a táblázatban található a Szerelvény Szakáruház Kft. által forgalmazott termékek listája</p>
</div>
<table class="table table-hover">
    <thead>
            <th class="text-center" scope="col">Cikkszám</th>
            <th class="text-center" scope="col">Gyártó</th>
            <th class="text-center" scope="col">Termékcsoport</th>
            <th class="text-center" scope="col">Kategória</th>
            <th class="text-center" scope="col">Termék</th>
            <th class="text-center" scope="col">Ár</th>
            <th class="text-center" scope="col">Műveletek</th>
        </tr>
    </thead>
    <tbody>
    <?php for (
        $i = 0;
        $i < count($termekekTomb);
        $i++
    ) {
        echo '<tr>';
        if ($termekekTomb[$i]['allapot'] == 1) {
            echo '<td class="text-center"><code>' .
                $termekekTomb[$i]['cikkszam'] .
                '</code></td>';
        } elseif ($termekekTomb[$i]['allapot'] == 0) {
            echo '<td class="text-center table-danger"><em><code>' .
                $termekekTomb[$i]['cikkszam'] .
                '</code></em></td>';
        }
        if ($termekekTomb[$i]['allapot'] == 1) {
            echo '<td class="text-center">' .
                $termekekTomb[$i]['gyarto'] .
                '</td>';
        } elseif ($termekekTomb[$i]['allapot'] == 0) {
            echo '<td class="text-center table-danger"><em>' .
                $termekekTomb[$i]['gyarto'] .
                '</em></td>';
        }
        if ($termekekTomb[$i]['allapot'] == 1) {
            echo '<td class="text-center position-relative">' .
                $termekekTomb[$i]['termekcsoport'] .
                '</td>';
        } elseif ($termekekTomb[$i]['allapot'] == 0) {
            echo '<td class="text-center position-relative table-danger"><em>' .
                $termekekTomb[$i]['termekcsoport'] .
                '</em></td>';
        }
        if ($termekekTomb[$i]['allapot'] == 1) {
            echo '<td class="text-center">' .  $termekekTomb[$i]['termekkategoria'] . '</td>';
        } elseif ($termekekTomb[$i]['allapot'] == 0) {
            echo '<td class="text-center position-relative table-danger"><em>' .  $termekekTomb[$i]['termekkategoria'] . '</em></td>';
        }
        if ($termekekTomb[$i]['allapot'] == 1) {
            echo '<td class="text-center">' .  $termekekTomb[$i]['termeknev'] . '</td>';
        } elseif ($termekekTomb[$i]['allapot'] == 0) {
            echo '<td class="text-center position-relative table-danger"><em>' .  $termekekTomb[$i]['termeknev'] . '</em></td>';
        }
        if ($termekekTomb[$i]['allapot'] == 1) {
            echo '<td class="text-center">' .  $termekekTomb[$i]['ar'] . ',- Ft</td>';
        } elseif ($termekekTomb[$i]['allapot'] == 0) {
            echo '<td class="text-center position-relative table-danger"><em>' .  $termekekTomb[$i]['ar'] . ',- Ft</em></td>';
        }
        if ($termekekTomb[$i]['allapot'] == 1) {
            echo '<td class="text-center">';
            echo '<div class="dropdown">';
            echo '<a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Műveletek</a>';
            echo '<ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">';
            echo '<li><a class="dropdown-item text-warning" href="controllers/control.termekcsoportkapcsol.php?id=' .
                $termekekTomb[$i]['pk_id'] .
                '&allapot=0">Termék kikapcsolása</a></li>';
            echo '<li><a class="dropdown-item text-danger" href="controllers/control.termekcsoporttorol.php?id=' .
                $termekekTomb[$i]['pk_id'] .
                '">Termék törlése</a></li>';
            echo '</ul></div></td></tr>';
        } elseif ($termekekTomb[$i]['allapot'] == 0) {
            echo '<td class="text-center table-danger">';
            echo '<div class="dropdown">';
            echo '<a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Műveletek</a>';
            echo '<ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">';
            echo '<li><a class="dropdown-item text-success" href="controllers/control.termekcsoportkapcsol.php?id=' .
                $termekekTomb[$i]['pk_id'] .
                '&allapot=1">Termék bekapcsolása</a></li>';
            echo '<li><a class="dropdown-item text-danger" href="controllers/control.termekcsoporttorol.php?id=' .
                $termekekTomb[$i]['pk_id'] .
                '">Termék törlése</a></li>';
            echo '</ul></div></td></tr>';
        }
    } ?>
    </div>
    </tbody>
</table>


