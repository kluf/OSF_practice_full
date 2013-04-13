<?php
class NumberSquared implements Iterator{
    private $_start,$_end,$_cur;
    public function __construct($s,$e) {
        $this->_start = $s;
        $this->_end = $e;
    }
    public function rewind(){
        $this->_cur = $this->_start;
    }
    public function key() {
        return $this->_cur;
    }
    public function current() {
        return pow($this->_cur,2);
    }
    public function next() {
        $this->_cur++;
    }
    public function valid() {
        return $this->_cur <= $this->_end;
    }
    }
    $obj = new NumberSquared(2,10);
    foreach($obj as $key=>$val){
        echo "Квадрат числа $key = $val<br>";
    }
?>
