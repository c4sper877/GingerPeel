<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/shoutbox.css" />
</head>
<body>
<div id=wrapper>
<?php
require_once('../../includes/connect.db.php');

//SET EMOTICONS
//EMOTICONS PROVIDED BY http://emojione.com/developers
$chars = array(":)", ":(", ":D", ":/", ":|", "D:", ":x", ":'D", ":s", "[red]", "[black]", "[pink]", "[green]", "[blue]");
$icons = array(	"<img src='img/shoutbox/emoticons/1f642.png'>",	// :)
						"<img src='img/shoutbox/emoticons/1f641.png'>",	// :(
						"<img src='img/shoutbox/emoticons/1f600.png'>", 	// :D
						"<img src='img/shoutbox/emoticons/1f615.png'>", 	// :/
						"<img src='img/shoutbox/emoticons/1f610.png'>", 	// :|
						"<img src='img/shoutbox/emoticons/1f627.png'>",	// D:
						"<img src='img/shoutbox/emoticons/1f618.png'>", 	// :x
						"<img src='img/shoutbox/emoticons/1f602.png'>", 	// :'D
						"<img src='img/shoutbox/emoticons/1f601.png'>", 	// :s
						
						"<font color='red'>",	
						"<font color='black'>",
 						"<font color='pink'>", 
						"<font color='green'>", 
						"<font color='blue'> 

					");

//SET UP DATABASE QUERY
$sql = "SELECT * FROM shoutbox ORDER BY id DESC LIMIT 100";
$result = mysql_query($sql);

//START TABLE
echo '<table border=0>';
//PROCESS DATA AND CREATE TABLE ROWS
while($rows = mysql_fetch_assoc($result)){
	$sb_username = $rows['username'];
	$sb_message = str_replace($chars, $icons, htmlentities($rows['message']));
	$sb_sent_time = date('d/M H:i', $rows['time_sent']);
	echo '<tr><td><i>(' . $sb_sent_time . ')</i></td><td><b>&lt' . $sb_username . '&gt</b>: </td><td><div class=message>' . $sb_message . '</message></td></tr>';
}
//END TABLE
echo '</table>';


?>
</div>