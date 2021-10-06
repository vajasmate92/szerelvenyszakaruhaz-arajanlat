<?php 
    $view = new View ();
    $felhasznaloAdat = $view -> felhasznaloMezoKitoltes ( $_GET [ 'id' ] );
?>
        <form id="partnerInitForm" class="border border-secondar rounded-3 shadow p-5 bg-light">
            <fieldset>

                <legend class="mt-3">Partner adatai</legend>
            
                <div class="row">

                    <div class="col-xl-6">

                        <label for="partnerNev" class="form-label mt-3">Szerződött Partner neve</label>
                        <input type="text" name="partnerNev" id="partnerNev" class="form-control" value="<?php echo $felhasznaloAdat [ 'nev' ]; ?>" required> 

                    </div>

                    <div class="col-xl-6">

                        <label for="partnerCegNev" class="form-label mt-3">Cégénév</label>
                        <input type="text" name="partnerCegNev" id="partnerCegNev" class="form-control" required>

                    </div>

                </div>
            
                <div class="row">

                    <div class="col-xl-6">

                        <label for="partnerEmail" class="form-label mt-3">Email cím</label>
                        <input type="text" name="partnerEmail" id="partnerEmail" class="form-control" value="<?php echo $felhasznaloAdat [ 'email' ]; ?>" required>

                    </div>
                    
                    <div class="col-xl-2">

                        <label class="form-label mt-3">Telefonszám</label>
                        <input type="text" name="partnerTelefonszamRegioKod" id="partnerTelefonszamRegioKod" class="form-control" value="+36">

                    </div>

                    <div class="col-xl-1">

                        <label class="form-label mt-3"> </label>
                        <input type="text" name="partnerTelefonszamSzolgaltato" id="partnerTelefonszamSzolgaltato" class="form-control text-center" maxlength="2" required>

                    </div>

                    <div class="col-xl-3">

                        <label class="form-label mt-3"> </label>
                        <input type="text" name="partnerTelefonszam" id="partnerTelefonszam" class="form-control" maxlength="7" required>

                    </div>

                </div>
                
                <div class="row">

                    <div class="col-xl-2">

                        <label class="form-label mt-3">Kedvezmény %</label>
                        <input type="text" name="partnerKedvezmeny" id="partnerKedvezmeny" class="form-control" maxlength="2" required>
                        
                    </div>

                    <div class="col-xl-4">

                        <label class="form-label mt-3">Szállítólevél limit Ft</label>
                        <input type="text" name="szallitoLevelLimit" id="szallitoLevelLimit" class="form-control" maxlength="6"  required>

                    </div>

                    <div class="col-xl-2">

                        <input type="hidden" name="partnerID" id="partnerID" class="form-control" value="<?php echo $_GET [ 'id' ] ?>" required>

                    </div>

                    <div class="col-xl-2">

                        <input type="hidden" name="adminID" id="adminID" class="form-control" value="<?php echo $_SESSION [ 'id' ] ?>" required>

                    </div>

                </div>

            </fieldset>

            <fieldset>
                <legend class="mt-3">Adószám</legend>
            <div class="row">
                <div class="col-xl-8">
                    <label for="adoszamTorzsszam" class="form-label mt-3">Törzsszám</label>
                    <input type="text" name="adoszamTorzsszam" id="adoszamTorzsszam" class="form-control" maxlength="8" required>
                </div>
                <div class="col-xl-2">
                <label for="adoszamAFAKod" class="form-label mt-3">ÁFA kód</label>
                    <input type="text" name="adoszamAFAKod" id="adoszamAFAKod" class="form-control text-center" maxlength="1 required">
            </div>
                <div class="col-xl-2">
                <label for="adoszamTeruleti kod" class="form-label mt-3">Területi kód</label>
                    <input type="text" name="adoszamTeruletiKod" id="adoszamTeruletiKod" class="form-control text-center" maxlength="2" required>
            </div>
            </div>
            </fieldset>

            <fieldset>
                <legend class="mt-3">Cég címe</legend>
                <div class="row">
                    <div class="col-2">
                        <label for="partnerCegIrsz" class="form-label mt-3">Irányítószám</label>
                        <input type="text" name="partnerCegIrsz" id="partnerCegIrsz" class="form-control" maxlength="4" required>
                    </div>
                    <div class="col-4">
                        <label for="partnerCegVaros" class="form-label mt-3">Város</label>
                        <input type="text" name="partnerCegVaros" id="partnerCegVaros" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label for="partnerCegCim" class="form-label mt-3">Cím</label>
                        <input type="text" name="partnerCegCim" id="partnerCegCim" class="form-control" required>
                    </div>
                </fieldset>
            </form>
            <div class="row">
                <div class="col-xl-6 d-grid">
                    <button class="btn btn-primary my-2" id="jovahagyasGomb">Partner regisztrálciójának jóváhagyása</button>
                </div>
                <div class="col-xl-6 d-grid">
                    <button class="btn btn-danger my-2" id="elutasitasGomb">Partner regisztrálciójának elutasítása</button>
                </div>
            </div>
            </div>