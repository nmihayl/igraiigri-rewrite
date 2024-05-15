<?php
$connection = new SQLite3('site.db');
$maxIdResult = $connection->query('SELECT max(rowid) FROM html_data');
$maxId = $maxIdResult->fetchArray(SQLITE3_ASSOC)['max(rowid)'];
$randomId = rand(1, $maxId);
header("Location: https://playground.helliolab.giize.com/gameview.php?id=$randomId");
exit;
?>