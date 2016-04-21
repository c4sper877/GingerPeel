<?php
session_start();
require_once('../../includes/connect.db.php');

$user = $_SESSION['user'];
$user = $_SESSION[''];

$query = mysql_query("SELECT *  FROM inplay_decks");

echo '<table>';

while ($data = mysql_fetch_array($query)) {

  echo '
  <tr style="background-color:pink;">
    <td style="font-size:18px;">'.$data["name"].'</td>
    <td style="font-size:18px;">'.$data["age"].'</td>
  </tr>';

}

echo '</table>';

?>