<?php
    $tablazatTombTermekcsoportok = $view -> tablaFeltolteseTermekcsoportokkal (); 
    $tablazatTombGyartok = $view -> tablaFeltolteseGyartokkal (); 
?>
<div class="row mt-3">
    <p class="text-center h1">Termékcsoport feltöltése</p>
</div>
<div class="row mt-3">
    <div class="col-xl-6">
        <form id="termekcsoportUploadForm">
        <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Termékcsoport</span>
        <input type="text" class="form-control " name="termekcsoport" required>
    </div>
    </div>
        <div class="col-xl-4">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Gyártó</span>
                <input list="gyartokDatalist" name="gyarto" class="form-control" required>
                    <datalist id="gyartokDatalist">
                        <?php
                        for ( $i = 0 ; $i < count ( $tablazatTombGyartok ); $i++ ) {
                           echo '<option value="' . $tablazatTombGyartok [ $i ] [ 'gyarto' ] . '">';
                        }
                        ?>
                    </datalist>
            </div>

</div>
        </form>
        <div class="col-xl-2 d-grid">
            <button class="btn btn-primary" id="termekcsoportFeltoltesGomb">Feltöltés</button>
        </div>
    </div>

<div class="row">
    
    <p class="mt-3 text-center h1">Termékcsoportok listája</p>
    <p class="text-center">Ebben a táblázatban található a Szerelvény Szakáruház Kft. által forgalmazott gyártók termékcsoportjainak listája</p>
</div>
<table class="table table-hover">
    <thead>
            <th class="text-center" scope="col">Termékcsoport</th>
            <th class="text-center" scope="col">Termékcsoporthoz tartozó gyártó</th>
            <th class="text-center" scope="col">Termékcsoport alá besorolt termékek száma</th>
            <th class="text-center" scope="col">Műveletek</th>
        </tr>
    </thead>
    <tbody>
    <!-- <?php
        echo '<tr>';
        for ( $i = 0 ; $i < count ( $tablazatTomb ) ; $i++ ) {
            echo '<td class="text-center position-relative">' . $tablazatTomb [ $i ] [ 'termekcsoport' ] . '</i></span></td>';
            if ( $tablazatTomb [ $i ] [ 'allapot' ] == 0 ) {
                echo '<td class="text-center">Nincs aktiválva</td>';
            } else if ( $tablazatTomb [ $i ] [ 'allapot' ] == 1 ) {
                echo '<td class="text-center">Aktiválva</td>';
            }
            echo '<td class="text-center">Még ki kell tölteni</td>';
            echo '<td class="text-center">';
            echo '<div class="dropdown">';
            echo '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Műveletek</a>';
            echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
            if ( $tablazatTomb [ $i ] [ 'allapot' ] == 0 ) {
                echo '<li><a class="dropdown-item" href="admin.gyarto.elesit.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Gyártó élesítése</a></li>';
            } else if ( $tablazatTomb [ $i ] [ 'allapot' ] == 1 ) {
                echo '<li><a class="dropdown-item gyartoSzerkesztes" href="admin.gyarto.szerkesztes.php?gyarto=' . $tablazatTomb [ $i ] [ 'gyarto' ] . '&id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Gyártó szerkesztése</a></li>';
                echo '<li><a class="dropdown-item text-danger" href="admin.gyarto.torles.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Gyártó Törlése</a></li>';
            }
            echo '</ul></div></td></tr>';
        }
    ?> -->
    </div>
    </tbody>
</table>


