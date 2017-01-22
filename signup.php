<?php
	include "mysql_config.php";
	include "function.php";

	session_start();

	if (isset($_COOKIE['UID']) && isset($_SESSION['UID'])) {
      	echo "<script>if (confirm(\"You've already logged in.\")) { window.location = \"mycmm.php\"; } else { window.location = \"mycmm.php\"; };</script>";
   	}

   	if (isset($_COOKIE['UID']) && !isset($_SESSION['UID'])) {
   		setcookie('UID', '', time()-(60*60*24*1), NULL, NULL, NULL, TRUE);
   	}

	$error = "";
	$success = false;

	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {

      if (!isset($_POST['newusername']) && !isset($_POST['newpassword']) && !isset($_POST['repassword'])) {
         die();
      }

      	$sql = "SELECT * FROM cmm_member";
		$result = mysqli_query($conn, $sql);
		$exist = false;
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				if ($row['username'] == clean_input($_POST["newusername"])){
					$exist = true;
				}
			}
		}
		if($exist){
			$error = "This username has already existed. Please change another one.";
			$success = false;
		}else{
			$user = clean_input($_POST['newusername']);
			if (!preg_match("/^[a-zA-Z0-9]{6,}$/", $user)) {
				$error = "The username doesn't meet the requests, please try again.";
				$success = false;
			}else{
				if($_POST['newpassword'] != $_POST['repassword']){
	      			$error = "Password doesn't match, try again!";
	      			$success = false;
	      		}else{
	      			$submittedPassword = clean_input($_POST['newpassword']);
	      			if (!preg_match("/(?=[a-zA-Z0-9]*?[A-Z])(?=[a-zA-Z0-9]*?[a-z])(?=[a-zA-Z0-9]*?[0-9])[a-zA-Z0-9]{6,}$/", $submittedPassword)) {
	      				$error = "Your password is not allowed. Please follow the requests.";
	      				$success = false;
	      			}else{
	      				$submittedPassword = md5($submittedPassword);
		        		$sql = "INSERT INTO cmm_member (username, password) VALUES "."('$user','$submittedPassword')";
		        		mysqli_query($conn,$sql);
		        		$success = true;
		        		$sql1 = "CREATE TABLE ".$user."Cart ( CID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, movie_id int(11) NOT NULL, movie_showtime_id int(11) NOT NULL, theater_id int(11) NOT NULL, ticketPrice int(11) NOT NULL, ticketQuantity int(11) NOT NULL, totalPrice int(11) NOT NULL )";
		        		mysqli_query($conn, $sql1);
		        		$sql2 = "CREATE TABLE ".$user."Order ( OID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, movie_id int(11) NOT NULL, movie_showtime_id int(11) NOT NULL, theater_id int(11) NOT NULL, ticketQuantity int(11) NOT NULL, totalPrice int(11) NOT NULL, redeemCode varchar(255) COLLATE utf8_unicode_ci NOT NULL )";
		        		mysqli_query($conn, $sql2);
	      			}
	      		}
			}
		}
   	}

?>

<?php

   include "header.php";
   echo "<title>Sign Up</title>";
   include "navigation.php";

?>

<div class="container">
	<div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Sign Up
            </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="login.php">Login</a>
                </li>
                <li class="active">
                    Sign Up
                </li>
            </ol>
        </div>
    </div>
    
    <?php 
		if($success){
			echo "<script>if (confirm(\"You created an account successfully, please login.\")) { window.location = \"login.php\"; };</script>";
		}else{
			echo "<div class=\"row text-center\"><div class=\"col-lg-12\"><h4 class=\"text-danger\">".$error."</h4></div></div>";
		}
	?>

	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<div class="form-group form-group-lg">
					<!-- <label for="nusrinp" class="col-sm-offset-2 col-sm-2 control-label">New Username</label> -->
					<div class="col-sm-offset-3 col-sm-6">
						<input id="nusrinp" class="form-control"  type="text" name="newusername" placeholder="New Username" />	
					</div>
				</div>
				<div class="form-group form-group-lg">
					<!-- <label for="npswinp" class="col-sm-offset-2 col-sm-2 control-label">New Password</label> -->
					<div class="col-sm-offset-3 col-sm-6">	
						<input id="npswinp" class="form-control" type="password" name="newpassword" placeholder="New Password" autocomplete="off" />
					</div>
				</div>
				<div class="form-group form-group-lg">
					<!-- <label for="rnpswinp" class="col-sm-offset-2 col-sm-2 control-label">Retype Password</label> -->
					<div class="col-sm-offset-3 col-sm-6">
						<input id="rnpswinp" class="form-control"  type="password" name="repassword" placeholder="Confirm Password" autocomplete="off" />
					</div>
				</div>
				<div class="form-group form-group-lg">
					<div class="col-sm-offset-3 col-sm-6">
						<button class="btn btn-primary btn-lg btn-block" type="submit" name="signup" value="Sign Up">Sign Up</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-12 text-warning">
        	<div class="col-lg-offset-3 col-lg-6">
            	<p>* <b>Username</b> must have minimum <b>6</b> characters, only <b>A-Z, a-z, 0-9</b>, no special characters allowed.</p>
            	<p>* <b>Password</b> must have minimum <b>6</b> characters containing at least <b>1 uppercase letter</b>, <b>1 lowercase letter</b>, and <b>1 number</b>, no special characters allowed.</p>
            </div>
        </div>
    </div>
	<div class="row text-center">
        <div class="col-lg-12">
            <h4 class="text-muted text-center"> If you already have an account, please <a href="login.php">Login</a>.</h4>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
    include 'footer.php';
?>

<script type="text/javascript">
   superplaceholder({
      el: nusrinp,
      sentences: ['At least 6 characters', 'Only A-Z, a-z, 0-9', 'No special characters allowed'],
      options: {
         letterDelay: 50,
         loop: true,
         sentenceDelay: 800,
         startOnFocus: true

      }
   })
   superplaceholder({
      el: npswinp,
      sentences: ['Select at least 6 characters from A-Z, a-z, 0-9', 'Must have 1 upper letter', '1 lower letter and 1 number', 'No special characters allowed'],
      options: {
         letterDelay: 50,
         loop: true,
         sentenceDelay: 1000,
         startOnFocus: true
      }
   })
   superplaceholder({
      el: rnpswinp,
      sentences: ['Confirm the password please'],
      options: {
         letterDelay: 50,
         loop: true,
         sentenceDelay: 1000,
         startOnFocus: true
      }
   })
</script>

<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>