<?php
    $hostname = "localhost";
    $database = "movie";
    $hostusername = "****";
    $password = "*******";
    $conn =  mysqli_connect($hostname, $hostusername, $password, $database);

    if (!$conn) {
		die("Error: " . mysqli_connect_error());
	} else {
		// movie
		// new release movie posters
		$mechanics2016    = 'SELECT * FROM cmm_movie WHERE movie_id = 1';
		$findingdory2016  = 'SELECT * FROM cmm_movie WHERE movie_id = 2';
		$captain2016   	  = 'SELECT * FROM cmm_movie WHERE movie_id = 3';
		$zootopia2016     = 'SELECT * FROM cmm_movie WHERE movie_id = 4';
		$secretpets2016   = 'SELECT * FROM cmm_movie WHERE movie_id = 11';
		$angrybirds2016	  =	'SELECT * FROM cmm_movie WHERE movie_id = 12';

		// classic movie posters
		$forrestgump1994	 = 'SELECT * FROM cmm_movie WHERE movie_id = 5';
		$leonprof1994   	 = 'SELECT * FROM cmm_movie WHERE movie_id = 6';
		$saveprivryan1998	 = 'SELECT * FROM cmm_movie WHERE movie_id = 7';
		$schlist1993		 = 'SELECT * FROM cmm_movie WHERE movie_id = 8';
		$shawredemption1994 = 'SELECT * FROM cmm_movie WHERE movie_id = 9';
		$godfather1972 	 = 'SELECT * FROM cmm_movie WHERE movie_id = 10';


		// theater
		// theater name and address
		$ac16_theater    = 'SELECT * FROM cmm_theater WHERE theater_id = 1';
		$bc12_theater    = 'SELECT * FROM cmm_theater WHERE theater_id = 2';
		$cc8_theater     = 'SELECT * FROM cmm_theater WHERE theater_id = 3';
		$dine16_theater  = 'SELECT * FROM cmm_theater WHERE theater_id = 4';
		$hr24_theater    = 'SELECT * FROM cmm_theater WHERE theater_id = 5';
		$wp24_theater    = 'SELECT * FROM cmm_theater WHERE theater_id = 6';

		//showtime
		$showtime_mechanics = 'SELECT * FROM cmm_movie_showtime WHERE movie_id = 1';
	}
?>