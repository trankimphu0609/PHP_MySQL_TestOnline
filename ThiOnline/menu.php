<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Market Online</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./vegetable/index.php">Vegetable</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="./cart/index.php">Cart</a>
        </li>
        <li class="nav-item">
            <?php
                if(!isset($_SESSION['customerid'])) {
                    echo "<a class='nav-link' href='#' onclick='";
                      echo 'window.location="./customer/login.php"';
                    echo "'>Login</a>";
                }
                else {
                    echo "<ul class='navbar-nav' id='cus-info'>";
                        echo "<li class='nav-item'><a class='nav-link' href='./cart/history.php'>History</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='./customer/logout.php'>Logout</a></li>";
                        echo "<button type='button' class='btn btn-primary' disabled>" . $_SESSION['fullname'] . "</a></li>";
                    echo "</ul>";
                }
            ?>
        </li>
  </ul>
</nav>
