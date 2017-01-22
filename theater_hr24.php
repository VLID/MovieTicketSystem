<?php
    include "header.php";
    echo "<title>Movie Theater</title>";
    include "navigation.php";
?>


<body>
<!-- Page Content -->
<div class="container">

<!-- Page Heading/Breadcrumbs -->
<h1 class="page-header"align="center"><?php $result = mysqli_query($conn, $hr24_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></h1>

<p>Address: <?php $result = mysqli_query($conn, $hr24_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['address'];}}?></p>

<p>Phone number: <?php $result = mysqli_query($conn, $hr24_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['phone_number'];}}?></p>

<img class="img-responsive1" src="<?php $result = mysqli_query($conn, $hr24_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster2'];}}?>" alt="">

<br>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3704.8030407722254!2d-104.99403568439247!3d39.559880115225695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c82347bea6995%3A0x3aa636630dea1d47!2sAMC+Highlands+Ranch+24!5e1!3m2!1sen!2sus!4v1477901804768" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


</body>

<!-- Footer -->
<?php
    include "footer.php";
?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


