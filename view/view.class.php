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

    public function felhasznaloMezoKitoltes ( $id ) {

        $sql = "SELECT `nev`, `email` FROM `arajanlatok`.`felhasznalok` WHERE `PK_id` LIKE :id;" ;

        $stmt = $this -> pdoConnect () -> prepare ( $sql ) ;

        $stmt -> bindParam ( ":id" , $id ) ;

        $stmt -> execute () ;

        $felhasznaloAdatok = $stmt -> fetch () ;
        
        return $felhasznaloAdatok;
    }

    public function partnerMezoKitoltes ( $id ) {
        $sql = "SELECT `ceg_nev`, `ceg_telefonszam`, `ceg_cim_adoszam`, `ceg_cim_irsz`, `ceg_cim_varos`, `ceg_cim_utca_hazszam`, `ceg_szallitolevel_limit`, `ceg_kedvezmeny_merteke`, `FK_felhasznalo_id`, `FK_letrehozo_admin_id` FROM `arajanlatok`.`partnerek` WHERE `FK_felhasznalo_id` LIKE :id";
        
        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        
        $stmt -> bindParam ( ":id" , $id );
        
        $stmt -> execute ();
        
        $partnerAdatok = $stmt -> fetch ();

        return $partnerAdatok;
    }

    public function fillTableWithRegisteredUsers () {
        $sql = "SELECT `pk_id`, `nev`, `email`, `jogosultsag`, `allapot` FROM `felhasznalok`";

        $stmt = $this -> pdoConnect () -> prepare ( $sql );

        $stmt -> execute ();

        $fetchedRowData = $stmt -> fetchAll ();

        return $fetchedRowData;
    }
    
    public function tablaFeltolteseGyartokkal () {
        $sql = 'SELECT
            `pk_id`,
            `gyarto`,
            `allapot`
        FROM
            `arajanlatok`.`gyartok`;';
        
        $stmt = $this -> pdoConnect () -> prepare ( $sql );

        $stmt -> execute ();

        return $fetchedRowData = $stmt -> fetchAll ();
    }

    public function tablaFeltolteseTermekcsoportokkal () {
        $sql = 'SELECT
            `pk_id`,
            `termekcsoport`,
            `FK_gyarto_id`
        FROM
            `arajanlatok`.`termekcsoportok`;';
        
        $stmt = $this -> pdoConnect () -> prepare ( $sql );

        $stmt -> execute ();

        return $fetchedRowData = $stmt -> fetchAll ();
    }
}