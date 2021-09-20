<?php
class Upload extends PDOConn {

    private $filterString = FILTER_SANITIZE_STRING; 
    private $filterInteger = FILTER_SANITIZE_NUMBER_INT; 

    public function uploadManufacturer($gyarto) {
        $filteredData = filter_var($gyarto, $this -> filterString);
        trim($filteredData);
        $sql = "INSERT INTO `gyartok` (gyarto) VALUES (:gyarto)";
        $stmt = $this -> pdoConnect() -> prepare($sql);
        $stmt -> bindParam(":gyarto", $gyartoBeilleszt);

        $gyartoBeilleszt = $filteredData;
        $stmt -> execute();
    }

    public function uploadCategory($kategoria) {
        $filteredData = filter_var($kategoria, $this -> filterString);
        trim($filteredData);
        
        $sql = "INSERT INTO `kategoriak` (kategoria) VALUES (:kategoria)";
        $stmt = $this -> pdoConnect() -> prepare($sql);
        $stmt -> bindParam(":kategoria", $kategoriaBeilleszt);

        $kategoriaBeilleszt = $filteredData;
        $stmt -> execute();
    }

    public function uploadProductLine($termekcsoport, $GyartoID) {
        $filteredDataTermekcsoport = filter_var($termekcsoport, $this -> filterString);
        $filteredDataTermekcsoportGyarto = filter_var($GyartoID, $this -> filterInteger);
        trim($filteredDataTermekcsoport);
        
        $sql = "INSERT INTO `termekcsoportok` (termekcsoport, termekcsoport_gyartoja) VALUES (:termekcsoport, :termekcsoport_gyartoja)";
        $stmt = $this -> pdoConnect() -> prepare($sql);
        $stmt -> bindParam(":termekcsoport", $termekcsoportBeilleszt);
        $stmt -> bindParam(":termekcsoport_gyartoja", $termekcsoportGyartoBeilleszt);

        $termekcsoportBeilleszt = $filteredDataTermekcsoport;
        $termekcsoportGyartoBeilleszt = $filteredDataTermekcsoportGyarto;
        $stmt -> execute();
    }



    // public function uploadProduct($gyarto, $kategoria, $nev, $ar) {
    //     $filteredData = filter_var($gyarto, $this -> filter);
    //     $filteredData = filter_var($gyarto, $this -> filter);
    //     $filteredData = filter_var($gyarto, $this -> filter);
    //     $filteredData = filter_var($gyarto, $this -> filter);
    //     trim($filteredData);
    //     $sql = "INSERT INTO `gyartok` (gyarto) VALUES (:gyarto)";
    //     $stmt = $this -> pdoConnect() -> prepare($sql);
    //     $stmt -> bindParam(":gyarto", $gyartoBeilleszt);

    //     $gyartoBeilleszt = $filteredData;
    //     $stmt -> execute();
    // }

    public function __destruct() {
        $this -> pdoConnect() -> die();
    }
}