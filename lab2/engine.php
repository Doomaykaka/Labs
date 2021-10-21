<?php
 require('./fpdf/fpdf.php'); //Подключаем библиотеку для работы с pdf файлами

 function preprocessing($fname,$path,$message){
 	$wm = imagecreatefrompng('./wm/wm.png'); //Получаем водяной знак
	$pic = imagecreatefromjpeg($path); //Получаем изображение пользователя
	
	$marge_right = 15; //Отступ для водяного знака справа
    $marge_bottom = 15; //Отступ для водяного знака снизу
	$wm_width = imagesx($wm); //Ширина водяного знака
    $wm_height = imagesy($wm); //Высота водяного знака
	$pic_width = imagesx($pic); //Ширина изображения
    $pic_height = imagesy($pic); //Высота изображения
	
	//Копируем водяной знак на пользовательское изображение
	imagecopy($pic, $wm, $pic_width - $wm_width - $marge_right, $pic_height - $wm_height - $marge_bottom, 0, 0, $wm_width, $wm_height);
	
    preprocessingPart2($pic,$message,$path);
 }
 
 function preprocessingPart2($pic,$message,$path){
	$font = './font/comic.ttf'; //Ссылка на шрифт
    $font_size = 24; //Размер шрифта
    $degree = 0; //Угол поворота текста в градусах
    $text = $message; //Текст
    $y = 400/2 + 23/2; //Отступ сверху (координата y)
    $x = 400/2 - 104/2; //Отступ  слева (координата x)
    $color = imagecolorallocate($pic, 0, 0, 0); //Функция выделения цвета для текста

    imagettftext($pic, $font_size, $degree, $x, $y, $color, $font, $text); //Функция нанесения текста
	
	imagejpeg($pic, './temp/NewImg.jpeg'); //Сохраняем изображение
	$path = './temp/NewImg.jpeg'; //Записываем путь к изображению в переменную
	
	saving($pic,$path);
 }
 
 function saving($pic,$path){
	 $npdf = new FPDF(); //Создаём экземпляр класса библиотеки
     $npdf->AddPage(); //Добавляем страницу к нашему pdf объекту (экземпляру класса библиотеки)
     
     //Подгон размера
     $Isize = getimagesize($path);
     $w = 0;
     $h = 0;
     while ($w < 210 && $h < 300){
      $w += $Isize[0] / 10000;
      $h += $Isize[1] / 10000;
     }
     
     $npdf->Image($path, 0, 0, $w, $h); //Передаём странице наше изображение
     $npdf->Output('d', 'NewImg.pdf'); //Сохраняем pdf объект в файл
 }

?>