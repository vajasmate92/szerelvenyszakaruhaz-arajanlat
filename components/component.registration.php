<main class="form-signin">
  <?php include 'components/component.alert.php' ?>
    <form id="registracioForm" method="POST">
      <h1 class="h3 mb-3 fw-normal">Regisztráció igénylése</h1>
        <div class="form-floating my-2">
          <input type="text" class="form-control" name="nev" required>
          <label for="nev">Saját név</label>
        </div>
      <div class="form-floating my-2">
        <input type="email" class="form-control" name="email" required>
        <label for="email">E-mail cím</label>
      </div>
      <div class="form-floating my-2">
        <input type="password" class="form-control" name="jelszo" required>
        <label for="jelszo">Jelszó</label>
      </div>
      <div class="form-floating my-2">
        <input type="password" class="form-control" name="jelszoEllenorzes" required>
        <label for="jelszoEllenorzes">Jelszó mégegyszer</label>
      </div>
        <div class="checkbox mb-3"></div>
      </form>  
          <button type="button" class="w-100 btn btn-lg btn-primary gomb">Regisztrációs igény küldése</button>
</main>