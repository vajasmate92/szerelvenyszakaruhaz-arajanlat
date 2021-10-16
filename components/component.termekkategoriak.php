<?php $tablazatTomb = $view -> termekkategoriak (); 
?>
<div class="row mt-3">
    <p class="text-center h1">Termékkategória feltöltése</p>
</div>
<div class="row mt-3">
    <div class="col-xl-10">
        <form id="termekkategoriaUploadForm">
        <input type="text" class="form-control" name="termekkategoria" required>
        </form>
    </div>
        <div class="col-xl-2 d-grid">
            <button class="btn btn-primary" id="termekkategoriaFeltoltesGomb">Feltöltés</button>
        </div>
    </div>

<div class="row">
    
    <p class="mt-3 text-center h1">Termékkategóriák listája</p>
    <p class="text-center">Ebben a táblázatban található a Szerelvény Szakáruház Kft. által forgalmazott termékek kategóriái</p>
</div>
<table class="table table-hover">
    <thead>
            <th class="text-center" scope="col">Termékkategória</th>
            <th class="text-center" scope="col">Termékek száma alatta</th>
            <th class="text-center" scope="col">Műveletek</th>
        </tr>
    </thead>
    <tbody>
    <?php
        echo '<tr>';
        for ( $i = 0 ; $i < count ( $tablazatTomb ) ; $i++ ) {
            if ( $tablazatTomb [ $i ] [ 'allapot' ] == 0 ) {
                echo '<td class="text-center table-danger"><em>' . $tablazatTomb [ $i ] [ 'termekkategoria' ] . '</e></i></span></td>';
            } else if ( $tablazatTomb [ $i ] [ 'allapot' ] == 1 ) {
                echo '<td class="text-center">' . $tablazatTomb [ $i ] [ 'termekkategoria' ] . '</i></span></td>';
            }
            if ( $tablazatTomb [ $i ] [ 'allapot' ] == 0 ) {
                echo '<td class="text-center table-danger">Még ki kell tölteni</td>';
            } else if ( $tablazatTomb [ $i ] [ 'allapot' ] == 1 ) {
                echo '<td class="text-center">Még ki kell tölteni</td>';
            }
            if ( $tablazatTomb [ $i ] [ 'allapot' ] == 0 ) {
                echo '<td class="text-center table-danger">';
                echo '<div class="dropdown">';
                echo '<a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Műveletek</a>';
                echo '<ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">';
                if ( $tablazatTomb [ $i ] [ 'allapot' ] == 0 ) {
                echo '<li><a class="dropdown-item text-success" href="controllers/control.gyartokapcsol.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '&allapot=1">Gyártó élesítése</a></li>';
                echo '<li><a class="dropdown-item text-danger" href="admin.gyarto.torles.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Gyártó törlése</a></li>';
            } else if ( $tablazatTomb [ $i ] [ 'allapot' ] == 1 ) {
                echo '<li><a class="dropdown-item text-primary" href="admin.gyarto.szerkesztes.php?gyarto=' . $tablazatTomb [ $i ] [ 'termekkategoria' ] . '&id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Gyártó szerkesztése</a></li>';
                echo '<li><a class="dropdown-item text-warning" href="controllers/control.gyartokapcsol.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '&allapot=0">Gyártó kikapcsolása</a></li>';
                echo '<li><a class="dropdown-item text-danger" href="admin.gyarto.torles.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Gyártó törlése</a></li>';
            }
            echo '</ul></div></td></tr>';
        } else if ( $tablazatTomb [ $i ] [ 'allapot' ] == 1 ) {
            echo '<td class="text-center">';
            echo '<div class="dropdown">';
            echo '<a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Műveletek</a>';
            echo '<ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">';
            if ( $tablazatTomb [ $i ] [ 'allapot' ] == 0 ) {
            echo '<li><a class="dropdown-item text-success" href="controllers/control.gyartokapcsol.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '&allapot=1">Gyártó élesítése</a></li>';
            echo '<li><a class="dropdown-item text-danger" href="admin.gyarto.torles.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Gyártó törlése</a></li>';
        } else if ( $tablazatTomb [ $i ] [ 'allapot' ] == 1 ) {
            echo '<li><a class="dropdown-item text-primary" href="admin.gyarto.szerkesztes.php?gyarto=' . $tablazatTomb [ $i ] [ 'termekkategoria' ] . '&id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Gyártó szerkesztése</a></li>';
            echo '<li><a class="dropdown-item text-warning" href="controllers/control.gyartokapcsol.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '&allapot=0">Gyártó kikapcsolása</a></li>';
            echo '<li><a class="dropdown-item text-danger" href="admin.gyarto.torles.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Gyártó törlése</a></li>';
        }
        echo '</ul></div></td></tr>';
        }
        }
    ?>
    </div>
    </tbody>
</table>


