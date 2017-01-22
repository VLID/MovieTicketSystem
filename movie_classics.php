<?php
    include "header.php";
    echo "<title>Classics Movies</title>";
    include "navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"align="center">Classics Movies</h1>
            </div>
        </div>
        <!-- /.row -->


    <!-- forrestgump2016 -->
        <div class="row">
            <div class="col-md-6 img-portfolio">
                <h3><a href="mc_forrestgump1994.php"><?php $result = mysqli_query($conn, $forrestgump1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $forrestgump1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mc_forrestgump1994.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $forrestgump1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
    
    <!-- leonprof1994 -->
            <div class="col-md-6 img-portfolio">
                <h3><a href="mc_leonprof1994.php"><?php $result = mysqli_query($conn, $leonprof1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $leonprof1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mc_leonprof1994.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $leonprof1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->  

        <!-- saveprivryan1998 -->
        <div class="row">
            <div class="col-md-6 img-portfolio">
                <h3><a href="mc_saveprivateryan1998.php"><?php $result = mysqli_query($conn, $saveprivryan1998);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $saveprivryan1998);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mc_saveprivateryan1998.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $saveprivryan1998);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>

        <!-- schlist1993  -->
            <div class="col-md-6 img-portfolio">
                <h3><a href="mc_schindlerlist1993.php"><?php $result = mysqli_query($conn, $schlist1993);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $schlist1993);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mc_schindlerlist1993.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $schlist1993);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->

    <!-- shawredemption1994 -->
        <div class="row">
            <div class="col-md-6 img-portfolio">
                <h3><a href="mc_shawredemption1994.php"><?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mc_shawredemption1994.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>

    <!-- godfather1972 -->
            <div class="col-md-6 img-portfolio">
                <h3><a href="mc_godfather1972.php"><?php $result = mysqli_query($conn, $godfather1972);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $godfather1972);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mc_godfather1972.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $godfather1972);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
        </div>
    </div>

<!-- Footer -->
<?php
    include "footer.php";
?>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
