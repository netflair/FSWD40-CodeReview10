<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Jquerry -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Custom Style -->
    <link rel="stylesheet" href="css/style.css">
    <title>Library|<?php echo $title?></title>
</head>
<body>
    <!-- Logged out user menu -->
    <?php 
    if (!isset($_SESSION['user'])) { ?>   
        <nav class="navbar navbar-expand-md navbar-dark bg-lib">
            <a href="index.php" class="navbar-brand">Big Library</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar6">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-stretch" id="navbar6">
                <ul class="navbar-nav ml-auto">
                    <form id="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                        <!--Username-->
                        <div class="log-input">
                            <input class="form-control" type="text" name="username" placeholder="username" maxlength="50">
                            <span class="err text-danger"><?php echo $usernameErrorlog ?><?php if ( isset($errMSGlog) ) { echo $errMSGlog; }?></span>
                        </div>
                        <!--Password-->
                        <div class="log-input">
                            <input class="form-control" type="password" name="pass" placeholder="password" >
                            <span class="err text-danger"><?php echo $passErrorlog ?></span>
                        </div>
                        <!--Submit-->
                        <div class="log-input">
                        <input class=" form-control btn btn-primary" type="submit" name="login" value="Log in">
                        </div>
                    </form>
                    
                </ul>
            </div>
        </nav>
    <?php } ?>

    <!-- Logged in user menu -->
    <?php 
    if ( isset($_SESSION['user'])!="" ) { ?>   
        <nav class="navbar navbar-expand-md navbar-dark bg-lib">
            <a href="home.php?publishers=" class="navbar-brand">Big Library</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar6">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-stretch" id="navbar6">
              
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-danger" href="logout.php?logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
    <?php } ?>
