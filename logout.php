<?php
session_start();

if(isset($_SESSION)){
	session_destroy();
?>
	<center><h1>Logging Out....</h1></center>
	<meta http-equiv="refresh" content="3; URL='index.php'" />
<?php
}
else{
	echo "You need to be logged in to sign out!";
}



?>