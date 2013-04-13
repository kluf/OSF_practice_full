<?php
$db = new PDO('sqlite2:users.db');
$stmt = $db->query("SELECT * FROM user");
$it = new IteratorIterator($stmt);
$lim = new LimitIterator($it,0,3);
$arr = iterator_to_array($lim);
print_r($arr);
?>
