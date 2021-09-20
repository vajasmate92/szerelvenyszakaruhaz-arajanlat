<script>

    <?php include 'scripts/script.const.inputfield.js.php'; ?>
            <?php include 'scripts/script.const.hibauzenetablak.js.php'; ?>

    $ ( document ).ready ( () => {
        
    let visszatertErtek;
        let hibakSzama = 0;
            hibaUzenetAblak.hide();

        inputMezok.click( () => {
            hibaUzenetAblak.hide();
                uzenetLista.empty();
                    inputMezok.removeClass("border-danger");
                        hibakSzama = 0;
        })

    inputMezok.click(() => {
        inputMezok.removeClass("border-danger");
            hibaUzenetAblak.hide();
    });

    gomb.click ( () => {
        uzenetLista.empty();
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
        
        if (!hibakSzama == 0) {
            hibaUzenetAblak.show();
        }  else {
                $.ajax({
                    type: "POST",
                        url: "controllers/control.login.php",
                            data: {
                                    email: inputEmail.val(),
                                        jelszo: inputJelszo.val()
                            },
                            dataType: 'json',
                                cache: false,
                                    async: false,
                                        scriptCharset: "UTF-8",
                                            success: function(data) {
                                                if(data == 1) {
                                                    hibaUzenetAblak.show();
                                                    hibaUzenetAblak.show();
                                                    uzenetLista.append("<li>Hibás e-mail cím!</li>");  
                                                    inputEmail.addClass("border-danger");
                                                    $("body").load("controllers/control.login.php");
                                                } else if (data == 2) {
                                                    hibaUzenetAblak.show();
                                                    hibaUzenetAblak.show();
                                                    uzenetLista.append("<li>Hibás jelszó!</li>");  
                                                    inputJelszo.addClass("border-danger");
                                                    $("body").load("controllers/control.login.php");
                                                } else if (data == 3) {
                                                    hibaUzenetAblak.show();
                                                    hibaUzenetAblak.show();
                                                    uzenetLista.append("<li>Ez a felhasználó még nem lett aktiválva!</li>");  
                                                    inputEmail.addClass("border-danger");
                                                    $("body").load("controllers/control.login.php");
                                                }
                    }
                });
            }
    });
    })

    
</script>