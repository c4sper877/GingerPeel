<?php
session_start();
require_once("includes/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>GingerPeel - User Control Panel</title>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="includes/14431.css" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="styles.css">
	<script src="scripts/js/menu.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	
	<link async href="http://fonts.googleapis.com/css?family=Atomic%20Age" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
<link async href="http://fonts.googleapis.com/css?family=Coda" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
	<style>

	</style>
</head>

<body onload="startTime()">
<?php
if(isset($_SESSION['user_name'])){
?>


	<div id="headerwrap">
		<div id="wrapper"><div class="box">
   <div class="ribbon"><span>Alpha</span></div>
			<div class="neon-text">GingerPeel v0.01a<br /></div>
        </div>
	</div>

        <div id="navigationwrap">
			<div id="navigationn">
				<div style="margin-left: 50; padding:4px; width=50%;">
					<div id='cssmenu'>
						<ul>
						   <li <?php if(isset($_GET['p']) && $_GET['p'] == "home") { echo "class='active'"; } ?>><a href='usercp.php?p=home'>Home</a></li>
						   <li <?php if(isset($_GET['p']) && $_GET['p'] == "forum") { echo "class='active'"; } ?>><a href='usercp.php?p=forum'>Forum</a></li>
						   <li <?php if(isset($_GET['p']) && $_GET['p'] == "play") { echo "class='active'"; } ?>><a href='usercp.php?p=play'>Play</a></li>
						   <li <?php if(isset($_GET['p']) && $_GET['p'] == "help") { echo "class='active'"; } ?>><a href='usercp.php?p=help'>Help/Support</a></li>
						   <li <?php if(isset($_GET['p']) && $_GET['p'] == "github") { echo "class='active'"; } ?>><a href='https://github.com/c4sper877/GingerPeel' target=new>Github</a></li>
						   <li <?php if(isset($_GET['p']) && $_GET['p'] == "donate") { echo "class='active'"; } ?>><a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=94EBZ38AG2FBN' target=new>Donate</a></li>
						</ul>
					</div>
				</div>
			</div>
        </div>
		
        <div id="contentliquid">
			<div id="contentwrap">
				<div id="content" >
					<?php
						if(!isset($_GET['p'])){
							include_once("home.php");
						}
						if(isset($_GET['p'])){
							if($_GET['p'] == "home"){
								include_once("home.php");
							}
							if($_GET['p'] == "forum"){
								include_once("forum.php");
							}
							if($_GET['p'] == "play"){
								include_once("gameFind.php");
							}
							if($_GET['p'] == "help"){
								include_once("help.php");
							}
							if($_GET['p'] == "donate"){
								include_once("donate.php");
							}
						}
						
						?>

				</div>
			</div>
		</div>
		       
		<div id="leftcolumnwrap">
			<div id="leftcolumn">
		            <p>
						<h2>..::Stats::..</h2>
					</p>
					<p>
						<?php
							getAllUserDetailsForSession();
							
							echo 'Username: ' . $_SESSION['user_name'];
							echo '<br />UserID: ' . $_SESSION['user_id'];
							echo '<br />IP Address: ' . $_SERVER['REMOTE_ADDR'];
							echo '<br/ >Last Login:' . date(' H:i - d M Y', $_SESSION['user_last_login']);
						?>
						<br />
						[<a href="#">Edit Profile</a>]
					</p>
					<p>
						<h2>..::Match History::..</h2>
					</p>
						Coming Soon...
					<p>
						<h2>..::Online Players::..</h2>
					</p>
						Coming Soon...
					<p>
					<hr width=135 noshade />
					<br />
						<h2><div id="clock"></div></h2>
					<br />
					<hr width=135 noshade />
					</p>
					<center>[<a href="logout.php">Logout</a>]
			</div>
        </div>
</div>
<script language=javascript src="scripts/js/clock.js"></script>
<?php }
else{
	echo '<h1 style="text-align:left;"><p>Please log in</p></h1>';
	include_once("login.php");
}
?>
</body>
</html>
