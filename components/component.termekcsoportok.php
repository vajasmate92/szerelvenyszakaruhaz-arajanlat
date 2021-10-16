<?php
    $dataListGyarto = $view -> gyartokLista (); 
    $tablazatTombGyartokEsTermekcsoportok = $view -> gyartoLekerdezeseTermekcsoportAlapjan ();
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
                        for ( $i = 0 ; $i < count ( $dataListGyarto ); $i++ ) {
                           echo '<option value="' . $dataListGyarto [ $i ] [ 'gyarto' ] . '">';
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
    <?php
        for ( $i = 0 ; $i < count ( $tablazatTombGyartokEsTermekcsoportok ) ; $i++ ) {
            echo '<tr>';
            if( $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'allapot' ] == 1 ) {
                echo '<td class="text-center position-relative">' . $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'termekcsoport' ] . '</i></span></td>';
            }
            else if ( $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'allapot' ] == 0 ) {
                    echo '<td class="text-center position-relative table-danger"><em>' . $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'termekcsoport' ] . '</em></i></span></td>';
            }
            if( $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'allapot' ] == 1 ) {
                echo '<td class="text-center position-relative">' . $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'gyarto' ] . '</i></span></td>';
            }
            else if ( $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'allapot' ] == 0 ) {
                    echo '<td class="text-center position-relative table-danger"><em>' . $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'gyarto' ] . '</em></i></span></td>';
            }
            if( $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'allapot' ] == 1 ) {
                echo '<td class="text-center">Még ki kell tölteni</td>';
            }
            else if ( $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'allapot' ] == 0 ) {
                    echo '<td class="text-center position-relative table-danger"><em>Még ki kell tölteni</em></i></span></td>';
            }
            if( $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'allapot' ] == 1 ) {
                echo '<td class="text-center">';
                echo '<div class="dropdown">';
                echo '<a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Műveletek</a>';
                echo '<ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">';
                echo '<li><a class="dropdown-item text-warning" href="controllers/control.termekcsoportkapcsol.php?id=' . $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'pk_id' ] . '&allapot=0">Termékcsoport kikapcsolása</a></li>';
                echo '<li><a class="dropdown-item text-danger" href="controllers/control.termekcsoporttorol.php?id=' . $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'pk_id' ] . '">Termékcsoport törlése</a></li>';
                echo '</ul></div></td></tr>';
            }
            else if ( $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'allapot' ] == 0 ) {
                echo '<td class="text-center table-danger">';
                echo '<div class="dropdown">';
                echo '<a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Műveletek</a>';
                echo '<ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">';
                echo '<li><a class="dropdown-item text-success" href="controllers/control.termekcsoportkapcsol.php?id=' . $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'pk_id' ] . '&allapot=1">Termékcsoport bekapcsolása</a></li>';
                echo '<li><a class="dropdown-item text-danger" href="controllers/control.termekcsoporttorol.php?id=' . $tablazatTombGyartokEsTermekcsoportok [ $i ] [ 'pk_id' ] . '">Termékcsoport törlése</a></li>';
                echo '</ul></div></td></tr>';
            }

            }
    ?>
    </div>
    </tbody>
</table>


