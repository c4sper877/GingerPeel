<?php

$user = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordrepeat = $_POST['passwordrepeat'];

if($password == $passwordrepeat){
	mysql_connect("localhost", "root", "panzer") or die (mysql_error());
	mysql_select_db("login");
	
	$sql = "SELECT * FROM details WHERE username = '$user' OR email = '$email'";
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result) > 0){
		die("This username or email is alread in use!");
	}
	else{
		$password = md5($password);
		$sql = "INSERT INTO details (username, password, email) VALUES ('$user', '$password', '$email')";
		mysql_query($sql) or die(mysql_error());
		echo "Successfully added user " . $user . "to the database!";
	}
	
	
	
	
	
}
else{
	echo "Passwords do not match!";
}

?> 