<?php
$db = sqlite_open("test.db");
//phpinfo();
sqlite_close($db);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$db1 = new SQLiteDatabase("test1.db");

unset($db1);
?>
