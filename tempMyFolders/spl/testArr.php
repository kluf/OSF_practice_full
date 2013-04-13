<?php
class Book implements ArrayAccess{
    /*public $title;
    public $autor;
    public $isbn;*/
 private $props = array();
         function offsetExists($item) {
        return isset($this->props[$item]);
    }
    function offsetUnset($item){
        unset ($this->props[$item]);
    }
    function offsetSet($item, $value) {
        $this->props[$item] = $value;
    }
    function offsetGet($item) {
        return $this->props[$item];
    }
}
$book = new Book();
$book['title'] = 'php4';
$book['autor'] = 'Jogn iejf';
print_r($book);
/*$book['title'] = 'php5';
$book['autor'] = 'John Smith';
$book['isbn'] = 278834783;
print_r($book);*/
?>
