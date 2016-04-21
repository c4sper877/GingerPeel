<!DOCTYPE html>
<html>
	<head>
		<title>GingerPeel - Registering...</title>
		<link rel="stylesheet" type="text/css" href="includes/style.css" />
	</head>
	
	<body>
		<?php
		session_start();
		require_once("includes/connect.db.php");

		if(isset($_POST['username'], $_POST['email'], $_POST['password'])){
			$user = mysql_real_escape_string($_POST['username']);
			$email = mysql_real_escape_string($_POST['email']);
			$password = md5($_POST['password']);
			$date = time();

			$sql = "SELECT * FROM users WHERE username = '$user' OR email = '$email'";
			$result = mysql_query($sql);
				
			if(mysql_num_rows($result) > 0){
				die("This username or email is alread in use!");
			}
			else{
				$sql = "INSERT INTO users (username, password, email, registered, last_login) VALUES ('$user', '$password', '$email', '$date', '$date')";
				mysql_query($sql) or die(mysql_error());
				
				$sql = "SELECT * FROM users WHERE username = '$user' AND email = '$email'";
				$result = mysql_query($sql);
				
				while($rows = mysql_fetch_assoc($result)){
					$user_id = $rows['id'];
				}
				$_SESSION['user_id'] = $user_id;
				$_SESSION['user_name'] = $user;
				$_SESSION['user_email'] = $email;
				$_SESSION['user_status'] = 1;
				
				echo '<h2>Successfully added user #' . $user_id . ':' . $user . ' to the database!</h2>';
				echo 'Redirecting you...'
				?><meta http-equiv="refresh" content="3; URL='usercp.php'" /><?php
			}
		}
		else{
			die("Please ensure all fields are correctly filled.");
		}
		?>
		</body>
</html>