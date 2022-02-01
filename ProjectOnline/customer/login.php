<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Online</title>
    <link rel="stylesheet" href="../css/bootstrap.css">

    <style>
        #form-login {
            width: 300px;
            height: 300px;
            margin-left: 10px;
            margin-right: 10px;
            border: solid 2px gray;
        }

        #form-login input {
            width: 280px !important;
            margin-left: 5px !important;
        }

        #form-login label {
            margin-left: 5px !important;
        }

        #form-login button {
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
    
    <form method="post" id="form-login" action="checkLogin.php">
        <h3>Login</h3>
        <div class="form-group">
            <label for="customerid">Your's ID:</label>
            <input type="text" class="form-control" placeholder="Enter ID...." id="customerid" name="customerid">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password..." id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <button type="button" class="btn btn-primary" onclick='window.location="register.php"'>Register</button>
    </form>
</body>
</html>