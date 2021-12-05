<?php
    include "../connection.php";
    include "../class/customer.php";

    if(isset($_POST['password']) && isset($_POST['fullname']) && isset($_POST['address']) && isset($_POST['city'])) {
        $customer['Password'] = $_POST['password'];
        $customer['Fullname'] = $_POST['fullname'];
        $customer['Address'] = $_POST['address'];
        $customer['City']  = $_POST['city'];

        $class_customer = new customer();
        $class_customer->add($customer);
        echo "<script>window.location='login.php';</script>";
    }
?>