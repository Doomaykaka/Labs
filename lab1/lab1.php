<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Лабораторная работа №1</title>
 </head>
 <body bgcolor=#000000>
 <style>
 body{
 color:#f8b475;
 font-family: Comic Sans MS;
 }
 
  
 div.InText{
 margin-left:0px;
 margin-top:20px;
 }
 
 div.text1{
 margin-left:0px;
 margin-top:20px;
 }
 
 div.pic1{
 position: static;
 background-image: url('http://ip-labs-istbd-32.atwebpages.com/lab1/pic/1.png');
 height:322px;
 width:637px;
 margin-left:0px;
 margin-top:20px;
 }
 
 div.text2{
 margin-left:0px;
 margin-top:20px;
 }
 
 div.pic2{
 position: static;
 background-image: url('http://ip-labs-istbd-32.atwebpages.com/lab1/pic/1.png');
 height:322px;
 width:637px;
 margin-left:0px;
 margin-top:20px;
 }
 
 div.text3{
 margin-left:0px;
 margin-top:20px;
 }
 
 div.pic3{
 position: static;
 background-image: url('http://ip-labs-istbd-32.atwebpages.com/lab1/pic/2.png');
 height:956px;
 width:1903px;
 margin-left:0px;
 margin-top:20px;
 }
 
 div.text4{
 margin-left:0px;
 margin-top:20px;
 }
 
 </style>
  <div class="title">
   <h2>
    Лабораторная работа №1 <br>
    Выполнил Егоров Иван Евгеньевич
    студент группы ИСТбд-32
   </h2>
  </div>
  <p align="left">
   <div class="InText">
    Ошибки на сайте: <br>
    https://www.ulstu.ru/ <br>
   </div>
   
   <div class="text1">
    <br>
    1)Ошибка в обработке потенциально - вредных запросов : <br>
    При добавлении к адресной строке инъекции (зловредного кода , в нашем случае sql) выводится  <br>
    предупреждение о наличии потенциально опасных данных - это даёт злоумышленнику возможность <br>
    перебора зловредного кода в GET запросе к серверу сайта , что в конечном счёте даёт понимание <br>
    злоумышленнику о работе фильтра запросов сервера сайта. <br>
    <br>
   </div>
   
   <div class="pic1"></div>
   
   <div class="text2">
    <br>
    2)Ошибка в реализации фильтра запросов : <br>
    Ни в коем  случае нельзя предоставлять пользователю выбор на запрет или разрешение обработки <br>
    потенциально опасных данных в запросе на сервере , это решение должен принимать защитный фильтр <br>
    сервера (сетевой firewall).
    <br>
   </div>
   
   <div class="pic2"></div>
   
   <div class="text3">
    <br>
    3)Ошибка в баннере на главной странице (субъективно) : <br>
    При изменении масштаба сайта , следовало бы изменять и масштаб баннера (класс main-info-block) потому , <br>
    что шрифты на баннере и сайте начинают сильно разниться.
    <br>
   </div>
   
   <div class="pic3"></div>
   
   <div class="text4">
    <br>
    Предложения: <br>
    <br>
    1)Убрать вывод сообщений о наличии потенциально опасных данных , чтобы злоумышленник не смог искать <br>
    бреши в  защитном фильтре сервера.
    <br>
    2)В защитном фильтре сервера реализовать принудительный запрет на выполнение запросов с потенциально <br>
    опасными данными.
    <br>
    3)Задать в свойствах стиля класса баннера (класс main-info-block) размер динамически.
    <br>
   </div>
  </p>
 </body>
</html>