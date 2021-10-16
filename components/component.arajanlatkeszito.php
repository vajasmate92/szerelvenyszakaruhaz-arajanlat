<?php $tablazatTomb = $view -> gyartokLista (); 
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
<fieldset>
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
        </form>
    </div>
</div>
</fieldset>
<div class="row mt-3">
    <div class="col-xl-12 d-grid">
        <button class="btn btn-primary" id="arajanlatLetrehozasGomb">Árajánlat létrehozása</button>
    </div>
</div>