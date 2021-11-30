<?php   
	function preprocessing(){
         //save connect info
         $_SESSION['host']='fdb31.runhosting.com';
         $_SESSION['name']='3951199_news';
         $_SESSION['user']='3951199_news';
         $_SESSION['pass']='f88005553535f';
         
         $delP=-1;
         $newsnum=-1;
         $crP=-1;
         $redact=-1;
         
         if((isset($_GET['del']))&&(isset($_GET['newsnum']))){
          $delP=$_GET['del'];
          $newsnum=$_GET['newsnum'];
         }
         if((isset($_GET['redact']))&&(isset($_GET['newsnum']))){
          $redact=$_GET['redact'];
          $newsnum=$_GET['newsnum'];
         }
         //news redact
         if((isset($_COOKIE["Acc"]))&&($redact==1)&&($newsnum!=-1)){
          $_SESSION['nn']=$newsnum;
          echo("<div class=\"form\" align=\"center\">
                <p>Редактирование статьи</p>
                <form action=\"redact.php?nn=".($newsnum)."\" enctype=\"multipart/form-data\" method=\"post\">
                <p>Название <input type=\"text\" name=\"Title\"/></p>
                <p>Превью статьи <textarea name=\"BodyShort\"></textarea></p>
                <p>Текст статьи <textarea name=\"Body\"></textarea></p>
                <p>Дата написания <input type=\"date\" name=\"Date\"/></p>
                <p>Изображение <input type=\"file\" name=\"Image\"/></p>
                <a style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php>Назад</a>
                <p><input type=\"submit\" value=\"Изменить\"></p>
                </form> 
                </div>"
          );
         
         //news deleting
         }elseif((isset($_COOKIE["Acc"]))&&($delP==1)&&($newsnum!=-1)){
          echo("<div class=\"form\" align=\"center\">
                <p>Удаление статьи</p>
                <form action=\"delete.php?delnum=".($newsnum)."\" enctype=\"multipart/form-data\" method=\"post\">
                <a style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php>Назад</a>
                <p><input type=\"submit\" value=\"Удалить\"></p>
                </form> 
                </div>"
          );
         
         //news creating
         
         }elseif(isset($_GET['create'])){
          $crP=$_GET['create'];
         
         if((isset($_COOKIE["Acc"]))&&($crP==1)){
          echo("<div class=\"form\" align=\"center\">
                <p>Создание статьи</p>
                <form action=\"create.php\" enctype=\"multipart/form-data\" method=\"post\">
                <p>Название <input type=\"text\" name=\"Title\"/></p>
                <p>Превью статьи <textarea name=\"BodyShort\"></textarea></p>
                <p>Текст статьи <textarea name=\"Body\"></textarea></p>
                <p>Дата написания <input type=\"date\" name=\"Date\"/></p>
                <p>Изображение <input type=\"file\" name=\"Image\"/></p>
                <a style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php>Назад</a>
                <p><input type=\"submit\" value=\"Создать\"></p>
                </form> 
                </div>"
          );
         }
         }else{
         
         $pagR=-1;
         if(isset($_GET['pageRed'])){
          $pagR=$_GET['pageRed'];
         }
         if($pagR==-1){//news
          //Creating link
          if(isset($_COOKIE["Acc"])){ //Admin menu
           echo("<br/>");
           echo("<a style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php?create=1>Создать статью</a>");
           echo("<br/>");
          }
          $rev=0;
          if(isset($_GET['reverse'])){
           $rev=$_GET['reverse'];
          }
          if($rev==0){
           echo("<a style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php?page=1&reverse=1>Показывать сначала новые</a>");
          }else{
           echo("<a style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php?page=1&reverse=0>Показывать сначала старые</a>");
          }
          echo("<br/><br/>");
          $page=1;
          if(isset($_GET['page'])){ //get page number
           $page=$_GET['page'];
          }
          $i = 1;
          $result = getData($page);
          while($row = $result->fetch_assoc()){ //get one string from array
           echo("<div style=\"background-color:#5c5e5b; width:60%;\">");
           echo("Новость № ".($i+(($page-1)*6))." от ".$row['Date']);
           echo("<br/>");
           echo($row['Title']);
           echo("<br/>");
           if(isset($row['Image'])){
            $imgData = base64_encode($row['Image']);
            $img = "<img src= 'data:image/jpeg;base64, $imgData' />";
            print($img);
           }
           echo("<br/>");
           echo($row['BodyShort']);
           echo("<br/>");
           echo("<a  style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php?page=".($page)."&reverse=".($rev)."&pageRed=".($row['Id']).">Читать статью</a>");
               //-------------------------\\
           if(isset($_COOKIE["Acc"])){ //Admin menu
            echo("<br/>");
            echo("<a  style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php?redact=1&newsnum=".($row['Id']).">Редактировать статью</a>");
            echo("<br/>");
            echo("<a  style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php?del=1&newsnum=".($row['Id']).">Удалить статью</a>");
           }
           //  \\--------------------//
           echo("</div>");
           echo("<br/>");
           
           $i=$i+1;
           
          }
          
          $gPages=ceil(getPage()/6); //get number of pages
          
          //navigation buttons
          if($page!=1){
           echo("<a  style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php?page=".($page-1)."&reverse=".($rev).">".($page-1)."</a>");
          }
          echo(" ");
          if($page<$gPages){
           echo("<a style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php?page=".($page+1)."&reverse=".($rev).">".($page+1)."</a>");
          }
          
          
         }else{ //Reading
         
          $rev=0;
          if(isset($_GET['reverse'])){
           $rev=$_GET['reverse'];
          }
          $page=1;
          if(isset($_GET['page'])){ //get page number
           $page=$_GET['page'];
          }
          $i = 1;
          $result = getData($page);
          while($row = $result->fetch_assoc()){ //get one string from array
          if($row['Id']==$pagR){
           echo("<div style=\"background-color:#5c5e5b; width:60%;\">");
           echo("Новость № ".($i+(($page-1)*6))." от ".$row['Date']);
           echo("<br/>");
           echo($row['Title']);
           echo("<br/>");
           if(isset($row['Image'])){
            $imgData = base64_encode($row['Image']);
            $img = "<img src= 'data:image/jpeg;base64, $imgData' />";
            print($img);
           }
           echo("<br/>");
           echo($row['Body']);
           echo("<br/>");
           echo("<a style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php>Назад</a>");
           echo("</div>");
           echo("<br/>");
           }
           $i=$i+1;
           
          }
          
         }
        }
       }
        
        
        
        
        //get DB rows
        function getData($page){
        $db_host=$_SESSION['host']; //host
        $db_name=$_SESSION['name']; //db
        $db_user=$_SESSION['user']; //user
        $db_pass=$_SESSION['pass']; //pass
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); //connect
        $mysqli->set_charset("utf8mb4"); //encoding
        
        $rev=0;
        if(isset($_GET['reverse'])){
         $rev=$_GET['reverse'];
        }
        if($rev==0){
         $result = $mysqli->query("SELECT * FROM News ORDER BY Date LIMIT 6 OFFSET ".(($page-1)*6)); //request
        }else{
         $result = $mysqli->query("SELECT * FROM News ORDER BY Date DESC LIMIT 6 OFFSET ".(($page-1)*6)); //request
        }
        return $result; 
        }
        
        //get number of DB rows
        function getPage(){
        $db_host=$_SESSION['host']; //host
        $db_name=$_SESSION['name']; //db
        $db_user=$_SESSION['user']; //user
        $db_pass=$_SESSION['pass']; //pass
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); //connect
        $mysqli->set_charset("utf8mb4"); //encoding
        
        $result = $mysqli->query("SELECT COUNT(*) FROM News"); //request
        return $result->fetch_array()[0]; 
        }
        

?>