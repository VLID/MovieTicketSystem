<?php
    include "header.php";
    echo "<title>Movie Theater</title>";
    include "navigation.php";
?>

<body>
<div class="container">

<!-- Page Heading/Breadcrumbs -->
<h1 class="page-header"align="center"><?php $result = mysqli_query($conn, $cc8_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></h1>

<p>Address: <?php $result = mysqli_query($conn, $cc8_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['address'];}}?></p>

<p>Phone number: <?php $result = mysqli_query($conn, $cc8_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['phone_number'];}}?></p>

<img class="img-responsive1" src="<?php $result = mysqli_query($conn, $cc8_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['poster2'];}}?>" alt="">

<br>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3069.0554827593473!2d-104.95494408438913!3d39.71593580588389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c7e908f66825f%3A0xd04e48e09c3503c5!2sAMC+Cherry+Creek+8!5e0!3m2!1sen!2sus!4v1477901324608" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


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


