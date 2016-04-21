<?php
require_once("connect.db.php");


function getAllUserDetailsForSession(){
	if(isset($_SESSION['user_name'], $_SESSION['user_status']) && $_SESSION['user_status'] !== 0){
		$user = $_SESSION['user_name'];
		
		$sql = "SELECT * FROM users WHERE username = '$user'";
		$result = mysql_query($sql);
		
		while($rows = mysql_fetch_assoc($result)){
			$user_id = $rows['id'];
			$user_name = $rows['username'];
			$user_email = $rows['email'];
			$user_last_login = $rows['last_login'];
		}
		$_SESSION['user_id'] = $user_id;
		$_SESSION['user_name'] = $user;
		$_SESSION['user_email'] = $user_email;
		$_SESSION['user_last_login'] = $user_last_login;
	}
	else
		die("User session not found!");
	
}




?>