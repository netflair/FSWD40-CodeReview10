<?php
### action on submit ##
if (isset ($_POST['register']) ){

    //sanitize input
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $username = trim ($_POST['username'] );
    $username = strip_tags ($username);
    $username = htmlspecialchars ($username);

    $pass = trim ($_POST['pass']);
    $pass = strip_tags ($pass);
    $pass = htmlspecialchars ($pass);

    $firstname = trim ($_POST['firstname'] );
    $firstname = strip_tags ($firstname);
    $firstname = htmlspecialchars ($firstname);

    $lastname = trim ($_POST['lastname'] );
    $lastname = strip_tags ($lastname);
    $lastname = htmlspecialchars ($lastname);


    ## input validation ##
    //email
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        //check if email exists
        $checkmail = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $checkmail);
        $count = mysqli_num_rows($result);

        if($count!=0){
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    //username
    if (empty ($username) ){
        $error = true;
        $usernameError = "Please enter your username.";
    }else if (strlen ($username) < 3 ){
        $error = true;
        $usernameError = "Name must have at least 3 characters";
    } else {
        $usercheck = "SELECT username FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $usercheck);
        $count = mysqli_num_rows($result);

        if($count != 0){
            $error = true;
            $usernameError = "Provided Username is already in use.";
        }
    }
    //password
    if (empty($pass)){
        $error = true;
        $passError = "Please enter password.";
    } else if(strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters.";
    }
    //hash password
    $pass = hash('sha256', $pass);
    //first name
    if (empty ($firstname) ){
        $error = true;
        $firstnameError = "Please enter your first name.";
    }else if (strlen ($firstname) < 3 ){
        $error = true;
        $firstnameError = "Name must have at least 3 characters";
    }
    //last name
    if (empty ($lastname) ){
        $error = true;
        $lastnameError = "Please enter your last name.";
    }else if (strlen ($lastname) < 3 ){
        $error = true;
        $lastnameError = "Name must have at least 3 characters";
    }

    ## No Error = continue ##
    if (!$error){
        $reg = "INSERT INTO users (email, username, user_pass, first_name, last_name, user_role)
                VALUES ('$email', '$username', '$pass', '$firstname', '$lastname', 'user')";
        
        $result = mysqli_query($conn, $reg);

        if ($result) {
            $errTyp = "success";
            $errMSG = "You have successfully created a useraccount";

            unset($email);
            unset($username);
            unset($pass);
            unset($firstname);
            unset($lastname);
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, please try again later.";
        }
    }
}
?>