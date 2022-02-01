<?php
    include "../connection.php";
    include "../class/category.php";
    class vegetable1 extends Database {
        public function __construct(){
            parent::connect();
        }

        public function getUnit() {
            $conn = parent::connect();
            $sql = "SELECT DISTINCT Unit FROM vegetable ORDER BY Unit";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }
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

    <div class='container'>
        <h4 class="display-7">Add Vegetable</h4>
        <form action="./add.php" method="post">
            <div class="form-row"> 
                <div class="col-6">
                    <label for="name">Vegetable Name:</label>
                    <input type="text" class="form-control" id="vegetablename" name="vegetablename">
                </div>
                <div class="col-3">
                    <label for="category">Category Name:</label>
                    <select class="form-control" id="category" name="category">
                        <?php
                            $classCate = new category();
                            $result = $classCate->getAll();
                            foreach($result as $key => $value) {
                                echo "<option value='" .$value[0]. "'>" .$value[1]. "</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3">
                    <label for="unit">Unit:</label>
                    <select class="form-control" id="unit" name="unit">
                        <?php
                            $classUnit = new vegetable1();
                            $result = $classUnit->getUnit();
                            foreach($result as $key => $value) {
                                echo "<option value='" .$value[0]. "'>" .$value[0]. "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-3">
                    <label for="amount">Amount:</label>
                    <input type="text" class="form-control" id="amount" name="amount">
                </div>
                <div class="col-3">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">  
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept=".jpg, .png"  onchange="imageSize()">
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">  
                    <br></br>
                    <button type="submit" class="btn btn-info" name="submit" value="add">Add</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var img = document.getElementById('image') 
        function imageSize() {
            var fileSize = img.files[0].size;
            if(fileSize > 2000000) {
                alert("Vui lòng chọn ảnh dưới 2MB");
                document.getElementById('image').value = ""
            }
        }
    </script>
</body>
</html>