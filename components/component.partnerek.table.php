 <?php $tablazatTomb = $admin -> fillTableWithRegisteredUsers (); ?>

<div class="row">
    <h1 class="mt-3 text-center">Szerződött partnereink</h1>
    <p class="text-center">Ebben a táblázatban található a Szerelvény Szakáruház Kft. árajánlat készítő programának regisztrált és regisztrálni kívánt partnerei</p>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th class="text-center" scope="col">Név</th>
      <th class="text-center" scope="col">E-mail cím</th>
      <th class="text-center" scope="col">Állapot</th>
      <th class="text-center" scope="col">Műveletek</th>
    </tr>
  </thead>
  <tbody>
<?php 
for ( $i = 0 ; $i < count ( $tablazatTomb ) ; $i++ ) {
    if ( $tablazatTomb [ $i ] [ 'jogosultsag' ] == 0 ) {
        echo '<tr>';
            echo '<td class="text-center">' . $tablazatTomb [ $i ] [ 'nev' ] . '</td>';
                echo '<td class="text-center">' . $tablazatTomb [ $i ] [ 'email' ] . '</td>';
        if ( $tablazatTomb [ $i ] [ 'allapot' ] == 0 ) {
            echo '<td class="text-danger text-center">' . 'Nincs aktiválva' . '</td>'; 
        } else if ($tablazatTomb [ $i ] [ 'allapot' ] == 1) {
            echo '<td class="text-success text-center">' . 'Aktiválva' . '</td>'; 
        }
        echo '<td class="text-center">';
        echo '<div class="dropdown">';
        echo '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Műveletek</a>';
        echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
        if ( $tablazatTomb [ $i ] [ 'allapot' ] == 0 ) {
            echo '<li><a class="dropdown-item" href="admin.partnerek.elesites.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '">Partner élesítése</a></li>';
        } else if ( $tablazatTomb [ $i ] [ 'allapot' ] == 1 ) {
            echo '<li><a class="dropdown-item" href="admin.partnerek.szerkeszt.php?id=' . $tablazatTomb [ $i ] [ 'pk_id' ] . '"">Partner szerkesztése</a></li>';
            echo '<li><a class="dropdown-item text-danger" href="#">Partner törlése</a></li>';
        }
        echo '</ul></div></td></tr>';
    }
}
    ?>

  </tbody>
</table>