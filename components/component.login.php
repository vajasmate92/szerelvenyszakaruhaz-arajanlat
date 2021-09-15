<main class="form-signin">
  <?php include 'components/component.alert.php' ?>
  <form method="POST">
    <h1 class="h3 mb-3 fw-normal">Bejelentkezés</h1>
    <div class="form-floating my-2">
      <input type="email" class="form-control" name="email">
      <label for="email">E-mail cím</label>
    </div>
    <div class="form-floating my-2">
      <input type="password" class="form-control" name="jelszo">
      <label for="jelszo">Jelszó</label>
    </div>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me">Bejelentkezési adatok megjegyzése</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary gomb" type="button">Bejelentkezés</button>
  </form>
</main>