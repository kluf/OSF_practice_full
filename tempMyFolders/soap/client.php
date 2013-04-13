<?php
	$client = new SOAPClient("stock.wsdl");
		// Создать SOAP-клиента
	var_dump($client->__getFunctions());
	try{
	$result = $client->getStock("223");
	echo $result;
	}catch(SoapFault $exception){
	echo $exception->getMessage();
	}
		// Послать SOAP-запрос c получением результат
	
?>