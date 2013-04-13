<?php
class stockService{
	function getStock($num){
	$stock = array("1"=>100,"2"=>200,"3"=>300,"4"=>400,"5"=>500);
	if(array_key_exists($num,$stock))
		return $stock[$num];
	else
		throw new SOAPFault("Server","no goods");
	}
}
	ini_set("soap.wsdl_cache_enabled","0");
	$server = new SOAPServer("stock.wsdl");
	$server->setClass(stockService);
	//$server->addFunction("getStock");
	$server->handle();
	
	// Описать функцию/метод Web-сервиса
	
	// Отключить кэширование WSDL-документа
	
	// Создать SOAP-сервер
	
	// Добавить функцию/класс к серверу
	
	// Запустить сервера
	
?>