<?php
    session_start();
    include "../connection.php";
    include "../class/order.php";
    include "../class/vegetable.php";

    if(isset($_SESSION["customerid"])) {
        if(isset($_SESSION["cart"])) {
            $classVeg = new vegetable();
            $classOrder = new order();
            $connect = new Database();
            $conn = $connect->connect();
            $date = date("Y/m/d");
            $customerID = $_SESSION["customerid"];
            $qty = 0;
            $total = 0;

            foreach ($_SESSION['cart'] as $key => $value) {
                $qty += $value["price"] * $value["qty"];
                $total += $value["qty"] * $value["price"];
            }


            $order = array("CustomerID" => $customerID, "Date" => "$date", "Total" => $total, "Note" => " ");
            $check = $classOrder->addOrder($order);
            $sql = "SELECT * FROM `order`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            $orderID = $check; 
            foreach($_SESSION['cart'] as $key => $value) {
                $detail=array("OrderID" => $orderID, "VegetableID" => $key, "Quantity" => $value["qty"], "Price" => $value["price"]);
                $check1 = $classOrder->addOrderDetail($detail);
                $vegetable = $classVeg->getByID($key);
                $remain = $vegetable->Amount - $value['qty'];
                $check2 = mysqli_query($conn, "UPDATE vegetable SET Amount = $remain WHERE VegetableID = $key");
                if($check != -1 && $check2 == true) {
                    continue;
                }
                else {
                    echo"<script>alert('Đặt hàng thất bại 1');</script>";
                    break;
                }
            }
            if ($check != -1) {
                echo "<script>alert('Đặt hàng thành công!');
                window.location='../vegetable/index.php'; </script>";
                unset($_SESSION["cart"]);
            }
            else {
                echo "<script>alert('Thêm thất bại! 2');</script>";
            }
        }
        else {
            echo "<script>alert('Giỏ hàng của bạn rỗng!');
            window.location='../vegetable/index.php';</script>";
        }
    }
    else {
        echo "<script>alert('Vui lòng đăng nhập tài khoản!');
            window.location='../customer/login.php';</script>";
    }
?>