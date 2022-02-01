<?php
    include "../connection.php";
    include "../class/category.php";

    if(isset($_GET['name']) && isset($_GET['description'])) {
        $category["Name"] = $_GET["name"];
        $category["Description"] = $_GET["description"];
        if($category['Name'] == '') {
            echo "<script> alert('Bạn phải thêm tên danh mục!'); </script>";
            echo "<script>window.location='./index.php'</script>";
        }
        else {
            $classCate = new category();
            $classCate->add($category);
            echo "<script>window.location='./index.php'</script>";
        }
    }
?>