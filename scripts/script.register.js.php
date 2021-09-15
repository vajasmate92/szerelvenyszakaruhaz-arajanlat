<script>

    <?php include 'scripts/script.const.hibauzenetablak.js.php'; ?>
        <?php include 'scripts/script.const.inputfield.js.php'; ?>
    
    let visszatertErtek;
        let hibakSzama = 0;
            hibaUzenetAblak.hide();

        inputMezok.click( () => {
            hibaUzenetAblak.hide();
                uzenetLista.empty();
                    inputMezok.removeClass("border-danger");
                        hibakSzama = 0;
        })

        gomb.click ( () => {
            uzenetLista.empty();
            if ( inputNev.val().length <= 0 ) {
                    uzenetLista.append("<li>A név nincs kitöltve!</li>");
                        inputNev.addClass("border-danger");
                            hibakSzama++;
                                event.preventDefault();
                }
                if ( inputEmail.val().length <= 0 ) {
                    uzenetLista.append("<li>Az email cím nincs kitöltve!</li>");
                        inputEmail.addClass("border-danger");
                            hibakSzama++;
                                event.preventDefault();
                    }
                    if ( inputJelszo.val().length <= 0 ) {
                        uzenetLista.append("<li>A jelszó cím nincs kitöltve!</li>");
                            inputJelszo.addClass("border-danger");
                                hibakSzama++;
                                    event.preventDefault();
                        }
                        if ( inputJelszoEllenorzes.val().length <= 0 ) {
                            uzenetLista.append("<li>A jelszó cím nincs kitöltve!</li>");
                                inputJelszoEllenorzes.addClass("border-danger");
                                    hibakSzama++;
                                        event.preventDefault();
                            }
                            if ( inputJelszoEllenorzes.val().length > 0  && inputJelszo.val().length > 0 && inputJelszo.val() != inputJelszoEllenorzes.val() ) {
                                    uzenetLista.append("<li>A két jelszó nem egyezik!</li>");
                                        inputJelszo.addClass("border-danger");
                                            inputJelszoEllenorzes.addClass("border-danger");
                                                hibakSzama++;
                                                    event.preventDefault();
            }

            if (!hibakSzama == 0) {
            hibaUzenetAblak.show();
            } else {
                $.ajax({
                    type: "POST",
                        url: "controllers/control.registration.php",
                            data: {
                                nev: inputNev.val(),
                                    email: inputEmail.val(),
                                        jelszo: inputJelszo.val()
                            },
                                cache: false,
                                    async: false,
                                        scriptCharset: "UTF-8",
                                            success: function(data) {
                                                if(data == 0) {
                                                    hibaUzenetAblak.show();
                                                        hibaUzenetAblak.show();
                                                            uzenetLista.append("<li>Ezzel az e-mail címmel már regisztráltak!</li>");  
                                                                inputEmail.addClass("border-danger");
                                                                    event.preventDefault();
                                                } else {
                                                    $("body").load("components/component.registration.successful.php");
                                                        hibakSzama = 0;
                                                }
                    }
                });
            }
        })
</script>