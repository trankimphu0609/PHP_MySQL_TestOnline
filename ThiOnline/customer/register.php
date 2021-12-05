<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Online</title>
    <link rel="stylesheet" href="../css/bootstrap.css">

    <style>
        #form-register {
            width: 400px;
            height: 450px;
            margin-left: 10px;
            margin-right: 10px;
            border: solid 2px gray;
        }

        #form-register input {
            width: 380px !important;
            margin-left: 5px !important;
        }

        #form-register label {
            margin-left: 5px !important;
        }

        #form-register button {
            margin-left: 5px !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Market Online</a>
            </li>
        </ul>
    </nav>

    <form method="post" id="form-register" action="saveRegister.php" >
        <h3>Register</h3>
        <div class="form-group">
            <label for="fullname">Your's Fullname:</label>
            <input type="text" class="form-control" placeholder="Enter fullname...." id="fullname" name="fullname">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password..." id="password" name="password">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" placeholder="Enter address..." id="address" name="address">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" placeholder="Enter city..." id="city" name="city">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</body>
</html>