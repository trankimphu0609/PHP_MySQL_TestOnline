<?php
    class order extends Database {
        public function __construct(){
            parent::connect();
        }

        public function getAllOrder($cusID) {
            $data = null;
            $conn = parent::connect();
            $sql = "SELECT * FROM `order` WHERE CustomerID = '$cusID'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }

        public function getOrderDetail($orderid) {
            $conn = parent::connect();
            $sql = "SELECT * FROM orderdetail WHERE OrderID = $orderid";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }

        
        public function addOrder($order) {
            $conn = parent::connect();
            $dateInput = strtotime($order["Date"]);
            $dateSQL = date("Y/m/d", $dateInput);
            $sql = "SELECT * from `order`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row; 
            }
            $orderid = count($data);
            $id = $orderid;
            $sql1 = "INSERT INTO `order` VALUES ($orderid, ".$order["CustomerID"].", '".$dateSQL."',".$order["Total"].", '".$order["Note"]."')";
            $result1 = mysqli_query($conn,$sql1);
            if ($result1) {
                return $id;
            }
            else {
                return -1;
            }
        }

        public function addOrderDetail($detail) {
            $conn = parent::connect();

            if($detail["OrderID"] === null) {  
                echo"<script>alert('Mã số của order không có');</script>";
            }
            else {
                $sql1 = "INSERT INTO orderdetail VALUES(".$detail["OrderID"].", ".$detail["VegetableID"].",
                                                ".$detail["Quantity"].", ".$detail["Price"].")";
                $result1 = mysqli_query($conn, $sql1);
                if($result1) {
                    return $detail["OrderID"];
                }
                else {
                    return -1;    
                }
            }
        }
    }

?>