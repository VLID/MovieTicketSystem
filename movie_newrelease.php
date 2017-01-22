<?php
    include "header.php";
    echo "<title>New Release Movies</title>";
    include "navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"align="center">New Release Movies</h1>
            </div>
        </div>
        <!-- /.row -->


    <!-- mechanics 2016 -->
        <div class="row">
            <div class="col-md-6 img-portfolio">
                <h3><a href="mn_mechanics2016.php"><?php $result = mysqli_query($conn, $mechanics2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $mechanics2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?><br><br>
                </p>
                <a href="mn_mechanics2016.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $mechanics2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster2'];}}?>" alt="">
                </a>
            </div>
    <!-- captain 2016 -->
            <div class="col-md-6 img-portfolio">
                <h3><a href="mn_captaincivilwar2016.php"><?php $result = mysqli_query($conn, $captain2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $captain2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mn_captaincivilwar2016.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $captain2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster2'];}}?>" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->  

        <!-- Secret life of pets -->
        <div class="row">
            <div class="col-md-6 img-portfolio">
                <h3><a href="mn_thesecretlifeofpets2016.php"><?php $result = mysqli_query($conn, $secretpets2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $secretpets2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mn_thesecretlifeofpets2016.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $secretpets2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>

    <!-- Zootopia  -->
            <div class="col-md-6 img-portfolio">
                <h3><a href="mn_zootopia2016.php"><?php $result = mysqli_query($conn, $zootopia2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $zootopia2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?><br><br>
                </p>
                <a href="mn_zootopia2016.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $zootopia2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster2'];}}?>" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->

    <!-- finding dory -->
        <div class="row">
            <div class="col-md-6 img-portfolio">
                <h3><a href="mn_findingdory2016.php"><?php $result = mysqli_query($conn, $findingdory2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $findingdory2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mn_findingdory2016.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $findingdory2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster2'];}}?>" alt="">
                </a>
            </div>
    
    <!-- angry birds 2016-->
            <div class="col-md-6 img-portfolio">
                <h3><a href="mn_angrybirds2016.php"><?php $result = mysqli_query($conn, $angrybirds2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?></a>
                </h3>
                <p><?php $result = mysqli_query($conn, $angrybirds2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?>
                </p>
                <a href="mn_angrybirds2016.php">
                <img class="img-responsive img-hover" src="<?php $result = mysqli_query($conn, $angrybirds2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
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

