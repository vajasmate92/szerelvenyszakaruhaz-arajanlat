<?php
    class PDOConn {
        private $dbSys = "mysql";
            private $dbName = "localhost";
                private $dbSrvrName = "arajanlatok";
                    private $dbUserName = "root";
                        protected $dbPwd = "";
                            private $msg = "";
                                private $pdoSet = [
                                    PDO::ATTR_CASE => PDO::CASE_LOWER,
                                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                                ];
                                
        public function pdoConnect() {
            try {
                $dns = "mysql:host=localhost;dbname=arajanlatok";
                    $conn = new PDO($dns, $this -> dbUserName, $this -> dbPwd, $this -> pdoSet);
                        $this -> msg = "Sikeres csatlakozás";

                return $conn;
            } catch (PDOException $errMsg) {
                $this -> msg = "Sikertelen csatlakozás, ". $errMsg->getMessage();
            }
        }
    }