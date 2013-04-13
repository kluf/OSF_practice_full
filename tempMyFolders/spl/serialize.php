<?php
class A implements Serializable{
    private $varA;
    function __construct() {
        $this->varA = 'a';
    }
    function serialize() {
        return serialize($this->varA);
    }
    function unserialize($serialized) {
        $this->varA = unserialize($serialized);
    }
}
class B extends A{
    private $varB,$varC;
    function __construct() {
        parent::__construct();
        $this->varB = 'b';
    }
    /*function __sleep() {
        return array('varB','varA');
    }*/
    function serialize() {
        $sSerialized = parent::serialize();
        return serialize(array($this->varB,$sSerialized));
    }
    function unserialize($serialized) {
        $tmp = unserialize($serialized);
        $this->varb = $tmp[0];
        parent::unserialize($tmp[1]);
    }
}
$obj = new B;
$serialized = serialize($obj);
echo $serialized;
?>
