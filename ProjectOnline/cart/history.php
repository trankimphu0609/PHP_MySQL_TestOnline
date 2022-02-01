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
        <h4 class="display-5">History</h4>
        <table class='table table-bordered'>
            <thead class='thead-light'>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    error_reporting(0);
                    $i = 1;
                    $customerid = $_SESSION['customerid'];
                    $classOrder = new order();
                    $history = $classOrder->getAllOrder($customerid);
                    foreach($history as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value[2]; ?></td>
                    <td><?php echo $value[3]; ?></td>
                    <td><button class="btn btn-outline-primary"><a href="detail.php?orderid=<?php echo $value[0] ?>">Detail</a></button></td>
                </tr>
                <?php
                        $i = $i + 1;
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>