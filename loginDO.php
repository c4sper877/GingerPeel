<?php
session_start();

$user = $_POST['username'];
$pass = md5($_POST['password']);

mysql_connect('localhost', 'root', 'panzer') or die(mysql_error());
mysql_select_db('login');

$sql = "SELECT * FROM details WHERE username = '$user' AND password = '$pass'";
$result = mysql_query($sql);

if(mysql_num_rows($result) == 1){
	echo "Welcome back " . $user . "!";
}
else{
	echo '<h1><center>Incorrect login details!</center></h1>';
	require_once('login.php');
}


#leenus'-- DROP TABLE details

#'-- OR /*


?>