<?php
class View extends PDOConn {

    public function kategoriaSelect() {
        $sql = 'SELECT id, kategoria FROM kategoriak';

        $stmt = $this -> pdoConnect() -> query($sql);

        while($row = $stmt -> fetch()) {
            echo '<option value="' . $row['id'] . '" >' . $row['kategoria'] . '</option>';
        }
    }
    
    public function gyartoSelect() {
        $sql = 'SELECT id, gyarto FROM gyartok';

        $stmt = $this -> pdoConnect() -> query($sql);

        while($row = $stmt -> fetch()) {
            echo '<option value="' . $row['id'] . '" >' . $row['gyarto'] . '</option>';
        }
    }

    public function termekcsoportSelect() {
        $sql = 'SELECT id, termekcsoport FROM termekcsoportok';

        $stmt = $this -> pdoConnect() -> query($sql);

        while($row = $stmt -> fetch()) {
            echo '<option value="' . $row['id'] . '" >' . $row['termekcsoport'] . '</option>';
        }
    }

    public function partnerMezoKitoltes ( $id ) {
       
        $id = intval ( $id );

        $sql = "SELECT `nev`, `email` FROM `arajanlatok`.`felhasznalok` WHERE `PK_id` LIKE :id;" ;
            $stmt = $this -> pdoConnect () -> prepare ( $sql ) ;
                $stmt -> bindParam ( ":id" , $id ) ;
                        $stmt -> execute () ;
                            $felhasznaloNev = $stmt -> fetch () ;       
                
        return $felhasznaloNev;
    }
}