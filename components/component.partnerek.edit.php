<?php 
    $view = new View ();
    $felhasznaloAdat = $view -> felhasznaloMezoKitoltes ( $_GET [ 'id' ] );
        $partnerAdat = $view -> partnerMezoKitoltes ( $_GET [ 'id' ] );
?>
        <form id="partnerEditForm" class="border border-secondar rounded-3 shadow p-5 bg-light">
            <fieldset>

                <legend class="mt-3">Partner adatai</legend>
            
                <div class="row">

                    <div class="col-xl-6">

                        <label for="partnerNev" class="form-label mt-3">Szerződött Partner neve</label>
                        <input type="text" name="partnerNev" id="partnerNev" class="form-control" value="<?php echo $felhasznaloAdat [ 'nev' ]; ?>" required> 

                    </div>

                    <div class="col-xl-6">

                        <label for="partnerCegNev" class="form-label mt-3">Cégénév</label>
                        <input type="text" name="partnerCegNev" id="partnerCegNev" class="form-control" value="<?php echo $partnerAdat [ 'ceg_nev' ]; ?>" required>

                    </div>

                </div>
            
                <div class="row">

                    <div class="col-xl-6">

                        <label for="partnerEmail" class="form-label mt-3">Email cím</label>
                        <input type="text" name="partnerEmail" id="partnerEmail" class="form-control" value="<?php echo $felhasznaloAdat [ 'email' ]; ?>" required>

                    </div>
                    
                    <div class="col-xl-6">

                        <label class="form-label mt-3">Telefonszám</label>
                        <input type="text" name="partnerTelefonszam" id="partnerTelefonszam" class="form-control" value="<?php echo $partnerAdat [ 'ceg_telefonszam' ]; ?>" required>

                    </div>

                </div>
                
                <div class="row">

                    <div class="col-xl-2">

                        <label class="form-label mt-3">Kedvezmény %</label>
                        <input type="text" name="partnerKedvezmeny" id="partnerKedvezmeny" class="form-control" maxlength="2" value="<?php echo $partnerAdat [ 'ceg_kedvezmeny_merteke' ]; ?>" required>
                        
                    </div>

                    <div class="col-xl-4">

                        <label class="form-label mt-3">Szállítólevél limit Ft</label>
                        <input type="text" name="szallitoLevelLimit" id="szallitoLevelLimit" class="form-control" maxlength="6" value="<?php echo $partnerAdat [ 'ceg_szallitolevel_limit' ]; ?>"  required>

                    </div>

                    <div class="col-xl-6">
                    <label class="form-label mt-3">Adószám</label>
                    <input type="text" name="adoszam" id="adoszam" class="form-control" maxlength="8" value="<?php echo $partnerAdat [ 'ceg_cim_adoszam' ]; ?>" required>
                    </div>
                </div>
            </fieldset>
            
            
            <div class="row">
                <div class="col-xl-6">
                    <input type="hidden" name="partnerID" id="partnerID" class="form-control" value="<?php echo $_GET [ 'id' ] ?>" required>
                </div>
                <div class="col-xl-6">
                    <input type="hidden" name="adminID" id="adminID" class="form-control" value="<?php echo $_SESSION [ 'id' ] [ 'pk_id' ] ?>" required>
                </div>
            </div>


            <fieldset>
                <legend class="mt-3">Cég címe</legend>
                <div class="row">
                    <div class="col-2">
                        <label for="partnerCegIrsz" class="form-label mt-3">Irányítószám</label>
                        <input type="text" name="partnerCegIrsz" id="partnerCegIrsz" class="form-control" maxlength="4" value="<?php echo $partnerAdat [ 'ceg_cim_irsz' ]; ?>" required >
                    </div>
                    <div class="col-4">
                        <label for="partnerCegVaros" class="form-label mt-3">Város</label>
                        <input type="text" name="partnerCegVaros" id="partnerCegVaros" class="form-control" value="<?php echo $partnerAdat [ 'ceg_cim_varos' ]; ?>" required>
                    </div>
                    <div class="col-6">
                        <label for="partnerCegCim" class="form-label mt-3">Cím</label>
                        <input type="text" name="partnerCegCim" id="partnerCegCim" class="form-control" value="<?php echo $partnerAdat [ 'ceg_cim_utca_hazszam' ]; ?>" required>
                    </div>
                </fieldset>
            </form>
            <div class="row">
                <div class="col-xl-12 d-grid">
                    <button class="btn btn-primary my-2" id="partnerSzerkesztesGomb">Partner szerkesztése</button>
                </div>
            </div>
            </div>