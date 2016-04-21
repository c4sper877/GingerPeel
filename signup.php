<!DOCTYPE html>
<html>
	<head>
		<title>GingerPeel - Register</title>
				<link rel="stylesheet" type="text/css" href="includes/style.css" />
	</head>
	
	<body>
		<div align=center class="transbox" style="text-align:right; padding: 15px 20px 15px 20px; display:inline-block;">
			<table>
				<tr>
					<form action=signupDO.php method=post>
					<td><h2>Username: </h2></td>
					<td><input type=text name=username class="inputTextBox" required></td>
				</tr>
				<tr>
					<td><h2>Password: </h2></td>
					<td><input type=password name=password class="inputTextBox" required></td>
				</tr>
				<tr>
					<td><h2>Email: </h2></td>
					<td><input type=email name=email class="inputTextBox" required></td>
				</tr>
				<tr>
					<td colspan=2><p align=right><input type=submit name=submit value="Login!" class="inputTextBox"></p></td>
				</tr>
				</form>
			</table>
		</div>
	
	
	</body>
</html>