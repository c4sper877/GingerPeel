<?php

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "panzer";

$DB_database = "gingerpeel";


mysql_connect($DB_host, $DB_user, $DB_pass) or die(mysql_error());
mysql_select_db($DB_database);

?>