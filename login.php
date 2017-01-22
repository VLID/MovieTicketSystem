<?php
    include "mysql_config.php";
    include "function.php";

    session_start();

    if (isset($_COOKIE['UID']) && isset($_SESSION['UID']) && ($_COOKIE['UID'] == md5($_SESSION['username']))) {
        echo "<script>if (confirm(\"You've already logged in.\")) { window.location = \"mycmm.php\"; } else { window.location = \"mycmm.php\"; };</script>";
    }

    if (isset($_COOKIE['UID']) && !isset($_SESSION['UID'])) {
        setcookie('UID','',time()-60*60*24*1,NULL,NULL,NUll,TRUE);
    }

    $error = "";
   	
    $user = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

        if ($_POST['username'] == "") {
            $error = "You must input the username to login.";
        } elseif ($_POST['password'] == "") {
            $error = "You must input the password to login.";
        } else {
            $sql = "SELECT * FROM cmm_member";
            $result = mysqli_query($conn, $sql);
            $u_exist = false;
            $p_exist = false;
            $username = clean_input($_POST["username"]);
            $password = md5(clean_input($_POST['password']));
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    if ($row['username'] == $username){
                        $u_exist = true;
                        $user = $row['username'];
                    }
                    if ($row['password'] == $password){
                        $p_exist = true;
                    }
                }
            }
            if(!$u_exist){
                $error = "This username doesn't exist. <br><span class=\"text-muted\">please go to <a href=\"signup.php\">Sign up</a> page to create a new account.</span>";
            }else{
                if(!$p_exist){
                    $error = "Password invalid. Please try again.";
                }else{
                    setcookie('UID',md5($user),time()+60*60*24*1,NULL,NULL,NULL,TRUE);
                    $_SESSION['username'] = $user;
                    header("location: mycmm.php");
                }
            }
        }
    }

?>

<?php

   include "header.php";
   echo "<title>Login</title>";
   include "navigation.php";

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Login
            </h2>
            <ol class="breadcrumb">
                <li class="active">
                    Login
                </li>
                <li>
                    <a href="signup.php">Sign Up</a>
                </li>
            </ol>
        </div>
    </div>

    <?php
      echo "<div class=\"row text-center\"><div class=\"col-lg-12\"><h4 class=\"text-danger\">".$error."</h4></div></div>";
    ?>

   <div class="row">
      <div class="col-sm-12">
         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form-group form-group-lg">
               <div class="col-sm-offset-3 col-sm-6">
         	      <input id="usrinp" class="form-control" type = "text" name = "username" placeholder="Username" />
               </div>
            </div>
            <div class="form-group form-group-lg">
               <div class="col-sm-offset-3 col-sm-6">
         	      <input id="pswinp" class="form-control" type = "password" name = "password" placeholder="Password" AUTOCOMPLETE='OFF'/>
               </div>
            </div>
            <div class="form-group form-group-lg">
               <div class="col-sm-offset-3 col-sm-6">
         	      <button class="btn btn-primary btn-lg btn-block" type="submit" name="login" value="Login">Login</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="row text-center">
        <div class="col-lg-12">
            <h4 class="text-muted"> If you don't have an account, please <a href="signup.php">Sign Up</a>.</h4>
        </div>
   </div>
</div>

<!-- Footer -->
<?php
    include 'footer.php';
?> 

<script type="text/javascript">
   superplaceholder({
      el: usrinp,
      sentences: ['Username','ILoveDU','ILoveDenver','ILoveColorado','ILoveChina'],
      options: {
         letterDelay: 80,
         loop: true,
         sentenceDelay: 800,
         startOnFocus: false

      }
   })
   superplaceholder({
      el: pswinp,
      sentences: ['Password','*******','***********','*************','**********'],
      options: {
         letterDelay: 80,
         loop: true,
         sentenceDelay: 800,
         startOnFocus: false
      }
   })
</script>

<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>