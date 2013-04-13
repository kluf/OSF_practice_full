<?php
try{
$db = new PDO('sqlite2:test.db');
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$db->beginTransaction();
//$sql = "create table goods(id integer primary key,name TEXT,price integer)";
//$db->exec($sql);
$db->exec("INSERT INTO goods(name,price) VALUES ('five',500)");
$db->exec("INSERT INTO goods(name,price) VALUES ('six',600)");
$db->exec("INSERT INTO goods(name,price) VALUES (seven,700)");
$db->exec("INSERT INTO goods(name,price) VALUES ('eight',800)");
$db->commit();
echo 'OK!';
}
 catch (PDOException $e){
     $db->rollBack();
     $mes = $e->getMessage();
     mail('metal_god@ovi.com', "test_from_myself", $mes);
 }
?>
