<?php

class Admin extends PDOConn {

    private function getAdministratorID ( $id ) {
        $sql = "SELECT `PK_id` FROM `adminisztratorok` WHERE `FK_felhasznalo_id` LIKE :id";
        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ':id' , $id );
        $stmt -> execute ();
        $fetchedID = $stmt -> fetch ();
                        
        return $fetchedID ['pk_id'];
    }

    public function getAdministratorName ( $id ) {
        $sql = "SELECT `nev` FROM `felhasznalok` WHERE `PK_id` LIKE :id";
        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ":id" , $idCheck );
        $idCheck = $id;
        $stmt -> execute ();
        $fetchedName = $stmt -> fetch ( PDO::FETCH_ASSOC );
                                        
        return $fetchedName [ 'nev' ];
    }

    public function partnerElesitese ( 
        $partnerCegNev,
        $partnerTelefonszamRegioKod,
        $partnerTelefonszamSzolgaltato,
        $partnerTelefonszam,
        $partnerKedvezmeny,
        $szallitoLevelLimit,
        $partnerID,
        $adminID,
        $adoszamTorzsszam,
        $adoszamAFAKod,
        $adoszamTeruletiKod,
        $partnerCegIrsz,
        $partnerCegVaros,
        $partnerCegCim,
        $partnerEmail,
        $partnerNev
    ) {

        filter_var ( $partnerCegNev , FILTER_SANITIZE_STRING );
        filter_var ( $partnerTelefonszamRegioKod , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerTelefonszamSzolgaltato , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerTelefonszam , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerKedvezmeny , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $szallitoLevelLimit , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerID , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $adminID , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $adoszamTorzsszam , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $adoszamAFAKod , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $adoszamTeruletiKod , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerCegIrsz , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerCegVaros , FILTER_SANITIZE_STRING );
        filter_var ( $partnerCegCim , FILTER_SANITIZE_STRING );
        filter_var ( $partnerEmail , FILTER_SANITIZE_EMAIL );
        filter_var ( $partnerEmail , FILTER_SANITIZE_STRING );

        $telefonszamDBFormatum = 36 . $partnerTelefonszamSzolgaltato . $partnerTelefonszam;
        $adoszamDBFormatum = $adoszamTorzsszam . $adoszamAFAKod . $adoszamTeruletiKod;
        $adminIDBFormatum = $this -> getAdministratorID ( $adminID );


       $sql = "INSERT INTO `arajanlatok`.`partnerek`
       (
        `ceg_nev`,
       `ceg_telefonszam`,
       `ceg_cim_adoszam`,
       `ceg_cim_irsz`, `ceg_cim_varos`,
       `ceg_cim_utca_hazszam`, `ceg_szallitolevel_limit`,
       `ceg_kedvezmeny_merteke`,
       `FK_felhasznalo_id`,
       `FK_letrehozo_admin_id`
       )
       VALUES
       (
        :partnerCegNev,
        :telefonszamDBFormatum,
        :adoszamDBFormatum,
        :partnerCegIrsz,
        :partnerCegVaros,
        :partnerCegCim,
        :szallitoLevelLimit,
        :partnerKedvezmeny,
        :partnerID,
        :adminID
       )";

        $stmt = $this -> pdoConnect () -> prepare ( $sql );

        $stmt -> bindParam ( ':partnerCegNev' , $partnerCegNev );
        $stmt -> bindParam ( ':telefonszamDBFormatum' , $telefonszamDBFormatum );
        $stmt -> bindParam ( ':adoszamDBFormatum' , $adoszamDBFormatum );
        $stmt -> bindParam ( ':partnerCegIrsz' , $partnerCegIrsz );
        $stmt -> bindParam ( ':partnerCegVaros' , $partnerCegVaros );
        $stmt -> bindParam ( ':partnerCegCim' , $partnerCegCim );
        $stmt -> bindParam ( ':szallitoLevelLimit' , $szallitoLevelLimit );
        $stmt -> bindParam ( ':partnerKedvezmeny' , $partnerKedvezmeny );
        $stmt -> bindParam ( ':partnerID' , $partnerID );
        $stmt -> bindParam ( ':adminID' , $adminIDBFormatum );

        $stmt -> execute ();

        $cimzett = $partnerEmail;

        // echo $cimzett;
        // $targy = 'Szerelvény Szakáruház Kft Árajánlat készítő - sikeres élesítés!';
        // $uzenet = '<h1>Tisztel' . $partnerNev . '!</h1>\r\n<p>Örömmel értesítjük, hogy feldolgoztuk regisztrációs kérelmét, és aktiváltuk a felhasználói fiókját!</p>';
        // $fejlec = 'From: beszerzes@szerelvenyaruhaz.hu' . '\r\n' .
        // 'Reply-to: beszerzes@szerelvenyaruhaz.hu' . '\r\n' .
        // 'Content-type: text/html; charset=UTF-8';

        //echo '7. LÉPÉS: kiértesítés emailben - email kíküldése';
        // mail ( $cimzett , $targy , $uzenet , $fejlec );
        //echo '8. LÉPÉS: imádkozni, hogy minden stimmeljen';

    }

    public function felhasznaloAktivalas ( $partnerID ) {

        filter_var ( $partnerID , FILTER_SANITIZE_NUMBER_INT );

        $sql = "UPDATE `arajanlatok`.`felhasznalok` SET `allapot` = 1 WHERE `PK_id` LIKE :PK_id";
        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ':PK_id' , $partnerID );

        $stmt -> execute ();
    }

    public function partnerSzerkesztes ( 
        $partnerCegNev,
        $partnerTelefonszam,
        $adoszam,
        $partnerCegIrsz,
        $partnerCegVaros,
        $partnerCegCim,
        $partnerKedvezmeny,
        $szallitoLevelLimit,
        $partnerID
    ) {

        filter_var ( $partnerCegNev , FILTER_SANITIZE_STRING );
        filter_var ( $partnerTelefonszam , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerTelefonszam , FILTER_VALIDATE_INT );
        filter_var ( $partnerKedvezmeny , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $szallitoLevelLimit , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerID , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $adoszam , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerCegIrsz , FILTER_SANITIZE_NUMBER_INT );
        filter_var ( $partnerCegVaros , FILTER_SANITIZE_STRING );
        filter_var ( $partnerCegCim , FILTER_SANITIZE_STRING );

        $sql = 
        "UPDATE
            `arajanlatok`.`partnerek`
        SET
            `ceg_nev`=:partnerCegNev,
            `ceg_telefonszam`= :partnerTelefonszam,
            `ceg_cim_adoszam`=:adoszam,
            `ceg_cim_irsz`=:partnerCegIrsz,
            `ceg_cim_varos`=:partnerCegVaros,
            `ceg_cim_utca_hazszam`=:partnerCegCim,
            `ceg_szallitolevel_limit`=:szallitoLevelLimit,
            `ceg_kedvezmeny_merteke`=:partnerKedvezmeny
        WHERE
            `FK_felhasznalo_id`
        LIKE
            :partnerID";

        $stmt = $this -> pdoConnect () -> prepare ( $sql );

        $stmt -> bindParam ( ':partnerCegNev' , $partnerCegNev );
        $stmt -> bindParam ( ':partnerTelefonszam' , $partnerTelefonszam );
        $stmt -> bindParam ( ':adoszam' , $adoszam );
        $stmt -> bindParam ( ':partnerCegIrsz' , $partnerCegIrsz );
        $stmt -> bindParam ( ':partnerCegVaros' , $partnerCegVaros );
        $stmt -> bindParam ( ':partnerCegCim' , $partnerCegCim );
        $stmt -> bindParam ( ':szallitoLevelLimit' , $szallitoLevelLimit );
        $stmt -> bindParam ( ':partnerKedvezmeny' , $partnerKedvezmeny );
        $stmt -> bindParam ( ':partnerID' , $partnerID );

        $stmt -> execute ();

}

    public function felhasznaloSzerkesztes (
        $partnerEmail,
        $partnerNev,
        $partnerID
    ) {

        filter_var ( $partnerEmail , FILTER_SANITIZE_EMAIL );
        filter_var ( $partnerNev , FILTER_SANITIZE_STRING );     
        filter_var ( $partnerID , FILTER_SANITIZE_NUMBER_INT );

        $sql =
         "UPDATE
            `arajanlatok`.`felhasznalok`
        SET
            `email`=:partnerEmail,
            `nev`= :partnerNev
        WHERE
            `PK_id`
        LIKE
            :partnerID;";

        $stmt = $this -> pdoConnect () -> prepare ( $sql );

        $stmt -> bindParam ( ':partnerEmail' , $partnerEmail );
        $stmt -> bindParam ( ':partnerNev' , $partnerNev );
        $stmt -> bindParam ( ':partnerID' , $partnerID );
                    
        $stmt -> execute ();
    }

    public function gyartoFeltoltes (
        $gyarto,
        $adminID
    ) {

        filter_var ( $gyarto , FILTER_SANITIZE_STRING );
        filter_var ( $adminID , FILTER_SANITIZE_NUMBER_INT );

        $allapot = 1;

        
        $adminIDPK = $this -> getAdministratorID ( $adminID );
        
        $sql = 
        "INSERT INTO `arajanlatok`.`gyartok`
            (
            `gyarto`,
            `FK_letrehozo_admin_id`,
            `allapot`
            )
        VALUES
            (
            :gyarto,
            :adminID,
            :allapot
            )";

        $stmt = $this -> pdoConnect () -> prepare ( $sql );

        $stmt -> bindParam ( ':gyarto' , $gyarto );
        $stmt -> bindParam ( ':adminID' , $adminIDPK );
        $stmt -> bindParam ( ':allapot' , $allapot );

        $stmt -> execute ();

    }

    public function partnerTolrese ( $id ) {

        filter_var ( $id , FILTER_SANITIZE_NUMBER_INT );

        $sql = 
        'DELETE FROM
            `arajanlatok`.`partnerek`
        WHERE
            `FK_felhasznalo_id` = :id;';
        
        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( 'id' , $id );
        $stmt -> execute ();

        $sql = 
        'DELETE FROM
            `arajanlatok`.`felhasznalok`
        WHERE
            `PK_id` = :id;';

        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( 'id' , $id );
        $stmt -> execute ();
    }

    public function gyartoSzerkesztes (
        $gyarto,
        $gyartoID
    ) {

        filter_var ( $gyarto , FILTER_SANITIZE_STRING );     
        filter_var ( $gyartoID , FILTER_SANITIZE_NUMBER_INT );

        $sql =
         "UPDATE
            `arajanlatok`.`gyartok`
        SET
            `gyarto`= :gyarto
        WHERE
            `PK_id`
        LIKE
            :gyartoID;";
            

        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ":gyarto" , $gyarto );
        $stmt -> bindParam ( ":gyartoID" , $gyartoID );
                    
        $stmt -> execute ();
    }

    public function termekcsoportFeltoltes (
        $termekcsoport,
        $gyarto,
        $adminID
    ) {
        filter_var ( $termekcsoport , FILTER_SANITIZE_STRING ); 
        filter_var ( $gyarto , FILTER_SANITIZE_STRING ); 
        filter_var ( $adminID , FILTER_SANITIZE_NUMBER_INT ); 

        $adminIDPK = $this -> getAdministratorID ( $adminID );
        $allapot = 1;

        $sql =
        "SELECT
            `PK_id`
        FROM
            `arajanlatok`.`gyartok`
        WHERE
            `gyarto`=:gyarto;";

        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ':gyarto' , $gyarto );
        $stmt -> execute ();

        $gyartoIDPK = $stmt -> fetch ();

        $sql =
        "INSERT INTO
            `arajanlatok`.`termekcsoportok`
            (
            `termekcsoport`,
            `FK_letrehozo_admin_id`,
            `FK_gyarto_id`,
            `allapot`
            )
        VALUES
            (
            :termekcsoport,
            :adminIDPK,
            :gyartoIDPK,
            :allapot
            );";
        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ':termekcsoport' , $termekcsoport );
        $stmt -> bindParam ( ':adminIDPK' , $adminIDPK );
        $stmt -> bindParam ( ':gyartoIDPK' , $gyartoIDPK [ 'pk_id' ] );
        $stmt -> bindParam ( ':allapot' , $allapot );

        $stmt -> execute ();

echo $termekcsoport;
echo $adminIDPK;
echo $gyartoIDPK [ 'pk_id' ];
echo $allapot;
    }

    public function termekcsoportGyartohozRendel (
        $termekcsoport,
        $allapot
    ) {
        filter_var ( $termekcsoport , FILTER_SANITIZE_STRING );
        filter_var ( $allapot , FILTER_SANITIZE_NUMBER_INT );

        $sql =
        'UPDATE
            `arajanlatok`.`termekcsoportok`
        SET
            `allapot`=:allapot
        WHERE
            `termekcsoport`=:termekcsoport';

        $stmt = $this -> pdoConnect () -> prepare ( $sql );
        $stmt -> bindParam ( ':allapot' , $allapot );
        $stmt -> bindParam ( 'termekcsoport' , $termekcsoport );

        $stmt -> execute ();
    }

    public function gyartoKapcsol (
        $gyarto,
        $allapot
    ) {
    filter_var ( $gyarto , FILTER_SANITIZE_STRING );
    filter_var ( $allapot , FILTER_SANITIZE_NUMBER_INT );

    $sql = 
    'UPDATE
        `arajanlatok`.`gyartok`
    SET
        `allapot`=:allapot
    WHERE
        `gyarto` LIKE :gyarto;';

    $stmt = $this -> pdoConnect () -> prepare ( $sql );
    $stmt -> bindParam ( ':allapot' , $allapot );
    $stmt -> bindParam ( 'gyarto' , $gyarto );

    $stmt -> execute ();
    }

}