<?php
    include "mysql_config.php";
    include "function.php";

    session_start();

    $rightPerson = false;

    if (isset($_COOKIE['UID']) && isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        $_SESSION['UID'] = $_COOKIE['UID'];
        $adminUser_db = "SELECT * FROM adminUser WHERE username='".$user."'";
        $result = mysqli_query($conn, $adminUser_db);
        if (mysqli_num_rows($result) > 0) {
            $rightPerson = true;
        } else {
            echo "<script>if (confirm(\"You don't have the permission to use this page.\")) { window.location = \"mycmm.php\"; } else { window.location = \"mycmm.php\"; };</script>";
        }
    } else {
        echo "<script>if (confirm(\"You didn't login. Please login first.\")) { window.location = \"login.php\"; } else { window.location = \"login.php\"; };</script>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify']) && $rightPerson) {
        $r = clean_input($_POST['redeemCode']);
        $sql = "SELECT * FROM redeem_code_db WHERE redeemCode='".$r."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                if ($row['used'] == 0) {
                    $valueR = base64_decode($row['redeemCode']);
                    $sql2 = "UPDATE redeem_code_db SET value='".$valueR."', used=1 WHERE redeemCode='".$row['redeemCode']."'";
                    mysqli_query($conn, $sql2);
                    echo "<script>confirm(\"The Redeem Code is valid. Enjoy the movie!\");</script>";
                } else {
                    echo "<script>confirm(\"The Redeem Code was used. Please try another one.\");</script>";
                }
            }
        } else {
            echo "<script>confirm(\"The Redeem Code is invalid.\");</script>";
        }
    }
?>

<?php

   include "header.php";
   echo "<title>Redeem Code</title>";
   include "navigation.php";

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Redeem Code
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group form-group-lg">
                    <div class="col-sm-offset-3 col-sm-6">
                        <input id="RC" class="form-control" type="text" name="redeemCode" />
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button class="btn btn-danger btn-lg btn-block" type="submit" name="verify">Verify</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-lg-12">
            <h4 class="text-muted">Back to <a href="mycmm.php">Home</a></h4>
        </div>
    </div>
</div>


<!-- Footer -->
<?php
    include 'footer.php';
?> 

<script type="text/javascript">
   superplaceholder({
      el: RC,
      sentences: ['Input your Redeem Code here...'],
      options: {
         letterDelay: 80,
         loop: true,
         sentenceDelay: 1000,
         startOnFocus: false
      }
   })
</script> 

<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
