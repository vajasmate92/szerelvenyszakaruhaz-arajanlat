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
                        <button class="btn btn-warning my-2" id="gyartoFelfuggesztGomb">Gyártó felfüggesztése</button>
                    </div>
                    <div class="row">
                        <legend class="mt-3">Gyártóhoz tartozó termékcsoportok</legend>
                        <!-- Ideiglenes csak, amíg nincs kész a termékcsoport felvétel -->
                        <div class="col-xl-12">
                            <div class="list-group">
                                <label class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="1">
                                    First checkbox
                                </label>
                                <label class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="2">
                                    Second checkbox
                                </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" type="checkbox" value="3">
        Third checkbox
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" type="checkbox" value="4">
        Fourth checkbox
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" type="checkbox" value="5">
        Fifth checkbox
    </label>
    
</div>
</form>
</div>
</div>
</fieldset>
