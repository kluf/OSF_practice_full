<?php
$name = $gbook->clearData($_POST["name"]);
$email = $gbook->clearData($_POST["email"]);
$msg = $gbook->clearData($_POST["msg"]);
if(!empty($name) and !empty($email) and !empty($msg)){
$res = $gbook->savePost($name,$email,$msg);
if($res)
	header("Location: gbook.php");
else
	$errMsg = "Error when adding data";
}else{
$errMsg = "Enter all fields!!!";
}
/* ЗАДАНИЕ 1
- Проверьте, была ли корректным образом отправлена HTML-форма
- Если НЕТ, то присвойте переменной $errMsg строковое значение "Заполните все поля формы!"
- Если ДА, то 
	отфильтруйте полученные данные,
	вызовите метод savePost,
	выполните перезапрос страницы, чтобы избавиться от информации, переданной через форму
*/

/* ЗАДАНИЕ 2
- После вызова метода savePost проверьте, был ли запрос успешным?
- Если НЕТ, то присвойте переменной $errMsg строковое значение "Произошла ошибка при добавлении сообщения"
	перезапрос страницы выполнять НЕ НАДО
*/
?>