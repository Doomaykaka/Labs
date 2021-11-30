<?php
 $login = $_POST['Login']; //Get login
 $password = $_POST['Password']; //Get password
 $stat = CheckLogin(); //Check account
 if($stat==-1){
  echo("<body bgcolor=#000000><p style=\"color:#f8b475\">Неверный логин или пароль</p></body>");
  //delete cookie
  echo("<a style=\"color:#f8b475\" href=http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php?lgout=1>Вернуться</a>"); //Redirect
 }else{
  header('Location: http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php'); //Redirect
 }
 
 function CheckLogin(){
        global $login,$password;
 
        $db_host='fdb31.runhosting.com'; //host
        $db_name='3951199_news'; //db
        $db_user='3951199_news'; //user
        $db_pass='f88005553535f'; //pass
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); //connect
        $mysqli->set_charset("utf8mb4"); //encoding
        
        $acc = $mysqli->query("SELECT * FROM Acc"); //request
        
        $stat=-1;
        
        while($row = $acc->fetch_assoc()){ //get one string from array
           if(($row['Login']===$login)&&($row['Password']===$password)){
            setcookie("Acc",$login, time() + 3600); //set cookie
            $stat=1;
            break;
           }
        }
        return $stat; 
 }
?>