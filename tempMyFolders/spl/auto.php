<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function myf1(){
    echo __FUNCTION__;
}
function myf2(){
    echo __FUNCTION__;
}
spl_autoload_extensions('.php');
spl_autoload_register('myf1');
spl_autoload_register('myf2');
spl_autoload_register();
$obj = new MyObject();
?>
