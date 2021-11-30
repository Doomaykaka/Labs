<?php

 function lgt(){
  if(isset($_GET['lgout'])){
   if(($_GET['lgout'])==1){
    if (isset($_COOKIE['Acc'])){ //delete cookie
     setcookie("Acc","", time() - 36000 , "","",0);
     unset($_COOKIE['Acc']);
    }
   }
  }
 }

?>