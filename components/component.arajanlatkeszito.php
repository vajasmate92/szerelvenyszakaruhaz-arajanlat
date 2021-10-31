<?php 
$tablazatTomb = $view -> gyartokLista (); 
$partnerID = $partner -> partnerIDLeker ( $_SESSION [ 'id' ] [ 'pk_id' ] );
$arajanlatTomb = $view -> arajanlatokMegjelenit ( $partnerID ); 
?>
<div class="row mt-3">
    <p class="text-center h1">Árajánlat létrehozása</p>
</div>

<div class="row mt-3">
    <div class="col-xl-6">
        <form id="arajanlatUploadForm">
        <label for="arajanlatNev" class="form-label">Árajánlat neve</label>
        <input type="text" class="form-control" id="arajanlatNev" name="arajanlatNev" required>
    </div>
    <div class="col-xl-6">
        <label for="arajanlatCimzettNev" class="form-label">Árajánlat címzettjének neve</label>
        <input type="text" class="form-control" id="arajanlatCimzettNev" name="arajanlatCimzettNev" required>
    </div>
</div>
<div class="row mt-3">
<div class="col-xl-2">
        <label for="arajanlatCimzettIrsz" class="form-label">Irányítószám</label>
        <input type="text" class="form-control" id="arajanlatCimzettIrsz" name="arajanlatCimzettIrsz" required>
    </div>
<div class="col-xl-4">
        <label for="arajanlatCimzettVaros" class="form-label">Város</label>
        <input type="text" class="form-control" id="arajanlatCimzettVaros" name="arajanlatCimzettVaros" required>
    </div>
<div class="col-xl-6">
        <label for="arajanlatCimzettCimUtcaHazszam" class="form-label">Cím</label>
        <input type="text" class="form-control" id="arajanlatCimzettCimUtcaHazszam" name="arajanlatCimzettCimUtcaHazszam" required>
    </div>
</div>
<div class="row mt-3">
    <div class="col-xl-12 d-grid">
        </form>
        <button class="btn btn-primary" id="arajanlatLetrehozasGomb">Árajánlat létrehozása</button>
    </div>
</div>

<div class="row mt-3">
    <?php
    for ( $i = 0 ; $i < count ( $arajanlatTomb ) ; $i++ ) {
echo '<div class="card m-2 bg-';
if ( $arajanlatTomb [ $i ] [ "allapot" ] == 1) { echo 'bg-light'; }
else if ( $arajanlatTomb [ $i ] [ "allapot" ] == 0 ) { echo 'danger'; }
else if ( $arajanlatTomb [ $i ] [ "allapot" ] == 2 ) { echo 'warning'; }
else if ( $arajanlatTomb [ $i ] [ "allapot" ] == 3 ) { echo 'success'; }
echo '" style="width: 18rem;">';
echo  '<div class="card-body">';
echo    '<h5 class="card-title text-truncate">' . $arajanlatTomb [ $i ] [ "arajanlat_nev" ] . '</h5>';
echo    '<h6 class="card-subtitle mb-2 text-truncate">Címzett: ' . $arajanlatTomb [ $i ] [ "arajanlat_cimzett_nev" ] . '</h6>';
echo  '<p class="card-text text-truncate">' . $arajanlatTomb [ $i ] [ "arajanlat_cimzett_irsz" ] . ', ' . $arajanlatTomb [ $i ] [ "arajanlat_cimzett_varos" ] . '</p>';
echo  '<p class="card-text text-truncate">' . $arajanlatTomb [ $i ] [ "arajanlat_cimzett_cim_utca_hazszam" ] . '</p>';
echo '</ul>';
echo '<div class="btn-group">';
echo '<a href="arajanlat.php?arajanlatTabla=' . $arajanlatTomb [ $i ] [ 'arajanlat_tabla' ] . '" class="btn btn-dark text-primary">Szerkeszt</a>';
echo '<button type="button" class="btn btn-dark text-danger">Töröl</button>';
echo '<div class="btn-group">';
echo '<button id="arajanlatAllapot" type="button" class="btn btn-dark dropdown-toggle text-warning" data-bs-toggle="dropdown">';
echo 'Állapot';
echo '</button>';
echo '<ul class="dropdown-menu bg-dark" aria-labelledby="arajanlatAllapot">';
echo '<li><a class="dropdown-item text-warning" href="#">Függőben</a></li>';
echo '<li><a class="dropdown-item text-success" href="#">Elfogadott</a></li>';
echo '<li><a class="dropdown-item text-danger" href="#">Elutasított</a></li>';
echo '</ul>';
echo '</div>';
echo '</div>';
echo '<div class="btn-group mt-2">';
echo '<a class="btn btn-dark text-info">Megtekint</a>';
echo '<a class="btn btn-dark text-info">Nyomtatás <i class="bi bi-printer-fill"></i></a>';
echo  '</div>';
echo  '</div>';
echo'</div>';
}?>
</div>

