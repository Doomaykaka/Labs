<?php
 
 include('engine.php'); //Подключаем скрипт обработки изображения
 
 $fname = $_FILES['GetImage']['tmp_name']; //Получаем файл пользователя
 $path = './temp/' . $_FILES['GetImage']['name']; //Получаем путь к файлу пользователя
 $message = $_POST['TextInput']; //Получаем текст пользователя
 
 if(move_uploaded_file($fname, $path)){ //Проверяем статус загрузки файла на сервер
	 preprocessing($fname,$path,$message); //Вызываем функцию обработки пользовательского изображения из скрипта engine.php
 }else{
	 echo 'Uploading error!'; //В случае ошибки загрузки файла на сервер выводим соответствующее сообщение
 } 

?>