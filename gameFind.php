<script type="text/javascript" src="scripts/js/jquery.js"></script>

<?php
require_once('includes/connect.db.php');
session_start();





function findGame(){
	$SESSION_user_name = "Bob";
	$SESSION_user_id = "3456";
	
	$query = "SELECT * FROM games WHERE player_2 IS NULL";
	$result = mysql_query($query);
	
	if(mysql_numrows($result) < 1){
		$time = time();
		$query = "INSERT INTO games (player_1, player_1_last_active) VALUES ('$SESSION_user_id', '$time')";
		mysql_query($query);
		echo "created game! 1";
?>

		
<?php		
	}

	
	
	
	
	elseif(mysql_numrows($result) >= 1){
		$time = time();
		$maxtimeout = $time - 5 ;
		echo $time;
		echo ' - ' . $maxtimeout . '</br>';
		$query = "SELECT * FROM games WHERE player_1_last_active > '$maxtimeout'";
		$resultcheck = mysql_query($query);
		
		if(mysql_numrows($resultcheck) >= 1){
			$time = time();

			while($row = mysql_fetch_assoc($resultcheck)){
				$gametojoin = $row['id'];
				$player_1_name = $row['player_1'];
			}
		$query = "UPDATE games SET player_2 = '$SESSION_user_id', player_2_last_active = '$time' WHERE id = '$gametojoin'";
		mysql_query($query) or die(mysql_error());
		echo '<br /> joining game:' . $gametojoin;
		echo '<br /> Connected to ' . $player_1_name . "'s game!";
		}
		else{
			$time = time();
			$maxtimeout = $time - 5 ;
			$query = "INSERT INTO games (player_1, player_1_last_active) VALUES ('$SESSION_user_id', '$time')";
			mysql_query($query) or die(mysql_error());
			$query = "SELECT * FROM games WHERE player_1 = 3456 AND player_1_last_active > '$maxtimeout'";
			$result = mysql_query($query);
			while($row = mysql_fetch_assoc($result)){
				$_SESSION['current_game_id'] = $row['id'];
			}

			echo "created game! 2";
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    function refresh_div() {
        jQuery.ajax({
            url:'scripts/game/findingPlayers.php',
            type:'POST',
            success:function(results) {
                jQuery(".connecting").html(results);
            }
        });
    }

    t = setInterval(refresh_div,1000);
</script>


<?php
		}
	}
}

findGame();

?>

<div class="connecting"></div>