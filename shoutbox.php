<?php
require_once("includes/connect.db.php");
if(!isset($_SESSION)){
	session_start();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="includes/style.css" />
		<link rel="stylesheet" type="text/css" href="includes/shoutbox.css" />
	</head>
<body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<center>
	<form method=post action=shoutbox.php>
		<input type=text size=75 maxlength=400 name="message" class="inputTextBox" placeholder="Enter Your Message..." required>
		<br />
		<input type=submit value="Send!" class="inputTextBox">
	</form>
</center>

<script>
    function refresh_div() {
        jQuery.ajax({
            url:'scripts/php/shoutbox.php',
            type:'POST',
            success:function(results) {
                jQuery(".shoutbox").html(results);
            }
        });
    }

    t = setInterval(refresh_div,1000);
</script>
<div class="shoutbox">

<center><img src="img/shoutbox/loading.gif" style="width:80px; height:80px;" /></center>
</div>




<?php
if(isset($_POST['message'])){
	$date = time();
	$message = mysql_real_escape_string($_POST['message']);
	$username = $_SESSION['user_name'];
	$sql = "INSERT INTO shoutbox (`username`, `message`, `time_sent`) VALUES ('$username', '$message', '$date')";
	mysql_query($sql) or die(mysql_error());
}

?>
