<?php
session_start();

require_once("includes/globals.php");

if(isset($_SESSION['username']) && $_SESSION['logged'] == True){
	header("Location: user.php");
	exit;
}
else{ ?>
	
<html>
	<head>
		<title>GingerPeel v<?php echo $GLOBAL__Current_Version; ?> - Welcome</title>
		<link rel="stylesheet" type="text/css" src="includes/style.css" />
		<style>
			body{
				background-image: url("img/bg_steel.jpg");
				background-color: #cccccc;
			}
						html, body, #wrapper {
						   height:100%;
						   width: 100%;
						   margin: 0;
						   padding: 0;
						   border: 0;
						}
						#wrapper td {
							horizontal-align: center;

						   text-align: center;
						}
						
						.modern {
			  display: inline-block;
			  margin: 10px;
			  padding: 8px 15px;
			  background: #B8ED01;
			  border: 1px solid rgba(0,0,0,0.15);
			  border-radius: 4px;
			  transition: all 0.3s ease-out;
			  box-shadow:
				inset 0 1px 0 rgba(255,255,255,0.5),
				0 2px 2px rgba(0,0,0,0.3),
				0 0 4px 1px rgba(0,0,0,0.2);

			  /* Font styles */
			  text-decoration: none;
			  text-shadow: 0 1px rgba(255,255,255,0.7);
			}

			.modern:hover  { background: #C7FE0A; }

			.embossed-link {
			  box-shadow: 
				inset 0 3px 2px rgba(255,255,255,.22), 
				inset 0 -3px 2px rgba(0,0,0,.17), 
				inset 0 20px 10px rgba(255,255,255,.12), 
				0 0 4px 1px rgba(0,0,0,.1), 
				0 3px 2px rgba(0,0,0,.2);
			}

			.modern.embossed-link {
			  box-shadow:
				inset 0 1px 0 rgba(255,255,255,0.5),
				0 2px 2px rgba(0,0,0,0.3),
				0 0 4px 1px rgba(0,0,0,0.2),
				inset 0 3px 2px rgba(255,255,255,.22), 
				inset 0 -3px 2px rgba(0,0,0,.15), 
				inset 0 20px 10px rgba(255,255,255,.12), 
				0 0 4px 1px rgba(0,0,0,.1), 
				0 3px 2px rgba(0,0,0,.2);
			}

			.modern.embossed-link:active {
			  box-shadow: 
				inset 0 -2px 1px rgba(255,255,255,0.2),
				inset 0 3px 2px rgba(0,0,0,0.12);
			}
		</style>
	</head>
	
	<body>
	   <table id="wrapper" border=0>
			<tr>
				<td>
					<img src="img/logo_index.png" alt="" /> 
					<br/> 
					<h2>
						<div class="modern embossed-link"><a href="index.php?p=login">Login</a></div> <div class="modern embossed-link"><a href="index.php?p=register">Register</div></a>
						<br />
						<?php
							if(isset($_GET['p'])){
								if($_GET['p'] == "login"){
									#echo '<p><hr noshade width=25% /></p>';
									include_once('login.php');
								}
								if($_GET['p'] == "register"){
									#echo '<p><hr noshade width=25% /></p>';
									include_once('signup.php');
								}
							}
						?>
					</h2>
				</td>
			</tr>
		</table>
	</body>
</html>
	
<?php
}




?>