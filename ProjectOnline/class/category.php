<?php
    class category extends Database {
        public function __construct(){
            parent::connect();
        }

        public function getAll() {
            $conn = parent::connect();
            $sql = "SELECT * FROM category";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }

        public function add($cate) {
            $conn = parent::connect();
            $sql = "INSERT INTO category VALUES('','".$cate['Name']."', '".$cate['Description']."')";
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                echo "<script> alert('Thêm thất bại!'); </script>";
            }
            else {
                echo "<script> alert('Đã thêm danh mục thành công!'); </script>";
            }
        }
    }


?>