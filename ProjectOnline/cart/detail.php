<?php
    session_start();
    include "../connection.php";
    include "../class/customer.php";
    include "../class/vegetable.php";
    include "../class/category.php";
    include "../class/order.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Online</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    
    <title>Market Online</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Market Online</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h4 class="display-5">Order Detail</h4>
        <?php 
            if(isset($_GET["orderid"]) && $_GET["orderid"] != null) {
                $orderID = $_GET["orderid"];
                $classOrder = new order();
                $classVeg = new vegetable();
                $orderdetail = $classOrder->getOrderDetail($orderID);
                echo "<div id='table'><table class='table table-bordered'>
                        <thread class='thread-light'>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thread>
                        <tbody>";
                $i = 0;
                $qty = 0;
                $total = 0;
                foreach($orderdetail as $key => $value) {
                    $i += 1;
                    $qty += $value["Quantity"];
                    $total += $value["Quantity"] * $value["Price"];
                    $vegetable = $classVeg->getByID($value["VegetableID"]);
                    echo "<tr>
                            <td>$i</td>
                            <td>".$vegetable->VegetableName."</td>
                            <td><img src='../$vegetable->Image' alt='' class='' style='width:15%; height:15%;'></td>
                            <td>".$value["Quantity"]."</td>
                            <td>".$value["Price"]."</td>
                        </tr>";
                }
                echo "</tbody>
                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td>$qty</td>
                            <td>$total</td>
                        </tr>
                    </tfoot>
                    </table>
                </div>";
            }
        ?>
    </div>
</body>
</html>