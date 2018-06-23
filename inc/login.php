<?php
//redirect when already logged in
if ( isset($_SESSION['user'])!="" ) {
 header("Location: home.php?publishers=");
 exit;
}

### action on submit
if (isset ($_POST['login']) ){

    //clear inputs
    $username = trim ($_POST['username'] );
    $username = strip_tags ($username);
    $username = htmlspecialchars ($username);

    $pass = trim ($_POST['pass']);
    $pass = strip_tags ($pass);
    $pass = htmlspecialchars ($pass);


    //input validation
    if (empty ($username) ){
        $error = true;
        $usernameErrorlog = "Please enter your username.";
    }

    if (empty ($pass) ){
        $error = true;
        $passErrorlog = "Please enter your password.";
    }

    //No Error = continue
    if (!$error){

        //hash password
        $pass = hash('sha256', $pass);
        //get data
        $login = "SELECT user_id, username, user_pass FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $login);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        //login
        if ($count == 1 && $row['user_pass'] == $pass){
            $_SESSION['user'] = $row['user_id'];
            header("Location: home.php?publishers=");
        } else {
            $errMSGlog = "Incorrect Credentials.";
        }
    }
}

?>
