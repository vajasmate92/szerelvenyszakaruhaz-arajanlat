<?php

class Registration extends PDOConn {

    public function foglaltEAzEmailCim ( $email ) {
        
        filter_var ( $email , FILTER_SANITIZE_EMAIL );
        
        $sqlCheckEmailDuplication = "SELECT * FROM `felhasznalok` WHERE email = :email";
            $stmtCheckEmailDuplication = $this -> pdoConnect() -> prepare($sqlCheckEmailDuplication);
                $stmtCheckEmailDuplication -> bindParam(":email", $emailCheck);
                    $emailCheck = $email;
                        $stmtCheckEmailDuplication -> execute();
                            $isEmailDuplicated = $stmtCheckEmailDuplication -> fetch(PDO::FETCH_BOUND);

                            if ( !$isEmailDuplicated ) {
                                return true;
                            } else {
                                echo 'Ezzel az e-mail címmel már regisztráltak!';
                            }
    }

    public function regisztraciosIgenyBekuldese ( $nev, $email, $jelszo ) {

            filter_var ( $email , FILTER_SANITIZE_EMAIL );
                filter_var ( $nev , FILTER_SANITIZE_SPECIAL_CHARS );
                    filter_var ( $jelszo , FILTER_SANITIZE_STRING );

                $sql = "INSERT INTO `felhasznalok` (email, nev, jelszo, jelszo_salt, jogosultsag, allapot)
                    VALUES (:email, :nev, :jelszo, :jelszo_salt, :jogosultsag, :allapot)";
                        $stmt = $this -> pdoConnect () -> prepare ( $sql );
    
                $stmt -> bindParam(":email", $emailTemp);
                    $stmt -> bindParam(":nev", $nevTemp);
                        $stmt -> bindParam(":jelszo", $jelszoTemp);
                            $stmt -> bindParam(":jelszo_salt", $jelszoSalt);
                                $stmt -> bindParam(":jogosultsag", $jogosultsag);
                                    $stmt -> bindParam(":allapot", $allapot);
    
                $emailTemp = $email;
                    $nevTemp = $nev;
                        $jelszoSalt = sha1(mt_rand());
                            $jelszoTemp = sha1($jelszo).$jelszoSalt;
                                $jogosultsag = 1;
                                    $allapot = 1;
                        
                $stmt -> execute();
                        
                echo 'Fogadtuk a regisztrációs kérelmed!';
        }
}