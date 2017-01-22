<?php 
    include "mysql_config.php";
?>

    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/hint.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Movie Tickets System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Find A Movie <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="movie_newrelease.php">New Release</a>
                            </li>
                            <li>
                                <a href="movie_classics.php">Classics</a>
                            </li>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Find A Theater <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="theater_ac16.php"><?php $result = mysqli_query($conn, $ac16_theater); if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></a>
                            </li>
                            <li>
                                <a href="theater_bc12.php"><?php $result = mysqli_query($conn, $bc12_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></a>
                            </li>
                            <li>
                                <a href="theater_cc8.php"><?php $result = mysqli_query($conn, $cc8_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></a>
                            </li>
                            <li>
                                <a href="theater_dine16.php"><?php $result = mysqli_query($conn, $dine16_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></a>
                            </li>
                            <li>
                                <a href="theater_hr24.php"><?php $result = mysqli_query($conn, $hr24_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></a>
                            </li>
                            <li>
                                <a href="theater_wp24.php"><?php $result = mysqli_query($conn, $wp24_theater);if(!$result){die('Could not get data: '.mysql_error());}else{while($row = mysqli_fetch_array($result)){echo $row['theater'];}}?></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="mycmm.php">My Tickets</a>
                    </li>
                    

                    <li>
                        <a href="login.php">Log In</a>
                    </li>

                    <li>
                        <a href="signup.php">Sign Up</a>
                    </li>

                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>