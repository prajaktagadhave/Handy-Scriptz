<?php
    /* Documentation

    Constructor information:

    $dbName - database name (string)
    $dbHost - database host (string)
    $dbUser - database user (string)
    $dbPass - database password (string)
    $dbChar - database character set (example: utf8mb4) (string)
    $options - PDO options (assoc. array), example below:
        array(
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );


    */

    class SQLHelperClass {
        private $dbName;
        private $dbHost;
        private $dbPass;
        private $dbChar;
        private $options;
        private $dsn;
        private $pdoObject;
        public function __construct($dbName, $dbHost, $dbUser, $dbPass = "", $dbChar, $options) {
            $this->dbName = $dbName;
            $this->dbHost = $dbHost;
            $this->dbUser = $dbUser;
            $this->dbPass = $dbPass;
            $this->dbChar = $dbChar;
            $this->options = $optionsArray;
            $this->dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName . ";charset=" . $this->dbChar;
            try {
                $PDO = new PDO($this->dsn, $this->dbUser, $this->dbPass, $this->options);
                $this->pdoObject = $PDO;
                return true;
            } catch (PDOException $error) {
                $this->pdoObject = null;
                throw new Exception("Could not establish a connection to the database, exception: " . $error->getMessage());
            }
        }
        public function getPDO() {
            return $pdoObject;
        }
    }
?>