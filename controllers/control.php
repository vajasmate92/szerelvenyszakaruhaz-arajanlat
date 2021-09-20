<?php 
include '../modells/modell.pdoconn.class.php';
include '../modells/modell.upload.class.php';
$upload = new Upload();

  if (isset($_POST['gyartoHozzaadGomb']) && !empty($_POST['gyartoHozzaad'])) {  
    $upload -> uploadManufacturer($_POST['gyartoHozzaad']);
    header('Location: ../index.php');
  } else {
    header('Location: ../index.php');
  }
  
  if (isset($_POST['kategoriaHozzaadGomb']) && !empty($_POST['kategoriaHozzaad'])) {  
    $upload -> uploadCategory($_POST['kategoriaHozzaad']);
    header('Location: ../index.php');
  } else {
    header('Location: ../index.php');
  }

  if (isset($_POST['termekcsoportHozzaadGomb']) && !empty($_POST['termekcsoportHozzaad']) && !empty($_POST['termekcsoportGyartoSelect'])) {  
    $upload -> uploadProductLine($_POST['termekcsoportHozzaad'], $_POST['termekcsoportGyartoSelect']);
    echo $_POST['termekcsoportHozzaad'] . " " . $_POST['termekcsoportGyartoSelect'];
    header('Location: ../index.php');
  } else {
    header('Location: ../index.php');
  }
