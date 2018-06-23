<?php
//start buffer
ob_start();
//create new session
session_start();

//require database connection
require_once('conf/config.php');

//Title for HTML
$title = "Home";

//redirect when already logged in
if ( isset($_SESSION['user'])!="" ) {
 header("Location: home.php?publishers=");
 exit;
}

//set defaults
$error = false;
$emailError = "";
$usernameError = "";
$usernameErrorlog = "";
$passError = "";
$passErrorlog = "";
$firstnameError = "";
$lastnameError = "";

include('inc/register.php');
include('inc/login.php');
?>
<!-- include <html> ... <body> -->
<?php include('inc/html_start.php'); ?>
<section id="reg-section">
    <div class="container">
        <h2 class="text-center">Register now for free, to have access <br>to our rich media collection!</h2>
        <form id="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <!--Mail-->
            <input class="form-control" type="email" name="email" placeholder="email" maxlength="50">
            <span class="reg-err text-warning"><?php echo $emailError ?></span>
            <!--Username-->
            <input class="form-control" type="text" name="username" placeholder="username" maxlength="50">
            <span class="reg-err text-warning"><?php echo $usernameError ?></span>
            <!--Password-->
            <input class="form-control" type="password" name="pass" placeholder="password" >
            <span class="reg-err text-warning"><?php echo $passError ?></span>
            <!--firstname-->
            <input class="form-control" type="text" name="firstname" placeholder="firstname" maxlength="50">
            <span class="reg-err text-warning"><?php echo $firstnameError ?></span>
            <!--lastname-->
            <input class="form-control" type="text" name="lastname" placeholder="lastname" maxlength="50">
            <span class="reg-err text-warning"><?php echo $lastnameError ?></span>
            <!--Submit-->
            <input class=" form-control btn-lib" type="submit" name="register" value="Register">
        </form>
    </div>
</section>
<!-- include </body> ... </html> -->
<?php include('inc/html_end.php'); 
$conn->close();
ob_end_flush();
?>
