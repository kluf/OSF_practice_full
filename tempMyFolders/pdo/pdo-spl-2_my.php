<?php
try{
    $db = new PDO('sqlite2:users.db');
    $stmt = $db->prepare('SELECT * FROM user ORDER BY id');
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $it = new IteratorIterator($stmt);
    foreach($it as $row){
        echo '<table border="1">';
        foreach (new ArrayIterator($row) as $key=>$value) {
            echo "<tr><td>$key</td><td>$value</td></tr>";
        }
        echo '</table>';
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
