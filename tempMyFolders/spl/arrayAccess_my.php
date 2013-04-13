<?php
class Db{
    private $_db;
    const USER_DB='users.db';
    function __construct() {
        if(!file_exists(self::USER_DB))
            $this->_db = new SQLiteDatabase(self::USER_DB);
        else
            $this->_db = new SQLiteDatabase(self::USER_DB);
    }
    function userExists($name) {
        $sql = "SELECT count(*) FROM users WHERE name='$name'";
        return $this->_db->query($sql);
    }
    function getUserId($name){
        $sql = "SELECT inn FROM users WHERE name='$name'";
        $result = $this->_db->arrayQuery($sql);
        return $result[0][0];
    }
    function setUserId($name,$inn){
        $this->_db->query("INSERT INTO users(name,inn) VALUES('$name',$inn)");
    }
    function removeUser($name){
        $this->_db->query("DELETE FROM users WHERE name='$name'");
    }
}
class UserToInn implements ArrayAccess{
    private $_db;
    function __construct(){
        $this->_db = new Db();
    }
    function __destruct() {
        unset ($this->_db);
    }
    function offsetExists($name) {
        return $this->_db->userExists($name);
    }
    function offsetGet($name) {
        return $this->_db->getUserId($name);
    }
    function offsetSet($name,$inn){
        $this->_db->setUserId($name,$inn);
    }
    function offsetUnset($name) {
        $this->_db->removeUser($name);
    }
}
$user = new UserToInn();
if(isset($user['John']))
    echo $user['John'];
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
