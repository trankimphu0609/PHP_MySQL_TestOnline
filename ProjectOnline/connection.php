<?php 
    class Database {
        private $server = 'localhost';
        private $username_db = 'root';
        private $password_db = '';
        private $database = 'market';
        public $conn;
        public function __construct() {
            $this->connect();
        }
        function connect() {
            try {
                if(($this->conn = mysqli_connect($this->server, $this->username_db, $this->password_db, $this->database))) {
                    return $this->conn;
                } 
                else {
                    throw new Exception('Không thể kết nối đến Database <br />');
                }
            } 
            catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>