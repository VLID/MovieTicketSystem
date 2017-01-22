<?php
    include "mysql_config.php";
    include "function.php";

    session_start();

    if (isset($_COOKIE['UID']) && isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        $_SESSION['UID'] = $_COOKIE['UID'];
    } else {
        echo "<script>if (confirm(\"You didn't login. Please login first.\")) { window.location = \"login.php\"; } else { window.location = \"login.php\"; };</script>";
    }

    $error = "";

    $selectDateSuccess = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectDate'])) {
        if ($_POST['dates'] != "") {
            $movieDate = $_POST['dates'];
            $selectDateSuccess = true;
        } else {
            $error = "Please select a valid date.";
            $selectDateSuccess = false;
        }
    }

    $selectMovieSuccess = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectMovie'])) {
        if ($_POST['movies'] != "") {
            $m_id = $_POST['movies'];
            $selectMovieSuccess = true;
        } else {
            $error = "Please select a valid movie.";
            $selectMovieSuccess = false;
        }
    }

    $selectTheaterSuccess = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectTheater'])) {
        if ($_POST['theaters'] != "") {
            $t_id = $_POST['theaters'];
            $selectTheaterSuccess = true;
        } else {
            $error = "Please select a valid theater.";
            $selectTheaterSuccess = false;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        if ($_POST['quantity'] == 0 || !preg_match("/^[0-9]{1,5}$/", $_POST['quantity'])) {
            $error = "Please input a valid quantity.";
        } else {
            $duplicate = false;
            $tQuantity = clean_input($_POST['quantity']);
            $tPrice = 0;
            $MSTID = $_POST['showTimeID'];
            $sql = "SELECT * FROM ".$user."Cart";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['movie_showtime_id'] == $MSTID) {
                        $duplicate = true;
                        $tQuantity = $tQuantity + $row['ticketQuantity'];
                        $tPrice = $tQuantity * $row['ticketPrice'];
                    }
                }
            }
            if ($duplicate) {
                $sql = "UPDATE ".$user."Cart SET ticketQuantity='".$tQuantity."', totalPrice='".$tPrice."' WHERE movie_showtime_id=".$MSTID;
                if (mysqli_query($conn, $sql)) {
                    echo "<script>if (confirm(\"You've added the tickets to the cart successfully!\")) { window.location = \"mycart.php\"; } else { window.location = \"mycart.php\"; };</script>";
                }
            } else {
                $sql = "SELECT * FROM cmm_movie_showtime WHERE movie_showtime_id=".$MSTID;
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $total = $tQuantity * $row['ticketPrice'];
                    $sql1 = "INSERT INTO ".$user."Cart (movie_id, movie_showtime_id, theater_id, ticketPrice, ticketQuantity, totalPrice) VALUES ('".$row['movie_id']."','".$row['movie_showtime_id']."','".$row['theater_id']."','".$row['ticketPrice']."','".$tQuantity."','".$total."')";
                    if (mysqli_query($conn, $sql1)) {
                        echo "<script>if (confirm(\"You've added the tickets to the cart successfully!\")) { window.location = \"mycart.php\"; } else { window.location = \"mycart.php\"; };</script>";
                    }
                }
            }
        }
    }
?>

<?php

   include "header.php";
   echo "<title>Buy Ticket</title>";
   include "navigation.php";

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Home
            </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="mycmm.php">Home</a>
                </li>
                <li class="active">
                    Buy Ticket
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
            <div class="col-md-12">
                <?php
                    // Date ************************************************
                    if ($selectDateSuccess) {

                        $sql="SELECT * FROM cmm_movie_showtime WHERE date='".$movieDate."'";
                        $result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            echo "<h4>Movie Show Time:</h4><br>";
                            echo "<table class=\"table table-bordered table-hover\">
                            <tr>
                            <th>Movie</th>
                            <th>Start Time</th>
                            <th>Date</th>
                            <th>Theater</th>
                            <th>Price/Person</th>
                            <th>Quantity</th>
                            <th>Select</th>
                            </tr>";
                            while($row = mysqli_fetch_array($result)){
                                // Get movie name
                                $movieID = $row['movie_id'];
                                $sql1 = "SELECT movie, page FROM cmm_movie WHERE movie_id=".$movieID;
                                $movieName = mysqli_fetch_array(mysqli_query($conn, $sql1))['movie'];
                                $moviePage = mysqli_fetch_array(mysqli_query($conn, $sql1))['page'];

                                // Get theater name and page
                                $theaterID = $row['theater_id'];
                                $sql3 = "SELECT theater, page FROM cmm_theater WHERE theater_id=".$theaterID;
                                $theaterName = mysqli_fetch_array(mysqli_query($conn, $sql3))['theater'];
                                $theaterPage = mysqli_fetch_array(mysqli_query($conn, $sql3))['page'];

                                echo "<form action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\" method=\"POST\">";
                                echo "<tr>";
                                echo "<td><a href=\"".$moviePage."\">".$movieName."</a></td>";
                                echo "<td>".$row['start_time']."</td>";
                                echo "<td>".$row['date']."</td>";
                                echo "<td><a href=\"".$theaterPage."\">".$theaterName."</a></td>";
                                echo "<td>".$row['ticketPrice']."</td>";
                                echo "<td><input type=\"hidden\" name=\"showTimeID\" value=\"".$row['movie_showtime_id']."\" /><input type=\"text\" name=\"quantity\" value=\"1\" /></td>";
                                echo "<td><button class=\"btn btn-danger btn-block\" type=\"submit\" name=\"add\" >Add</button></td>";
                                echo "</tr>";
                                echo "</form>";
                            }
                            echo "</table>";
                        } else {
                            $error = "Didn't find any movie on the date you selected. Please select another one.";
                        }
                        mysqli_close($conn); 
                    }

                    // Movie ************************************************
                    if ($selectMovieSuccess) {

                        $sql="SELECT * FROM cmm_movie_showtime WHERE movie_id='".$m_id."'";
                        $result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            echo "<h4>Movie Show Time:</h4><br>";
                            echo "<table class=\"table table-bordered table-hover\">
                            <tr>
                            <th>Movie</th>
                            <th>Start Time</th>
                            <th>Date</th>
                            <th>Theater</th>
                            <th>Price/Person</th>
                            <th>Quantity</th>
                            <th>Select</th>
                            </tr>";
                            while($row = mysqli_fetch_array($result)){
                                // Get movie name
                                $movieID = $row['movie_id'];
                                $sql1 = "SELECT movie, page FROM cmm_movie WHERE movie_id=".$movieID;
                                $movieName = mysqli_fetch_array(mysqli_query($conn, $sql1))['movie'];
                                $moviePage = mysqli_fetch_array(mysqli_query($conn, $sql1))['page'];

                                // Get theater name and page
                                $theaterID = $row['theater_id'];
                                $sql3 = "SELECT theater, page FROM cmm_theater WHERE theater_id=".$theaterID;
                                $theaterName = mysqli_fetch_array(mysqli_query($conn, $sql3))['theater'];
                                $theaterPage = mysqli_fetch_array(mysqli_query($conn, $sql3))['page'];

                                echo "<form action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\" method=\"POST\">";
                                echo "<tr>";
                                echo "<td><a href=\"".$moviePage."\">".$movieName."</a></td>";
                                echo "<td>".$row['start_time']."</td>";
                                echo "<td>".$row['date']."</td>";
                                echo "<td><a href=\"".$theaterPage."\">".$theaterName."</a></td>";
                                echo "<td>".$row['ticketPrice']."</td>";
                                echo "<td><input type=\"hidden\" name=\"showTimeID\" value=\"".$row['movie_showtime_id']."\" /><input type=\"text\" name=\"quantity\" value=\"1\" /></td>";
                                echo "<td><button class=\"btn btn-danger btn-block\" type=\"submit\" name=\"add\" >Add</button></td>";
                                echo "</tr>";
                                echo "</form>";
                            }
                            echo "</table>";
                        } else {
                            $error = "Didn't find the movie you selected. Please select another one.";
                        }
                        mysqli_close($conn); 
                    }


                    // Theater ************************************************
                    if ($selectTheaterSuccess) {

                        $sql="SELECT * FROM cmm_movie_showtime WHERE theater_id='".$t_id."'";
                        $result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            echo "<h4>Movie Show Time:</h4><br>";
                            echo "<table class=\"table table-bordered table-hover\">
                            <tr>
                            <th>Movie</th>
                            <th>Start Time</th>
                            <th>Date</th>
                            <th>Theater</th>
                            <th>Price/Person</th>
                            <th>Quantity</th>
                            <th>Select</th>
                            </tr>";
                            while($row = mysqli_fetch_array($result)){
                                // Get movie name
                                $movieID = $row['movie_id'];
                                $sql1 = "SELECT movie, page FROM cmm_movie WHERE movie_id=".$movieID;
                                $movieName = mysqli_fetch_array(mysqli_query($conn, $sql1))['movie'];
                                $moviePage = mysqli_fetch_array(mysqli_query($conn, $sql1))['page'];

                                // Get theater name and page
                                $theaterID = $row['theater_id'];
                                $sql3 = "SELECT theater, page FROM cmm_theater WHERE theater_id=".$theaterID;
                                $theaterName = mysqli_fetch_array(mysqli_query($conn, $sql3))['theater'];
                                $theaterPage = mysqli_fetch_array(mysqli_query($conn, $sql3))['page'];

                                echo "<form action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\" method=\"POST\">";
                                echo "<tr>";
                                echo "<td><a href=\"".$moviePage."\">".$movieName."</a></td>";
                                echo "<td>".$row['start_time']."</td>";
                                echo "<td>".$row['date']."</td>";
                                echo "<td><a href=\"".$theaterPage."\">".$theaterName."</a></td>";
                                echo "<td>".$row['ticketPrice']."</td>";
                                echo "<td><input type=\"hidden\" name=\"showTimeID\" value=\"".$row['movie_showtime_id']."\" /><input type=\"text\" name=\"quantity\" value=\"1\" /></td>";
                                echo "<td><button class=\"btn btn-danger btn-block\" type=\"submit\" name=\"add\" >Add</button></td>";
                                echo "</tr>";
                                echo "</form>";
                            }
                            echo "</table>";
                        } else {
                            $error = "Didn't find the theater you selected. Please select another one.";
                        }
                        mysqli_close($conn); 
                    }
                ?>
            </div>
        </div>
    </div>

    <?php
      echo "<div class=\"row text-center\"><div class=\"col-lg-12\"><h4 class=\"text-danger\">".$error."</h4></div></div>";
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="col-md-offset-3 col-md-2">
                        <select name="dates" class="form-control">
                            <option value="">Select a Date:</option>
                            <option value="2017-01-01">2017-01-01</option>
                            <option value="2017-01-02">2017-01-02</option>
                            <option value="2017-01-03">2017-01-03</option>
                            <option value="2017-01-04">2017-01-04</option>
                            <option value="2017-01-05">2017-01-05</option>
                            <option value="2017-01-06">2017-01-06</option>
                            <option value="2017-01-07">2017-01-07</option>
                            <option value="2017-01-08">2017-01-08</option>
                            <option value="2017-01-09">2017-01-09</option>
                            <option value="2017-01-10">2017-01-10</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <button class="btn btn-info btn-block" type="submit" name="selectDate">Select This Date</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="col-md-offset-3 col-md-2">
                        <select name="movies" class="form-control">
                            <option value="">Select a Movie:</option>
                            <option value="1">Mechanic: Resurrection</option>
                            <option value="2">Finding Dory</option>
                            <option value="3">Captain America: Civil War</option>
                            <option value="4">Zootopia</option>
                            <option value="5">Forrest Gump</option>
                            <option value="6">Leon The Professional</option>
                            <option value="7">Saving Private Ryan</option>
                            <option value="8">Schindlers List</option>
                            <option value="9">The Shawshanke Redemption</option>
                            <option value="10">The God Father</option>
                            <option value="11">The Secret Life of Pets</option>
                            <option value="12">The Angry Birds Movie</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <button class="btn btn-warning btn-block" type="submit" name="selectMovie">Select This Movie</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="col-md-offset-3 col-md-2">
                        <select name="theaters" class="form-control">
                            <option value="">Select a Theater:</option>
                            <option value="1">AMC Arapahoe Crossing 16</option>
                            <option value="2">AMC Bowles Crossing 12</option>
                            <option value="3">AMC Cherry Creek 8</option>
                            <option value="4">AMC Dine-In Theatres Southlands 16</option>
                            <option value="5">AMC Highlands Ranch 24</option>
                            <option value="6">AMC Westminster Promenade 24</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <button class="btn btn-success btn-block" type="submit" name="selectTheater">Select This Theater</button>
                    </div>
                </form>
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
