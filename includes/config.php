<?php
$db_name = "shirt";
$db_username = "root";
$db_password ="";
$db_host = "localhost";

try{
$con = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username,$db_password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
	echo $e->getMessage();
}