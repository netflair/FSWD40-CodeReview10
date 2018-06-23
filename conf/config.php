<?php

define('DBHOST', 'localhost');
define('DBUSER', 'cf');
define('DBPASS', '');
define('DBNAME', 'cr10_patrick_klostermann_biglibrary');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

if ( !$conn ) {
$connStatus = "disconnected"; 
mysqli_error();
} else if ($conn) {
    $connStatus = "connected";
}
echo "<script>console.log( 'DB-Connection: " . $connStatus . "' );</script>";
?>