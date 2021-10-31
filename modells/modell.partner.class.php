<?php

class Partner extends PDOConn {

private function ismetlodoTablaNevEllenorzes (
$veletlenKarakter
) {
$egyezes = false;
$sql =
'SELECT
`arajanlat_tabla`
FROM
`arajanlatok`.`arajanlat`;';

$stmt = $this -> pdoConnect () -> prepare ( $sql );
$stmt -> execute ();
$arajanlatTablaNevek = $stmt -> fetch ();

for ( $i = 0 ; $i < count ( $arajanlatTablaNevek ) -1 ; $i++ ) {
if ( $arajanlatTablaNevek [ $i ] [ 'arajanlat_tabla' ] == $veletlenKarakter ) {
$egyezes = true;
}
}
return $egyezes;
}

    public function partnerIDLeker (
        $felhasznaloID
    ) {
        $sql = "SELECT `PK_id` FROM `partnerek` WHERE `FK_felhasznalo_id` LIKE :id";
        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ':id' , $felhasznaloID );
        $stmt -> execute ();
        $fetchedID = $stmt -> fetch ();
                        
        return $fetchedID [ 'pk_id' ];
    }

    public function arajanlatLetrehozasa (
        $partnerID,
        $arajanlatNeve,
        $arajanlatCimzettNeve,
        $arajanlatCimzettVaros,
        $arajanlatCimzettIrsz,
        $arajanlatCimzettCim
    ) {

        filter_var ( $partnerID , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $arajanlatNeve , FILTER_SANITIZE_STRING );
        filter_var ( $arajanlatCimzettNeve , FILTER_SANITIZE_STRING );
        filter_var ( $arajanlatCimzettVaros , FILTER_SANITIZE_STRING );
        filter_var ( $arajanlatCimzettIrsz , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $arajanlatCimzettCim , FILTER_SANITIZE_STRING );

        $allapot = 1;
        $arajanlatTabla = rand ( 0 , 100000 ) . 'pnid' . $partnerID;
        while ( $this -> ismetlodoTablaNevEllenorzes ( $arajanlatTabla ) ) {
            $arajanlatTabla = rand ( 0 , 100000 ) . 'pnid' . $partnerID;
        };

        $sql =
        'INSERT INTO
            `arajanlatok`.`arajanlat`
        (
            `FK_letrehozo_partner_id`,
            `arajanlat_nev`,
            `allapot`,
            `arajanlat_cimzett_nev`,
            `arajanlat_cimzett_varos`,
            `arajanlat_cimzett_irsz`,
            `arajanlat_cimzett_cim_utca_hazszam`,
            `arajanlat_tabla`
        )
        VALUES
        (
            :partnerID,
            :arajanlatNeve,
            :allapot,
            :arajanlatCimzettNeve,
            :arajanlatCimzettVaros,
            :arajanlatCimzettIrsz,
            :arajanlatCimzettCim,
            :arajanlatTabla
        );';

        $stmt = $this -> pdoConnect () -> prepare ( $sql );

        $stmt -> bindParam ( ':partnerID' , $partnerID );
        $stmt -> bindParam ( ':arajanlatNeve' , $arajanlatNeve );
        $stmt -> bindParam ( ':allapot' , $allapot );
        $stmt -> bindParam ( ':arajanlatCimzettNeve' , $arajanlatCimzettNeve );
        $stmt -> bindParam ( ':arajanlatCimzettVaros' , $arajanlatCimzettVaros );
        $stmt -> bindParam ( ':arajanlatCimzettIrsz' , $arajanlatCimzettIrsz );
        $stmt -> bindParam ( ':arajanlatCimzettCim' , $arajanlatCimzettCim );
        $stmt -> bindParam ( ':arajanlatTabla' , $arajanlatTabla );

        $stmt -> execute ();

        $sql =
        'CREATE TABLE `arajanlatok`.`' . $arajanlatTabla . '`(
            `termek_sorszam` INT(8) NOT NULL AUTO_INCREMENT,
            `termek` VARCHAR(255) NOT NULL,
            `termek_mennyiseg` INT(8) NOT NULL,
            `termek_ara` INT(8) NOT NULL,
            PRIMARY KEY(`termek_sorszam`)
        );';

        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        // $stmt -> bindParam ( ':arajanlatTabla' , $arajanlatTabla );
        $stmt -> execute ();
    }

}
