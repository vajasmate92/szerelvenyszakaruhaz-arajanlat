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
    
    public function gyartokLista () {
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

    public function gyartoLekerdezeseTermekcsoportAlapjan () {

        $sql =
        'SELECT
        `termekcsoportok`.`termekcsoport`,
        `termekcsoportok`.`FK_gyarto_id`,
        `termekcsoportok`.`allapot`,
        `termekcsoportok`.`PK_id`,
        `gyartok`.`gyarto`
    FROM
        `gyartok`
    INNER JOIN
        `termekcsoportok`
    ON
        `termekcsoportok`.`FK_gyarto_id` = `gyartok`.`PK_id`;';

    $stmt = $this -> pdoConnect () -> prepare ( $sql );
    $stmt -> execute ();
    return $fetchedRowData = $stmt -> fetchAll ();
    }

    public function termekkategoriak () {
        $sql = 'SELECT
        `pk_id`,
        `termekkategoria`,
        `allapot`
    FROM
        `arajanlatok`.`termekkategoriak`;';
    
    $stmt = $this -> pdoConnect () -> prepare ( $sql );

    $stmt -> execute ();

    return $fetchedRowData = $stmt -> fetchAll ();
    }

    public function termekcsoportLista () {
        $sql = 'SELECT
        `pk_id`,
        `termekcsoport`,
        `allapot`
    FROM
        `arajanlatok`.`termekcsoportok`;';
    
    $stmt = $this -> pdoConnect () -> prepare ( $sql );

    $stmt -> execute ();

    return $fetchedRowData = $stmt -> fetchAll ();
    }

    public function termekekLista () {
    $sql = 
        'SELECT
            `gyartok`.`gyarto`,
            `termekcsoportok`.`termekcsoport`,
            `termekkategoriak`.`termekkategoria`,
            `termekek`.`PK_id`,
            `termekek`.`termeknev`,
            `termekek`.`cikkszam`,
            `termekek`.`ar`,
            `termekek`.`allapot`
        FROM
        (((`termekek`
        INNER JOIN
            `gyartok`
        ON
            `gyartok`.`PK_id` = `termekek`.`FK_gyarto_id`)
        INNER JOIN
            `termekcsoportok`
        ON
            `termekcsoportok`.`PK_id` = `termekek`.`FK_termekcsoport_id`)
        INNER JOIN
            `termekkategoriak`
        ON
            `termekkategoriak`.`PK_id` = `termekek`.`FK_termekkategoria_id`);';

    $stmt = $this -> pdoConnect () -> prepare ( $sql );

    $stmt -> execute ();

    return $fetchedRowData = $stmt -> fetchAll ();

    }

    public function kereses (
        $keresoSzo
    ) {
        filter_var ( $keresoSzo , FILTER_SANITIZE_STRING );

        $sql =
        "SELECT
            `gyartok`.`gyarto`,
            `termekcsoportok`.`termekcsoport`,
            `termekkategoriak`.`termekkategoria`,
            `termekek`.`PK_id`,
            `termekek`.`termeknev`,
            `termekek`.`cikkszam`,
            `termekek`.`ar`,
            `termekek`.`allapot`
        FROM
        (((`termekek`
        INNER JOIN
            `gyartok`
        ON
            `gyartok`.`PK_id` = `termekek`.`FK_gyarto_id`)
        INNER JOIN
            `termekcsoportok`
        ON
            `termekcsoportok`.`PK_id` = `termekek`.`FK_termekcsoport_id`)
        INNER JOIN
            `termekkategoriak`
        ON
            `termekkategoriak`.`PK_id` = `termekek`.`FK_termekkategoria_id`)
        WHERE
        CONCAT (`gyarto`, ' ', `termekcsoport`, ' ', `termekkategoria`, ' ', `termeknev`, ' ', `cikkszam`)
        LIKE CONCAT ('%', :keresoSzo, '%');";
        
        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ':keresoSzo', $keresoSzo );
        $stmt -> execute ();
    
        return $fetchedRowData = $stmt -> fetchAll ();
    }

    public function arajanlatokMegjelenit (
        $partnerID
    ) {
        $sql =
        'SELECT
            `arajanlat`.`arajanlat_nev`,
            `arajanlat`.`allapot`,
            `arajanlat`.`arajanlat_cimzett_nev`,
            `arajanlat`.`arajanlat_cimzett_varos`,
            `arajanlat`.`arajanlat_cimzett_irsz`,
            `arajanlat`.`arajanlat_cimzett_cim_utca_hazszam`,
            `arajanlat`.`arajanlat_tabla`
        FROM
            `arajanlat`
        WHERE
            `FK_letrehozo_partner_id` = :partnerID;';

        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ':partnerID', $partnerID );
        $stmt -> execute ();

        return $fetchedRowData = $stmt -> fetchAll ();
    }

    public function adminisztratorokLekerese () {
        $sql = 
        "SELECT * FROM `arajanlatok`.`adminisztratorok`;";
        
        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> execute ();
        $fetchedPartnerek = $stmt -> fetch();

        return $fetchedPartnerek;
    }

}