<?php
class Bejelentkezes extends PDOConn {
  
    private function isEmailExist($fetchedData, $email) {
        if (!$fetchedData['email'] == $email) {
            return false;
        } else {
            return true;
        }
    }
    
    private function isJelszoCorrect($fetchedData, $jelszo) {
        if(sha1($jelszo).$fetchedData['jelszo_salt'] == $fetchedData['jelszo']) {
            return true;
        } else {
            return false;
        }
    }
    
    private function isUserInitialized($fetchedData) {
        if($fetchedData['allapot'] == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function bejelentkezesIgenyBekuldese($email, $jelszo) {

        filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
            filter_var($jelszo, FILTER_SANITIZE_STRING);

            
            $sql = "SELECT `email` FROM `felhasznalok` WHERE `email` LIKE '".$email."'";
                $stmt = $this -> pdoConnect() -> prepare($sql);
                    $stmt -> bindParam(":email", $emailCheck);
                        $emailCheck = $email;
                                $stmt -> execute();
                                    $fetchedDataEmail = $stmt -> fetch();
                                        $isEmailExist = $this -> isEmailExist($fetchedDataEmail, $email);
                                    
                                    
                $sql = "SELECT `jelszo`, `jelszo_salt` FROM `arajanlatok`.`felhasznalok` WHERE `email` LIKE '".$email."'";
                    $stmt = $this -> pdoConnect() -> prepare($sql);
                        $stmt -> bindParam(":email", $emailCheck);
                            $emailCheck = $email;
                                $stmt -> execute();
                                    $fetchedDataJelszo = $stmt -> fetch();
                                        $isJelszoCorrect = $this -> isJelszoCorrect($fetchedDataJelszo, $jelszo);
            
                    $sql = "SELECT `allapot` FROM `felhasznalok` WHERE `email` LIKE '".$email."'";
                    $stmt = $this -> pdoConnect() -> prepare($sql);
                        $stmt -> bindParam(":email", $emailCheck);
                            $emailCheck = $email;
                                $stmt -> execute();
                                        $fetchedDataInit = $stmt -> fetch();
                                            $isUserInitialized = $this -> isUserInitialized($fetchedDataInit);

                if (!$isEmailExist) {
                    echo 1; // Hibás e-mail cím
                } else if (!$isJelszoCorrect) {
                    echo 2; // Hibás jelszó
                } else if (!$isUserInitialized) {
                    echo 3; // Nincs még aktiválva
                } else {
                    echo 0;
                }
            }
                }
                
