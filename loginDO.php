<!DOCTYPE html>
<html>
	<head>
		<title>GingerPeel - Logging in...</title>
		<link rel="stylesheet" type="text/css" href="includes/style.css" />
	</head>
	
	<body>
		<?php
		session_start();
		require_once("includes/connect.db.php");

		$user = mysql_real_escape_string($_POST['username']);
		$pass = md5($_POST['password']);
		$date = time();

		$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
		$result = mysql_query($sql);

		if(mysql_num_rows($result) == 1){
			$result2 = mysql_query($sql);
			
			while($rows = mysql_fetch_assoc($result2)){
				$user_id = $rows['id'];
				$email = $rows['email'];
			}
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_name'] = $user;
			$_SESSION['user_email'] = $email;
			$_SESSION['user_status'] = 1;
			
			$sql = "UPDATE users SET last_login = '$date' WHERE username = '$user'";
			mysql_query($sql) or die(mysql_error());
			
			echo "<h2>Welcome back " . $_SESSION['user_name'] . "!</h2>";
			echo 'Redirecting you...'
			?><meta http-equiv="refresh" content="3; URL='usercp.php'" /><?php
		}
		else{
			echo '<h1><center>Incorrect login details!</center></h1>';
			require_once('login.php');
		}


		#leenus'-- DROP TABLE details

		#'-- OR /*
		?>
	</body>
</html>