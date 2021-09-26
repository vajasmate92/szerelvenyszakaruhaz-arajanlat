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

    public function fillTableWithRegisteredUsers () {
        $sql = "SELECT `pk_id`, `nev`, `email`, `jogosultsag`, `allapot` FROM `felhasznalok`";
            $stmt = $this -> pdoConnect () -> prepare ( $sql );
                $stmt -> execute ();
                    $fetchedRowData = $stmt -> fetchAll ();

        return $fetchedRowData;
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

        $telefonszamDBFormatum = 06 . $partnerTelefonszamSzolgaltato . $partnerTelefonszam;

        $adoszamDBFormatum = $adoszamTorzsszam . $adoszamAFAKod . $adoszamTeruletiKod;

        $allapot = 1;

        $adminIDBFormatum = $this -> getAdministratorID ( $adminID );

       echo '1. LÉPÉS: SQL Statement létrehozása';

       $sql = "INSERT INTO `partnerek`(`ceg_nev`, `ceg_telefonszam`, `ceg_cim_adoszam`, `ceg_cim_irsz`, `ceg_cim_varos`, `ceg_cim_utca_hazszam`, `ceg_szallitolevel_limit`, `ceg_kedvezmeny_merteke`, `FK_felhasznalo_id`, `FK_letrehozo_admin_id`, `allapot`)
       VALUES (:partnerCegNev, :telefonszamDBFormatum, :adoszamDBFormatum, :partnerCegIrsz, :partnerCegVaros, :partnerCegCim, :szallitoLevelLimit, :partnerKedvezmeny, :partnerID, :adminID, :allapot);";
        
        echo '2. LÉPÉS: SQL Statement előkészítése';

        $stmt = $this -> pdoConnect () -> prepare ( $sql );

        echo '3. LÉPÉS: SQL adatok felparaméterezése a beérkezett adatok szerint';

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
                                                $stmt -> bindParam ( ':allapot' , $allapot );

        echo '4. LÉPÉS: SQL parancs végrehajtása';

        $stmt -> execute ();

        echo '5. LÉPÉS: Sikeres feltöltés';

        echo '6. LÉPÉS: kiértesítés emailben - mail felparaméterezése';


        $cimzett = $partnerEmail;
        echo $cimzett;
            $targy = 'Szerelvény Szakáruház Kft Árajánlat készítő - sikeres élesítés!';
                $uzenet = '<h1>Tisztel' . $partnerNev . '!</h1>\r\n<p>Örömmel értesítjük, hogy feldolgoztuk regisztrációs kérelmét, és aktiváltuk a felhasználói fiókját!</p>';
                    $fejlec = 'From: beszerzes@szerelvenyaruhaz.hu' . '\r\n' .
                            'Reply-to: beszerzes@szerelvenyaruhaz.hu' . '\r\n' .
                                'Content-type: text/html; charset=UTF-8';

        echo '7. LÉPÉS: kiértesítés emailben - email kíküldése';
        
        mail ( $cimzett , $targy , $uzenet , $fejlec );
        
        echo '8. LÉPÉS: imádkozni, hogy minden stimmeljen';

    }

}