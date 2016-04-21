<?php
session_start();
require_once('../../includes/connect.db.php');

$current_game_id = $_SESSION['current_game_id'];

$query = mysql_query("SELECT * FROM games WHERE id = '$current_game_id'") or die(mysql_error());

while ($row = mysql_fetch_assoc($query)) {
	


	echo 'Game ID:' . $current_game_id . '<br />';
	
	$player_2 = $row['player_2'];
	
	if($player_2 !== null){
		echo $player_2 . " has joined!";
	}
	else{
		echo 'Waiting for player...';
	}

}

echo '</table>';

?>