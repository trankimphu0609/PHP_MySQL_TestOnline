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
    <div class="category" style="float: left; margin-top: 2%; margin-left:2%; margin-right:2%">
        <form action="add.php" method="get">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" place="Enter name..." id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" place="Enter description..." id="description" name="description">
            </div>   
            <button type="submit" class="btn btn-info">Add</button>
        <form>
    </div>           
    <div class="contaimnent">
        <h4 class="display-5">Category</h4>
        <div class="row">
            <?php
                $class_category = new category();
                $cate = $class_category->getAll();
                $i = 0;
                echo "<div id='table'><table class='table table-bordered'>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </div>";
                foreach ($cate as $key => $value) {
                    $i = $i + 1;
                    echo "<tr>
                            <td>$i</td>
                            <td>" . $value[1] . "</td>
                            <td>" . $value[2] . "</td>
                        </tr>";
                }
            ?>
        </div>
    </div>
</body>
</html>