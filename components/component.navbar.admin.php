<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <div class="container-fluid">
    <a class="navbar-brand">Üdvözlöm, <?php echo $admin -> getAdministratorName ( $_SESSION ['id'] ); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-dark" href="?page=arajanlatok">Árajánlatok <i class="bi bi-file-earmark"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="?page=partnerek">Szerződött partnerek <i class="bi bi-person"></i></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Termékekkel kapcsolatos műveletek         <i class="bi bi-box-seam"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-dark" href="?page=gyartok">Gyártók</a></li>
            <li><a class="dropdown-item text-dark" href="?page=termekcsoportok">Termékcsoportok</a></li>
            <li><a class="dropdown-item text-dark" href="?page=termekkategoriak">Termékkategóriák</a></li>
            <li><hr class="dropdown-divider text-dark"></li>
            <li><a class="dropdown-item text-dark" href="?page=termekek">Termékek</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-danger" aria-current="page" href="?page=kijelentkezes" id="kijelentkezes">Kijelentkezés <i class="bi bi-box-arrow-in-right"></i></a>
        </li>
</ul>

    </div>
  </div>
</nav>