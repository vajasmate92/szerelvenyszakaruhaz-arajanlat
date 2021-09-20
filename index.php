<?php 
include 'modells/modell.pdoconn.class.php';
include 'view/view.class.php';
$conn = new PDOConn();
$view = new View();
?>
<!DOCTYPE html>
<html lang="hu-HU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árajánlat készítő</title>
    <?php include 'links/fonts.php' ?>
    <?php include 'links/style.php' ?>
  </head>
  <body class="margo-nincs">
  <?php
  include 'components/navbar.component.php'; 
  ?>
  <form action="controllers\control.php" method="POST">
<div class="flex flex-kozep flex-center flex-fuggoleges magassag-25">
  <h2>Gyártó hozzáadás</h2>
  <label class="margo-1" for="gyartoHozzaad">Gyártó neve</label>
  <input class="margo-1" type="text" name="gyartoHozzaad" class="gyartoHozzaad">
  <input class="margo-1" type="submit" name="gyartoHozzaadGomb" value="Hozzáad">
</div>  
<div class="flex flex-kozep flex-center flex-fuggoleges magassag-25">
  <h2>Kategória hozzáadás</h2>
  <label class="margo-1" for="kategoriaHozzaad">Kategória neve</label>
  <input class="margo-1" type="text" name="kategoriaHozzaad" class="kategoriaHozzaad">
  <input class="margo-1" type="submit" name="kategoriaHozzaadGomb" value="Hozzáad">
</div>  
<div class="flex flex-kozep flex-center flex-fuggoleges magassag-25">
  <h2>Termékcsoport hozzáadás</h2>
  <label class="margo-1" for="termekcsoportHozzaad">Termékcsoport neve</label>
  <input class="margo-1" type="text" name="termekcsoportHozzaad" class="termekcsoportHozzaad">
  <label for="gyartoSelect">Gyártó</label><select name="termekcsoportGyartoSelect" class="gyartoSelect">
      <?php 
      $view -> gyartoSelect();
      ?>
      </select>
  <input class="margo-1" type="submit" name="termekcsoportHozzaadGomb" value="Hozzáad">
</div> 
<!-- <div class="flex flex-kozep flex-center flex-fuggoleges magassag-25">
  <h2>Termék hozzáadás</h2>
  <div class="flex flex-kozep flex-center flex-vizszintes">
    <label for="gyartoSelect">Gyártó</label><select name="gyartoSelect" class="gyartoSelect">
      <?php 
      $view -> gyartoSelect();
      ?>
      </select>
    <label for="kategoriaSelect">Kategória</label>
    <select name="kategoriaSelect" class="kategoriaSelect">
      <?php 
      $view -> kategoriaSelect();
      ?>
      </select>
    <label for="termekcsoportSelect">Termékcsoport</label>
    <select name="termekcsoportSelect" class="termekcsoportSelect">
      <?php 
      $view -> termekcsoportSelect();
      ?>
      </select>
  </div>
  <div class="flex-vizszites">
    <label class="margo-1" for="nevHozzaad">Termék neve</label>
    <input class="margo-1" type="text" name="nevHozzaad" class="nevHozzaad">
  
    <label class="margo-1" for="cikkszamHozzaad">Termék cikkszáma</label>
    <input class="margo-1" type="text" name="cikkszamHozzaad" class="cikkszamHozzaad">
    
    <label class="margo-1" for="arHozzaad">Termék ára</label>
    <input class="margo-1" type="number" name="arHozzaad" class="arHozzaad">
  </div>
  <input class="margo-1" type="submit" name="termekHozzaadGomb" value="Hozzáad">
</div>   -->
</form>


</body>
</html>