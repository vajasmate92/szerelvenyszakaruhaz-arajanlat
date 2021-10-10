<?php
    $listaFeltolteseTermekcsoporttal = $view -> gyartoLekerdezeseTermekcsoportAlapjan ();
?>
<fieldset>
    <div class="row border border-secondar rounded-3 shadow p-5 bg-light">
        <legend class="mt-3">Gyártó adata</legend>
        
        <div class="col-xl-12">
                        <form id="gyartoEditForm">
                        <label for="partnerNev" class="form-label mt-3">Gyártó neve</label>
                        <input type="text" name="gyarto" id="gyarto" class="form-control" value="<?php echo $_GET [ 'gyarto' ]; ?>" required> 
                        <input type="hidden" name="gyartoID" id="gyartoID" class="form-control" value="<?php echo $_GET [ 'id' ] ?>" required>
                    </form>
                        <button class="btn btn-primary my-2" id="gyartoModositGomb">Gyártó módosítása</button>
                    </div>
                    <div class="row">
                        <legend class="mt-3">Gyártóhoz tartozó termékcsoportok</legend>
                        <div class="col-xl-12">
                            <form action="" id="gyartoTermekcsoportModositForm">

                                <?php
for ( $i = 0 ; $i < count ( $listaFeltolteseTermekcsoporttal ) ; $i++ ) {
    if ( $listaFeltolteseTermekcsoporttal [ $i ] [ 'gyarto' ] == $_GET [ 'gyarto' ] ) {
        if ( $listaFeltolteseTermekcsoporttal [ $i ] [ 'allapot' ] == 1 ) {
            echo '<div class="input-group mb-3">';
            echo '<input type="text" class="form-control" disabled value="' . $listaFeltolteseTermekcsoporttal [ $i ] [ 'termekcsoport' ] . '" name="' . $listaFeltolteseTermekcsoporttal [ $i ] [ 'termekcsoport' ] . '">';
            echo '<button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown">Hozzárendelve</button>';
            echo '<ul class="dropdown-menu dropdown-menu-end">';
            echo '<li><a class="dropdown-item text-success" href="controllers/control.gyartotermekcsoport.php?termekcsoport=' . $listaFeltolteseTermekcsoporttal [ $i ] [ 'termekcsoport' ] . '&allapot=1">Hozzárendelés</a></li>';
            echo '<li><a class="dropdown-item text-danger" href="controllers/control.gyartotermekcsoport.php?termekcsoport=' . $listaFeltolteseTermekcsoporttal [ $i ] [ 'termekcsoport' ] . '&allapot=0">Kikapcsolás</a></li>';
            echo '</ul>';
            echo '</div>';
        } else if ( $listaFeltolteseTermekcsoporttal [ $i ] [ 'allapot' ] == 0 ) {
            echo '<div class="input-group mb-3">';
            echo '<input type="text" class="form-control" disabled value="' . $listaFeltolteseTermekcsoporttal [ $i ] [ 'termekcsoport' ] . '" name="' . $listaFeltolteseTermekcsoporttal [ $i ] [ 'termekcsoport' ] . '">';
            echo '<button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown">Kikapcsolva</button>';
            echo '<ul class="dropdown-menu dropdown-menu-end">';
            echo '<li><a class="dropdown-item text-success" href="controllers/control.gyartotermekcsoport.php?termekcsoport=' . $listaFeltolteseTermekcsoporttal [ $i ] [ 'termekcsoport' ] . '&allapot=1">Hozzárendelés</a></li>';
            echo '<li><a class="dropdown-item text-danger" href="controllers/control.gyartotermekcsoport.php?termekcsoport=' . $listaFeltolteseTermekcsoporttal [ $i ] [ 'termekcsoport' ] . '&allapot=0">Kikapcsolás</a></li>';
            echo '</ul>';
            echo '</div>';
        }
    }
}
?>
</form>
</div>
</div>
</fieldset>
