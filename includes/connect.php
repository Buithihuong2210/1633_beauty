<?php
$dbhost = "localhost";
$dbuser = "root";
$dbname = "mystore";
$con = mysqli_connect($dbhost,$dbuser,'',$dbname);
if(!$con)
{

	die("failed to connect!");
}
?>