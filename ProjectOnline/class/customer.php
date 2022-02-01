<?php
    class customer extends Database {
        public function __construct(){
            parent::connect();
        }

        public function getByID($cusid) {
            $conn = parent::connect();
            $sql = "SELECT * FROM customers WHERE CustomerID = '$cusid'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }

        public function add($cus) {
            $conn = parent::connect();
            $sql = "INSERT INTO customers VALUES ('', '".$cus['Password']."', 
                    '".$cus['Fullname']."', '".$cus['Address']."', '".$cus['City']."')"; 
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                echo "<script> alert('Thêm thất bại!'); </script>";
            }
            else {
                echo "<script> alert('Đã thêm khách hàng!'); </script>";
            }
        
        }
    }

?>