<?php
    include "header.php";
    echo "<title>Movie Tickets System</title>";
    include "navigation.php";
?>

<!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
				<a href="mn_mechanics2016.php">
                <div class="fill" style="background-image:url('<?php $result = mysqli_query($conn, $mechanics2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>')">      
                </div></a>
            </div>

            <div class="item">
				<a href="mn_findingdory2016.php">
                <div class="fill" style="background-image:url('<?php $result = mysqli_query($conn, $findingdory2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>')">
                </div></a>
            </div>

            <div class="item">
				<a href="mn_zootopia2016.php">
                <div class="fill" style="background-image:url('<?php $result = mysqli_query($conn, $zootopia2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>')">
                </div></a>
            </div>

            <div class="item">
                <a href="mn_captaincivilwar2016.php"> 
                <div class="fill" style="background-image:url('<?php $result = mysqli_query($conn, $captain2016);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>')">
                </div></a>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

        <!-- Find A Theater -->
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="page-header">Find A Theater</h2>
            </div>
        </div>

        <div class="row">
            <!-- amc cc8 -->
            <div class="col-md-4 col-sm-6 text-center">
                <a href="theater_cc8.php">
                <img class="img-responsive2 img-circle img-hover img-center" src="<?php $result = mysqli_query($conn, $cc8_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                <h4><?php $result = mysqli_query($conn, $cc8_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></h4></a>
                <p>Address: <?php $result = mysqli_query($conn, $cc8_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['address'];}}?></p>
            </div>

            <!-- amc bc 12 -->
            <div class="col-md-4 col-sm-6 text-center">
                <a href="theater_bc12.php">
                <img class="img-responsive2 img-circle img-hover img-center" src="<?php $result = mysqli_query($conn, $bc12_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                <h4><?php $result = mysqli_query($conn, $bc12_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></h4></a>
                <p>Address: <?php $result = mysqli_query($conn, $bc12_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['address'];}}?></p>
            </div>

            <!-- amc ac 16 -->
            <div class="col-md-4 col-sm-6 text-center">
                <a href="theater_ac16.php">            
                <img class="img-responsive2 img-circle img-hover img-center" src="<?php $result = mysqli_query($conn, $ac16_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">             
                <h4><?php $result = mysqli_query($conn, $ac16_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></h4></a>
                <p>Address: <?php $result = mysqli_query($conn, $ac16_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['address'];}}?></p>
            </div>
        </div>

        <div class="row">
            <!-- amc wp 24 -->
            <div class="col-md-4 col-sm-6 text-center">
                <a href="theater_wp24.php">            
                <img class="img-responsive2 img-circle img-hover img-center" src="<?php $result = mysqli_query($conn, $wp24_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">            
                <h4><?php $result = mysqli_query($conn, $wp24_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></h4></a>
                <p>Address: <?php $result = mysqli_query($conn, $wp24_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['address'];}}?></p>
            </div>            
            
            <!-- amc dine 16 -->
            <div class="col-md-4 col-sm-6 text-center">
                <a href="theater_dine16.php">            
                <img class="img-responsive2 img-circle img-hover img-center" src="<?php $result = mysqli_query($conn, $dine16_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">           
                <h4><?php $result = mysqli_query($conn, $dine16_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></h4></a>
                Address: <?php $result = mysqli_query($conn, $dine16_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['address'];}}?></p>
            </div> 

            <!-- amc hr 24 -->
            <div class="col-md-4 col-sm-6 text-center">
                <a href="theater_hr24.php">            
                <img class="img-responsive2 img-circle img-hover img-center" src="<?php $result = mysqli_query($conn, $hr24_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">               
                <h4><?php $result = mysqli_query($conn, $hr24_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></h4></a>
                <p>Address: <?php $result = mysqli_query($conn, $hr24_theater);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['address'];}}?></p>
            </div>   
        </div>

        <br>
        <!-- /.row -->

         <!-- Portfolio Section -->
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="page-header">Classic Movies</h2>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-4 col-sm-6">
                <a href="mc_forrestgump1994.php">
                    <img class="img-responsive img-portfolio img-hover" src="<?php $result = mysqli_query($conn, $forrestgump1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="mc_leonprof1994.php">
                    <img class="img-responsive img-portfolio img-hover" src="<?php $result = mysqli_query($conn, $leonprof1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="mc_saveprivateryan1998.php">
                    <img class="img-responsive img-portfolio img-hover" src="<?php $result = mysqli_query($conn, $saveprivryan1998);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="mc_schindlerlist1993.php">
                    <img class="img-responsive img-portfolio img-hover" src="<?php $result = mysqli_query($conn, $schlist1993);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="mc_shawredemption1994.php">
                    <img class="img-responsive img-portfolio img-hover" src="<?php $result = mysqli_query($conn, $shawredemption1994);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="mc_godfather1972.php">
                    <img class="img-responsive img-portfolio img-hover" src="<?php $result = mysqli_query($conn, $godfather1972);if(!$result){die('Could not get data: '.mysqli_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster1'];}}?>" alt="">
                </a>
            </div>
        </div>
    </div>
        <!-- /.row -->

        <!-- Footer -->
    <?php
        include 'footer.php';
    ?>                

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
