<?php
    include "../connection.php";
    include "../class/vegetable.php";

    class vegetable2 extends Database {
        public function __construct(){
            parent::connect();
        }
        public function add($veg) {
            $conn = parent::connect();
            $sql = "INSERT INTO vegetable VALUES ('', '".$veg['CategoryID']."', '".$veg['VegetableName']."',
                                        '".$veg['Unit']."', '".$veg['Amount']."','".$veg['Image']."', 
                                        '".$veg['Price']."')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "<script>alert('Thêm thất bại!'); </script>";
            }
            else {
                echo "<script>alert('Đã thâm sản phẩm thành công!'); </script>";
            }
        }
    }
    if(isset($_POST['vegetablename']) && isset($_POST['unit']) && isset($_POST['price']) && isset($_POST['amount']) 
                            && isset($_POST['image']) && isset($_POST['category'])) {
        $veg['VegetableName'] = $_POST['vegetablename'];
        $veg['Unit'] = $_POST['unit'];
        $veg['Price'] =  $_POST['price'];
        $veg['Image'] = $_POST['image'];
        $veg['Amount'] = $_POST['amount'];
        $veg['CategoryID'] = $_POST['category'];
        $classveg = new vegetable2();
        $classveg->add($veg);
        echo "<script> window.location= 'new.php' </script>";
    
    }
?>