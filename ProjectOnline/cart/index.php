<?php
    session_start();
    include "../connection.php";
    include "../class/vegetable.php";
    include "../class/order.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h4 class="display-5">Your Cart</h4>
        <?php
            $classVeg = new vegetable();
            $i = 0;
            $total_Amount = 0;
            $total_Price = 0;
            $classOrder = new order();

            if(isset($_SESSION['cart'])) {
                echo "<div id='table'><table class='table table-bordered'>
                        <thead class='thead-light'>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Picture</th>
                                <th>Amount</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>";
                foreach($_SESSION['cart'] as $key => $value) {
                    $i += 1;
                    $total_Amount += $value["qty"];
                    $total_Price +=  $value["price"] * $value["qty"];
                    echo "<tr>
                            <td>$i</td>
                            <td>".$value['name']."</td>
                            <td><img src='../".$value['picture']."' style='width: 15%; height:15%;'></td>
                            <td>".$value["qty"]."</td>
                            <td>".$value["price"]."</td>
                        </tr>";
                }
                echo "</tbody>
                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td>$total_Amount</td>
                            <td>$total_Price</td>
                        </tr>
                    </tfoot>
                    </table>";
                   
        ?>
            <div class='d-inline line'>
                <button type='button' onclick="window.location='./saveorder.php';" class='btn btn-outline-danger'>Order</button>
            </div>
            <?php
        }
        else {
            echo "<p>Cart is Emty!</p>";
        }
                    
?>
</body>
</html>