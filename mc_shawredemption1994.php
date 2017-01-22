<?php
    include "header.php";
    echo "<title>Classic Movies</title>";
    include "navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['movie'];}}?>
                    <small><?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['year'];}}?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides 750*500 -->

                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive" src="<?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster2'];}}?>" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster3'];}}?>" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster4'];}}?>" alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <h3>Movie Description</h3>
                <p><?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo "<b>Year: </b>".$row['year']."<br><b>Genre : </b>". $row['genre']. "<br><b>Duration : </b>". $row['duration'] ."<br> <b>Director :</b> ". $row['director']."<br> <b>Star(s) :</b> ". $row['star']; }}?></p>
                <br>
                <p><?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['description'];}}?></p>
                    <br>
                    <a href="movie_classics.php"><h5>Back to Classics Movie List</h5></a>
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

    <script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>
