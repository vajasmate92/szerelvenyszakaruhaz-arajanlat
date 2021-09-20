<?php

class Admin extends PDOConn {

    public function getAdministratorName($id) {
        $sql = "SELECT `nev` FROM `felhasznalok` WHERE `PK_id` LIKE :id";
            $stmt = $this -> pdoConnect() -> prepare($sql);
                            $stmt -> bindParam(":id", $idCheck);
                                $idCheck = $email;
                                    $stmt -> execute();
                                        $fetchedName = $stmt -> fetch(PDO::FETCH_ASSOC);
                                        
        return $fetchedName['nev'];
    }

}