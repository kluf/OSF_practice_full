<?php
try{
$conn = new PDO('sqlite2:users.db');
$sql = "INSERT INTO users(name,email) VALUES ('John','Johm@smith.com')";
$res = $conn->exec($sql);
echo $res;
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
