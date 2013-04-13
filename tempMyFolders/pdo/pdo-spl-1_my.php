<?php
try{
    $db = new PDO('sqlite2:users.db');
    $stmt = $db->prepare('SELECT * FROM user ORDER BY id');
    $stmt->execute();
    $it = new IteratorIterator($stmt);
    foreach($it as $row){
        $arrayObj = new ArrayObject($row);
        for($iterator=$arrayObj->getIterator();$iterator->valid();$iterator->next()){
            echo $iterator->current().'<br>';
        }
        echo '<hr>';
    }
}
catch(PDOException $e){
    echo $e;
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
