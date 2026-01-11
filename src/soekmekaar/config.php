<?php

$db_name = 'Helpmekaar';
$dbhost = 'mysql-db';
$dbuser = 'sgwe5ijvp838';
$dbpass = 'Proverbs<17<27!';

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $db_name);

// Check connection
if (mysqli_connect_errno()) {
    // die('Could not connect to: ' . mysqli_connect_error());
}
$retval = mysqli_select_db($con, $db_name);
if ($retval) {

}
?>