<?php
 $title = $_POST['Title']; //Get title
 $bodysh = $_POST['BodyShort']; //Get short body
 $body = $_POST['Body']; //Get body
 $date = $_POST['Date']; //Get date
 $image = addslashes(file_get_contents($_FILES['Image']['tmp_name'])); //Get image
 $stat = CheckCreate(); //Check creating
 header('Location: http://ip-labs-istbd-32.atwebpages.com/lab3/lab3.php'); //Redirect
 
 
 function CheckCreate(){
        global $title,$bodysh,$body,$date,$image;
 
        $db_host='fdb31.runhosting.com'; //host
        $db_name='3951199_news'; //db
        $db_user='3951199_news'; //user
        $db_pass='f88005553535f'; //pass
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); //connect
        $mysqli->set_charset("utf8mb4"); //encoding
        
        $acc = $mysqli->query("INSERT INTO `News` (`Title`, `BodyShort`, `Body`, `Date`, `Image`) VALUES ('$title','$bodysh','$body','$date','$image')"); //request
        
 }
?>