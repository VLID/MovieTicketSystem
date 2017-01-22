<?php
    include "mysql_config.php";

    session_start();

    $success_pay = false;

    $ttp = 0;

    if (isset($_COOKIE['UID']) && isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        $_SESSION['UID'] = $_COOKIE['UID'];
    } else {
        echo "<script>if (confirm(\"You didn't login. Please login first.\")) { window.location = \"login.php\"; } else { window.location = \"login.php\"; };</script>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['logout'])) {
            setcookie('UID', '', time()-(60*60*24*7), '/', NULL, NULL, true);
            session_destroy();
            echo "<script>if (confirm(\"You've already logged out.\")) { window.location = \"index.php\"; } else { window.location = \"index.php\"; };</script>";
        }
        if (isset($_POST['delete'])) {
            $CID = $_POST['delete'];
            $sql = "DELETE FROM ".$user."Cart WHERE CID=".$CID;
            if (mysqli_query($conn, $sql)) {
                echo "<script>if (confirm(\"Delete Successfully!\")) { window.location = \"mycart.php\"; } else { window.location = \"mycart.php\"; };</script>";
            }

        }
        if (isset($_POST['pay'])) {
            $sql = "SELECT * FROM ".$user."Cart";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)) {
                $redeemCode = base64_encode("CID".$row['CID']."U".$user."M".$row['movie_id']."S".$row['movie_showtime_id']."T".$row['theater_id']."Q".$row['ticketQuantity']);
                $sql2 = "INSERT INTO ".$user."Order (movie_id, movie_showtime_id, theater_id, ticketQuantity, totalPrice, redeemCode) VALUES ('".$row['movie_id']."', '".$row['movie_showtime_id']."', '".$row['theater_id']."', '".$row['ticketQuantity']."', '".$row['totalPrice']."', '".$redeemCode."')";
                if (mysqli_query($conn, $sql2)) {
                    $sql3 = "INSERT INTO redeem_code_db (redeemCode, value, used) VALUES ('".$redeemCode."', '', '0')";
                    mysqli_query($conn, $sql3);
                    $sql1 = "DELETE FROM ".$user."Cart WHERE CID=".$row['CID'];
                    mysqli_query($conn, $sql1);
                }
            }
            $success_pay = true;
            echo "<script>confirm(\"You've paid $".$_SESSION['ttp']."!\");</script>";
        }
    }
?>

<?php

   include "header.php";
   echo "<title>My Cart</title>";
   include "navigation.php";

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                My Cart
            </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="mycmm.php">Home</a>
                </li>
                <li>
                    <a href="buyticket.php">Buy Ticket</a>
                </li>
                <li>
                    <a href="myorder.php">My Ticket</a>
                </li>
                <li class="active">
                    My Cart
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <?php
                    $sql = "SELECT * FROM ".$user."Cart";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        echo "<div class=\"col-md-3 col-md-offset-9\">";
                        echo "<button class=\"btn btn-warning btn-lg btn-block\" type=\"button\" name=\"pay\" onclick=\"javaScript:window.location.href='buyticket.php';\">Continue Shopping</button>";
                        echo "</div>";
                        echo "<h4>Cart Details:</h4><br>";
                        echo "<form action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\" method=\"POST\">";
                        echo "<table class=\"table table-bordered table-hover\">
                        <tr>
                        <th>Movie</th>
                        <th>Start Time</th>
                        <th>Date</th>
                        <th>Ticket Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                        </tr>";
                        while($row = mysqli_fetch_array($result)){
                            $ttp = $ttp + $row['totalPrice'];
                            $movieID = $row['movie_id'];
                            $showTimeID = $row['movie_showtime_id'];

                            // Get movie name
                            $sql1 = "SELECT movie, page FROM cmm_movie WHERE movie_id=".$movieID;
                            $movieName = mysqli_fetch_array(mysqli_query($conn, $sql1))['movie'];
                            $moviePage = mysqli_fetch_array(mysqli_query($conn, $sql1))['page'];

                            // Get movie show time
                            $sql4 = "SELECT start_time, date FROM cmm_movie_showtime WHERE movie_showtime_id='".$showTimeID."'";
                            $showStartTime = mysqli_fetch_array(mysqli_query($conn, $sql4))['start_time'];
                            $showDate = mysqli_fetch_array(mysqli_query($conn, $sql4))['date'];

                            echo "<tr>";
                            echo "<td><a href=\"".$moviePage."\">".$movieName."</a></td>";
                            echo "<td>".$showStartTime."</td>";
                            echo "<td>".$showDate."</td>";
                            echo "<td>$".$row['ticketPrice']."</td>";
                            echo "<td>".$row['ticketQuantity']."</td>";
                            echo "<td>$".$row['totalPrice']."</td>";
                            echo "<td><button type=\"submit\" class=\"btn btn-danger btn-block\" name=\"delete\" value=\"".$row['CID']."\" >Delete</button></td>";
                            echo "</tr>";
                        }
                        $_SESSION['ttp'] = $ttp;
                        echo "<tr><td><b>Total:</b></td><td></td><td></td><td></td><td></td>";
                        echo "<td>$".$ttp."</td>";
                        echo "<td></td>";
                        echo "</table>";
                        echo "<div class=\"col-md-3 col-md-offset-9\">";
                        echo "<button class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" name=\"pay\">Pay</button>";
                        echo "</div>";
                        echo "</form>";
                    } else {
                        if ($success_pay) {
                            echo "<div class=\"row text-center\"><div class=\"col-lg-12\"><h3 class=\"text-success\">Congratulation! <a href=\"myorder.php\">View your tickets</a> now.</h3></div></div>";
                        } else {
                            echo "<div class=\"row text-center\"><div class=\"col-lg-12\"><h3 class=\"text-warning\">Your cart is empty. You can buy some tickets <a href=\"buyticket.php\">here</a>.</h3></div></div>";
                        }
                    }
                    mysqli_close($conn);
                ?>
            </div>
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
