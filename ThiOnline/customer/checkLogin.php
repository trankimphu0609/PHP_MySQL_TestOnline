<?php
    session_start();
    
    include "../connection.php";
    include "../class/customer.php";

    $customerid = $_POST["customerid"];
    $password = $_POST["password"];

    $customer = new customer();
    $result = $customer->getByID($customerid);
    if($result == NULL) {
        echo "<script> alert('Không tìm thấy tài khoản!')</script>";
        echo "<script> window.location='login.php'; </script>";
    }
    else {
        foreach ($result as $key => $value) {
            if($password != $value[1]) {
                echo "<script> alert('Sai mật khẩu!')</script>";
                echo "<script> window.location='login.php'; </script>";
            }
            else {
                $_SESSION['customerid'] = $value[0];
                $_SESSION['password'] = $value[1];
                $_SESSION['fullname'] = $value[2];
                $_SESSION['address'] = $value[3];
                $_SESSION['city'] = $value[4];
                echo "<script> window.location='../vegetable/index.php'; </script>";    
            }
        }
    }
?>