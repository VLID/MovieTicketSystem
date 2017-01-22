<?php
    include "mysql_config.php";

    session_start();

    $used = "";

    if (isset($_COOKIE['UID']) && isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        $_SESSION['UID'] = $_COOKIE['UID'];
    } else {
        echo "<script>if (confirm(\"You didn't login. Please login first.\")) { window.location = \"login.php\"; } else { window.location = \"login.php\"; };</script>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
        setcookie('UID', '', time()-(60*60*24*7), '/', NULL, NULL, true);
        session_destroy();
        echo "<script>if (confirm(\"You've already logged out.\")) { window.location = \"index.php\"; } else { window.location = \"index.php\"; };</script>";
    }
?>

<?php

   include "header.php";
   echo "<title>My Order</title>";
   include "navigation.php";

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                My Order
            </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="mycmm.php">Home</a>
                </li>
                <li>
                    <a href="buyticket.php">Buy Ticket</a>
                </li>
                <li class="active">
                    My Ticket
                </li>
                <li>
                    <a href="mycart.php">My Cart</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <?php
                    $sql = "SELECT * FROM ".$user."Order";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        echo "<h4>Ticket Details:</h4><br>";
                        echo "<table class=\"table table-bordered table-hover\">
                        <tr>
                        <th>Movie</th>
                        <th>Quantity</th>
                        <th>Start Time</th>
                        <th>Date</th>
                        <th>Theater</th>
                        <th class=\"text-danger\">Redeem Code</th>
                        <th class=\"text-warning\">Used</th>
                        </tr>";
                        while($row = mysqli_fetch_array($result)){
                            // Get movie name
                            $movieID = $row['movie_id'];
                            $sql1 = "SELECT movie, page FROM cmm_movie WHERE movie_id=".$movieID;
                            $movieName = mysqli_fetch_array(mysqli_query($conn, $sql1))['movie'];
                            $moviePage = mysqli_fetch_array(mysqli_query($conn, $sql1))['page'];

                            // Get start time and date
                            $movieShowtimeID = $row['movie_showtime_id'];
                            $sql2 = "SELECT start_time, date FROM cmm_movie_showtime WHERE movie_showtime_id=".$movieShowtimeID;
                            $startTime = mysqli_fetch_array(mysqli_query($conn, $sql2))['start_time'];
                            $movieDate = mysqli_fetch_array(mysqli_query($conn, $sql2))['date'];

                            // Get theater name and page
                            $theaterID = $row['theater_id'];
                            $sql3 = "SELECT theater, page FROM cmm_theater WHERE theater_id=".$theaterID;
                            $theaterName = mysqli_fetch_array(mysqli_query($conn, $sql3))['theater'];
                            $theaterPage = mysqli_fetch_array(mysqli_query($conn, $sql3))['page'];

                            // Get Used or Not
                            $redeemCode = $row['redeemCode'];
                            $sql4 = "SELECT * FROM redeem_code_db WHERE redeemCode='".$redeemCode."'";
                            $used = mysqli_fetch_array(mysqli_query($conn, $sql4))['used'];

                            echo "<tr>";
                            echo "<td><a href=\"".$moviePage."\">".$movieName."</a></td>";
                            echo "<td>".$row['ticketQuantity']."</td>";
                            echo "<td>".$startTime."</td>";
                            echo "<td>".$movieDate."</td>";
                            echo "<td><a href=\"".$theaterPage."\">".$theaterName."</a></td>";
                            if ($used == 1) {
                                echo "<td><del>".$redeemCode."</del></td>";
                                echo "<td><div class=\"text-danger\"><b>YES</b></div></td>";
                            } else {
                                echo "<td>".$redeemCode."</td>";
                                echo "<td><div class=\"text-success\"><b>NO</b></div></td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<div class=\"row text-center\"><div class=\"col-lg-12\"><h3><a href=\"buyticket.php\">Buy more tickets</a></h3></div></div>";
                    } else {
                        echo "<div class=\"row text-center\"><div class=\"col-lg-12\"><h3 class=\"text-warning\">You didn't buy any ticket. You can buy some tickets <a href=\"buyticket.php\">here</a>.</h3></div></div>";
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
