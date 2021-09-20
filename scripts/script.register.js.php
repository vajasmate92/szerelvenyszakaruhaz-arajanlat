<script>

    $( document ).ready ( () => {
    <?php include 'scripts/script.const.hibauzenetablak.js.php'; ?>
        <?php include 'scripts/script.const.inputfield.js.php'; ?>
        
  

    
            hibaUzenetAblak.hide();
    let hiba = false;

        inputMezok.click( () => {
            hibaUzenetAblak.hide();
                uzenetLista.empty();
                    inputMezok.removeClass("border-danger");
                        hiba = false;
        })

        gomb.click ( (event) => {
            event.preventDefault();
            uzenetLista.empty();
            if ( inputNev.val().length <= 0 ) {
                    uzenetLista.append("<li>A név nincs kitöltve!</li>");
                        inputNev.addClass("border-danger");
                            hiba = true;
                }
                if ( inputEmail.val().length <= 0 ) {
                    uzenetLista.append("<li>Az email cím nincs kitöltve!</li>");
                        inputEmail.addClass("border-danger");
                            hiba = true;
                    }
                    if ( inputJelszo.val().length <= 0 ) {
                        uzenetLista.append("<li>A jelszó cím nincs kitöltve!</li>");
                            inputJelszo.addClass("border-danger");
                                hiba = true;
                        }
                        if ( inputJelszoEllenorzes.val().length <= 0 ) {
                            uzenetLista.append("<li>A jelszó cím nincs kitöltve!</li>");
                                inputJelszoEllenorzes.addClass("border-danger");
                                    hiba = true;
                            }
                            if ( inputJelszoEllenorzes.val().length > 0  && inputJelszo.val().length > 0 && inputJelszo.val() != inputJelszoEllenorzes.val() ) {
                                    uzenetLista.append("<li>A két jelszó nem egyezik!</li>");
                                        inputJelszo.addClass("border-danger");
                                            inputJelszoEllenorzes.addClass("border-danger");
                                                hiba = true;
                            }

            if ( hiba ) {
            hibaUzenetAblak.show();
            }
            if ( !hiba ) {
                var regisztraciosAdatok = $( 'form#registracioForm' ).serialize();
                console.log ( regisztraciosAdatok );
                $.post( 'controllers/control.registration.php', regisztraciosAdatok, ( data ) => { 
                    if ( data == 'Ezzel az e-mail címmel már regisztráltak!' ) {
                        uzenetLista.append("<li>Ezzel az e-mail címmel már regisztráltak!</li>");
                            inputEmail.addClass("border-danger");
                                hibaUzenetAblak.show();
                                    hiba = true;
                    }
                    if ( data == 'Fogadtuk a regisztrációs kérelmed!' ) {
                        myModal.show();
                    }
                 } );
            }
        } ) ;
    })
</script>