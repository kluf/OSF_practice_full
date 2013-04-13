<?php
class NumberSquared implements Iterator {
	private $_start, $_end;
	private $_cur;

	public function __construct($start, $end){
		$this->_start = $start;
		$this->_end = $end;
	}
	public function rewind(){
		$this->_cur = $this->_start;
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
		return $this->_cur <= $this->_end;
	}

}
$obj = new NumberSquared(3, 7);
foreach ($obj as $key => $value) {
	print " вадрат числа $key - $value\n";
}
?>