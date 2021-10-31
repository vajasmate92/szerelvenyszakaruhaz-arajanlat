<?php
class Bejelentkezes extends PDOConn {

    private function emailCimHigienizalas ( $email ) {

        filter_var ( $email , FILTER_SANITIZE_SPECIAL_CHARS ) ;

    }

    private function jelszoHigienizalas ( $jelszo ) {

        filter_var ( $jelszo , FILTER_SANITIZE_STRING ) ;

    }
  
    public function letezikEAzEmailCim ( $email ) {
$this -> emailCimHigienizalas ( $email ) ;

$sql = "SELECT `email` FROM `felhasznalok` WHERE `email` LIKE :email;" ;
$stmt = $this -> pdoConnect () -> prepare ( $sql ) ;
$stmt -> bindParam ( ":email" , $email) ;
$stmt -> execute () ;
$letezikEAzEmailCim = $stmt -> fetch ( PDO::FETCH_BOUND ) ;
if ( $letezikEAzEmailCim ) {
return true ;
} else {
echo 'Ez az email cím nem létezik' ;
    }
}
    
public function helyesEAJelszo ( $email , $jelszo ) {
$this -> emailCimHigienizalas ( $email ) ;
$this -> jelszoHigienizalas ( $jelszo ) ;

$sql = "SELECT `jelszo`, `jelszo_salt` FROM `arajanlatok`.`felhasznalok` WHERE `email` LIKE :email;" ;
$stmt = $this -> pdoConnect () -> prepare ( $sql ) ;
$stmt -> bindParam ( ":email" , $email ) ;
$stmt -> execute () ;
$lekertJelszo = $stmt -> fetch () ;

if( sha1 ( $jelszo ) . $lekertJelszo [ 'jelszo_salt' ] == $lekertJelszo [ 'jelszo' ] ) {
return true ;
} else {
echo 'A jelszó nem helyes a megadott email címhez' ;
// return false ;
    }
}
    
public function felhasznaloAllapot ( $email ) {
$this -> emailCimHigienizalas ( $email ) ;

$sql = "SELECT `allapot` FROM `felhasznalok` WHERE `email` LIKE :email";
$stmt = $this -> pdoConnect () -> prepare ( $sql ) ;
$stmt -> bindParam ( ":email" , $email ) ;
$stmt -> execute () ;
$felhasznaloAllapota = $stmt -> fetch () ;

if ( $felhasznaloAllapota [ 'allapot' ] == '1' ) {
return true ;
} else if ( $felhasznaloAllapota [ 'allapot' ] == '0' ) {
echo 'A felhasználó nincs aktiválva!' ;
    }
}

public function felhasznaloAdatokLekerdezes($email) {
$this -> emailCimHigienizalas ($email);

$sql = 'SELECT `PK_id`, `jogosultsag`FROM `arajanlatok`.`felhasznalok` WHERE `email` LIKE :email;';
$stmt = $this -> pdoConnect() -> prepare($sql);
$stmt -> bindParam (":email", $email);
$stmt -> execute();
$fetchedID = $stmt -> fetch();
echo $fetchedID['pk_id'];
return $fetchedID;
    }
}
