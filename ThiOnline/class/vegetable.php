<?php
    class vegetable extends Database {
        public function __construct(){
            parent::connect();
        }

        public function getAll() {
            $conn = parent::connect();
            $sql = "SELECT * FROM vegetable";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }
        
        public function getListByCateID($cateid) {
            $conn = parent::connect();
            $sql = "SELECT * FROM vegetable WHERE CategoryID = $cateid";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }
        
        public function getListByCateIDs($cateids) {
            for($i = 0; $i < count($cateids); $i++) {
                $conn = parent::connect();
                $sql = "SELECT * FROM vegetable WHERE CategoryID = ".$cateids[$i]."";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)) {
                    $data[] = $row;
                }
            }
            return $data;
            
        }   

        public function getByID($vegetableid) {
            $conn = parent::connect();
            $sql = "SELECT * FROM vegetable WHERE VegetableID = $vegetableid";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_object($result);
            return $row;
        }
    }
?>