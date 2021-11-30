<?php

 $num = $_GET['delnum']; //Get news number
 $stat = CheckDelete(); //Check deleting
 header('Location: http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php'); //Redirect
 
 
 function CheckDelete(){
        global $num;
 
        $db_host='fdb31.runhosting.com'; //host
        $db_name='3951199_news'; //db
        $db_user='3951199_news'; //user
        $db_pass='f88005553535f'; //pass
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); //connect
        $mysqli->set_charset("utf8mb4"); //encoding
        
        $acc = $mysqli->query("DELETE FROM `News` WHERE Id=$num"); //request
        
 }
 
?>