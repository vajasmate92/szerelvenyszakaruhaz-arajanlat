<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="">Üdvözlöm, <?php echo $admin -> getAdministratorName ( $_SESSION [ 'id' ] [ 'pk_id' ] ); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if ( $_SESSION [ 'id' ] [ 'jogosultsag' ] == 1 ) {
echo '<div class="collapse navbar-collapse" id="navbarTogglerDemo02">';
echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
echo '<li class="nav-item">';
echo '<a class="nav-link text-dark" href="?page=arajanlatok">Árajánlatok <i class="bi bi-file-earmark"></i></a>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link text-dark" href="?page=partnerek">Szerződött partnerek <i class="bi bi-person"></i></a>';
echo '</li>';
echo '<li class="nav-item dropdown">';
echo '<a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
echo 'Termékekkel kapcsolatos műveletek<i class="bi bi-box-seam"></i>';
echo '</a>';
echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
echo '<li><a class="dropdown-item text-dark" href="?page=gyartok">Gyártók</a></li>';
echo '<li><a class="dropdown-item text-dark" href="?page=termekcsoportok">Termékcsoportok</a></li>';
echo '<li><a class="dropdown-item text-dark" href="?page=termekkategoriak">Termékkategóriák</a></li>';
echo '<li><hr class="dropdown-divider text-dark"></li>';
echo '<li><a class="dropdown-item text-dark" href="?page=termekek">Termékek</a></li>';
echo '</ul>';
echo '</li>';
echo '</ul>';
echo '<ul class="navbar-nav">';
echo '<li class="nav-item">';
echo '<a class="nav-link active text-danger" aria-current="page" href="?page=kijelentkezes" id="kijelentkezes">Kijelentkezés <i class="bi bi-box-arrow-in-right"></i></a>';
echo '</li>';
echo '</ul>';
} else if ( $_SESSION [ 'id' ] [ 'jogosultsag' ] == 0 ) {
    echo '<div class="collapse navbar-collapse" id="navbarTogglerDemo02">';
    echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
    echo '<li class="nav-item">';
    echo '<a class="nav-link text-dark" href="?page=arajanlatkeszites">Árajánlat készítése</i></a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link text-dark" href="?page=adataim">Szerződésem adatai</i></a>';
    echo '</li>';
    echo '<ul class="navbar-nav">';
    echo '</ul>';
    echo '<ul class="navbar-nav">';
echo '<li class="nav-item">';
echo '<a class="nav-link active text-danger" aria-current="page" href="?page=kijelentkezes" id="kijelentkezes">Kijelentkezés <i class="bi bi-box-arrow-in-right"></i></a>';
echo '</li>';
echo '</ul>';
}
?>
</div>'
</div>'
</nav>'