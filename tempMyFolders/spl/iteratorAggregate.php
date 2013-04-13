<?php
class NumberSquared implements IteratorAggregate {
	public $_start, $_end;

	public function __construct($start, $end){
		$this->_start = $start;
		$this->_end = $end;
	}
	public function getIterator(){
		return new NumberSquaredIterator($this);
	}
	public function getStart(){
		return $this->_start;
	}
	public function getEnd(){
		return $this->_end;
	}
}
class NumberSquaredIterator implements Iterator {
	private $_cur;
	private $_obj;

	function __construct($obj){
		$this->_obj = $obj;
	}
	public function rewind(){
		$this->_cur = $this->_obj->getStart();
	}
	public function key(){
		return $this->_cur;
	}
	public function current(){
		return pow($this->_cur, 2);
	}
	public function next(){
		$this->_cur++;
	}
	public function valid(){
		return $this->_cur <= $this->_obj->getEnd();
	}
}
$obj = new NumberSquared(3, 7);
//echo "start = ".$obj->_start;exit;
foreach ($obj as $key => $value) {
	print "  вадрат числа $кеу - $value\n";
}
?>