<?php
include '../modells/modell.pdoconn.class.php';
include '../view/view.class.php';

$kereses = new View ();

if ( empty ( $_POST [ 'kereso' ] ) ) {

    $termekekTomb = $kereses -> termekekLista ();
        
}

      if ( !empty ( $_POST [ 'kereso' ] ) && isset ( $_POST [ 'kereso' ] ) ) {

    $termekekTomb = $kereses -> kereses ( $_POST [ 'kereso' ] );
}

for ($i = 0; $i < count($termekekTomb); $i++) {
    echo '<tr>';
    if ($termekekTomb[$i]['allapot'] == 1) {
        echo '<td class="text-center"><code>' .
            $termekekTomb[$i]['cikkszam'] .
            '</code></td>';
        echo '<td class="text-center">' .
            $termekekTomb[$i]['gyarto'] .
            '</td>';
        echo '<td class="text-center position-relative">' .
            $termekekTomb[$i]['termekcsoport'] .
            '</td>';
        echo '<td class="text-center">' .
            $termekekTomb[$i]['termekkategoria'] .
            '</td>';
        echo '<td class="text-center">' .
            $termekekTomb[$i]['termeknev'] .
            '</td>';
        echo '<td class="text-center">' .
            $termekekTomb[$i]['ar'] .
            ',- Ft</td>';
            echo '<td>';
            echo '<div class="row">';
            echo '<div class="col-xl-6">';
            echo '<input type="number" class="form-control form-control-sm" name="'.$termekekTomb[$i]['pk_id'].'" min="0">';
            echo '</div>';
            echo '<div class="col-xl-6">';
            echo '<a href="#" class="btn btn-primary btn-sm" type="button"><i class="bi bi-plus-lg"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '</td>';
    }
}
