<?php
    session_start();
    include "../connection.php";
    include "../class/vegetable.php";
    include "../class/category.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Online</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Market Online</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Vegetable</a>
            </li>
        </ul>
    </nav>
    <div id="category" style="float: left; margin-top: 2%; margin-left:2%; margin-right:2%">
        <div>Category Name: </div>
        <form action="./index.php" method="get">
            <?php
                $class_category = new category();
                $listcate = $class_category->getAll();
                foreach ($listcate as $key => $value) {
                    echo "<div class='form-check'>
                            <input  style='margin: 10px;' type='checkbox' value='".$value[0]."' id='".$value[1]."' name='Category[]' >
                            <label class='form-check-label' for='".$value[1]."'>
                                ".$value[1]." 
                            </label>
                        </div>";
                }
            ?>
            <input type="submit" name="submit" class="btn btn-info btn-md" value="Filter">
        </form>
    </div>
    <div class="container">
        <h4 class="display-5">Vegetable</h4>
        <div class='row'>
            <?php
                $class_vegetable = new vegetable();
                $Vegetables = $class_vegetable->getAll();
                $i = 1;
                if(isset($_GET["Category"])) {
                    $cateIDs = $_GET["Category"];
                    $listProduct = $class_vegetable->getListByCateIDs($cateIDs);
                    foreach ($listProduct as $key => $value) {
                        echo "<div class='card' style='width: 15rem;'>
                                <img src='../".$value[5]."' alt='#' class='card-img-top' style='height: 220px;'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$value[2]." <span class='badge badge-warning'>".$value[6]."</span></h5>
                                    <a href='./index.php?id=".$value[0]."' class='btn btn-danger'>Buy</a>
                                </div>
                            </div>";
                    }  
                }
                else {
                    foreach($Vegetables as $key => $value) {
                        echo "<div class='card' style='width: 15rem;'>
                                <img src='../".$value[5]."' alt='#' class='card-img-top' style='height: 220px;'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$value[2]." <span class='badge badge-warning'>".$value[6]."</span></h5>
                                    <a href='./index.php?id=".$value[0]."' class='btn btn-danger'>Buy</a>
                                </div>
                            </div>";

                    }
                }              
            ?>
        </div>
    </div>
    <?php
        if(isset($_GET["id"]) && $_GET["id"] != null) {
            $VegetableID = $_GET["id"];
            $VegetableInfo = $class_vegetable->getByID($VegetableID);
            if(isset($_SESSION["cart"])) {
                if(isset($_SESSION['cart'][$VegetableID])) {
                    if($_SESSION['cart'][$VegetableID]['qty'] > $VegetableInfo->Amount - 1) {
                        echo "<script>alert('Sản phẩm đã hết hàng');</script>";
                    }
                    else {
                        $_SESSION['cart'][$VegetableID]['qty'] += 1; 
                        $_SESSION['cart'][$VegetableID]['name'] = $VegetableInfo->VegetableName;
                        $_SESSION['cart'][$VegetableID]['price'] = $VegetableInfo->Price;
                        $_SESSION['cart'][$VegetableID]['picture'] = $VegetableInfo->Image;
                        echo "<script>alert('Thêm vào giỏ hàng thành công');</script>";
                    }
                }
                else {
                    if($VegetableInfo->Amount == 0) {
                        echo "<script>alert('Sản phẩm đã hết hàng');</script>";
                    }
                    else {
                        $_SESSION['cart'][$VegetableID]['qty'] = 1;
                        $_SESSION['cart'][$VegetableID]['name'] = $VegetableInfo->VegetableName;
                        $_SESSION['cart'][$VegetableID]['price'] = $VegetableInfo->Price;
                        $_SESSION['cart'][$VegetableID]['picture'] = $VegetableInfo->Image;
                        echo "<script>alert('Thêm vào giỏ hàng thành công');</script>";
                    }
                }
            }
            else {
                if ($VegetableInfo->Amount == 0) {
                    echo "<script>alert('Sản phẩm đã hết hàng');</script>";
                }
                else {
                    $_SESSION['cart'][$VegetableID]['qty'] = 1;
                    $_SESSION['cart'][$VegetableID]['name'] = $VegetableInfo->VegetableName;
                    $_SESSION['cart'][$VegetableID]['price'] = $VegetableInfo->Price;
                    $_SESSION['cart'][$VegetableID]['picture'] = $VegetableInfo->Image;
                    echo "<script>alert('Thêm vào giỏ hàng thành công');</script>";
                }
            }
        }
        
        
    ?>



</body>

</html>
