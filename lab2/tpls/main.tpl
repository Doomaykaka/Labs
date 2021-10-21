<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Лабораторная работа №2</title>
 </head>
 <body bgcolor=#000000>
 <div>{$date} : {$time}<div><br>
 <style>
 body{
 color:#f8b475;
 font-family: Comic Sans MS;
 }
 </style>
  <h2>
   Лабораторная работа №2 <br>
   Выполнил Егоров Иван Евгеньевич
   студент группы ИСТбд-32
  </h2> 
  <div class="form" align="left">
   <form action="loading.php" enctype="multipart/form-data" method="post">
    <p><input type="file" name="GetImage"/></p>
    <p><input type="text" name="TextInput" /></p>
    <p><input type="submit" value="Создать"></p>
   </form> 
  </div>
  <p align="left">
       Выберите изображение формата jpg/jpeg , которое будет являться основой.<br>
       В соответствующее поле наберите текст для размещения на изображение.<br>
       После получения готового изображения вы можете скачать его в формате pdf.
  </p>
 </body>
</html>