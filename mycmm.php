<?php
    include "mysql_config.php";

    session_start();

    $success_loggedin = false;

    $rightPerson = false;

    $user = "";

    if (isset($_COOKIE['UID']) && isset($_SESSION['username']) && ($_COOKIE['UID'] == md5($_SESSION['username']))) {
        $user = $_SESSION['username'];
        $_SESSION['UID'] = $_COOKIE['UID'];
        $success_loggedin = true;
        $adminUser_db = "SELECT * FROM adminUser WHERE username='".$user."'";
        $result = mysqli_query($conn, $adminUser_db);
        if (mysqli_num_rows($result) > 0) {
            $rightPerson = true;
        }
    } else {
        echo "<script>if (confirm(\"You didn't login. Please login first.\")) { window.location = \"login.php\"; } else { window.location = \"login.php\"; };</script>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
        setcookie('UID','',time()-60*60*24*1,NULL,NULL,NULL,TRUE);
        session_destroy();
        echo "<script>if (confirm(\"You've already logged out.\")) { window.location = \"index.php\"; } else { window.location = \"index.php\"; };</script>";
    }
?>

<?php

   include "header.php";
   echo "<title>Home</title>";
   include "navigation.php";

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Home
            </h2>
            <ol class="breadcrumb">
                <li class="active">
                    Home
                </li>
                <li>
                    <a href="buyticket.php">Buy Ticket</a>
                </li>
                <li>
                    <a href="myorder.php">My Ticket</a>
                </li>
                <li>
                    <a href="mycart.php">My Cart</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php
                if ($success_loggedin) {
                    echo "<div class=\"col-md-4\"><h3>Hello ";
                    if ($rightPerson) {
                        echo "<span style=\"color: gold\">SuperUser</span>";
                    } else {
                        echo "<span class=\"text-info\">GeneralUser</span>";
                    }
                    echo", <span class=\"text-success\">".$user."</span>!</h3></div>";
                    if ($rightPerson) {
                        echo "<div class=\"col-md-offset-6 col-md-2\"><button class=\"btn btn-success btn-lg btn-block\" type=\"button\" onclick=\"javaScript:window.location.href='redeemCode.php';\">Redeem Code</button></div><br>";
                    }
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <h4 class="text-muted">Please select your options:</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <div class="col-md-offset-1 col-md-2">
                    <button class="btn btn-primary btn-lg btn-block" type="button" onclick="javaScript:window.location.href='buyticket.php';">Buy Ticket</button>
                </div>
                <div class="col-md-offset-1 col-md-2">
                    <button class="btn btn-info btn-lg btn-block" type="button" onclick="javaScript:window.location.href='myorder.php';">My Ticket</button>
                </div>
                <div class="col-md-offset-1 col-md-2">
                    <button class="btn btn-warning btn-lg btn-block" type="button" onclick="javaScript:window.location.href='mycart.php';">My Cart</button>
                </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="col-md-offset-1 col-md-2">
                    <button class="btn btn-danger btn-lg btn-block" type="submit" name="logout" value="Logout">Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Footer -->
<?php
    include 'footer.php';
?>  

<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
