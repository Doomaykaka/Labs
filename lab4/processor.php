<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Лабораторная работа №4</title>
 </head>
 <body bgcolor=#000000>
 <div align="center">Отчёт о работе проведённой ёжиком</div>
 <br>
 <style>
 body{
 color:#f8b475;
 font-family: Comic Sans MS;
 }
 </style>
 <hr color="#f8b475">

<?php
error_reporting(E_ERROR | E_PARSE); //Disable warnings

static $arr=array();
static $lks=array();
$iter=0;

 
function parser($url, &$level){ //Parsing function
    global $arr,$iter,$lks;
    
    $host_name = parse_url($url, PHP_URL_HOST); //Receiving host name from variable
    
    $level -= 1; //Depth decrement
    
    static $seen = array(); 
    if(isset($seen[$url])) { //Checking trash in array 
        return false;
    } elseif ($level < 0) { //Checking depth counter
        return false;
    }
 
    $seen[$url] = true; //Saving link in array
    
    $curl = curl_init($url); //Set CURL setting
    if($url[4]=='s'){ //If site using ssl
     curl_setopt_array( $curl, array(
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
     ));
    }else{
     curl_setopt_array( $curl, array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
     ));
    }
    $page = curl_exec($curl); //Get page
    if($page==false){ //Error
     echo("<p style=\"background-color:#808080;color:#f8b475;\">Неудачно - ".curl_error($curl)."</p>");
     return false;
    }
    curl_close($curl);
    
    $dom = new DOMDocument('1.0'); //DOM document creating
    if($dom->loadHTML($page)) { //If document is created
        $AllLinkNickname = $dom->getElementsByTagName("title"); //Receiving page tags titles
        $CurrentLinkNickname = $AllLinkNickname->length ? $AllLinkNickname->item(0)->nodeValue : ''; //Formating title
        foreach ($dom->getElementsByTagName('a') as $element) { //Links searching
            $href = trim($element->getAttribute('href'));
            $newhost = parse_url($url, PHP_URL_HOST); //Receiving host name from variable
            if((false !== strpos($href, $newhost)) && ($href <> '#') && ($href <> '/')) { //Link checking
                if($href[0]=='/') { //If link is relative
                    $ParseURL = parse_url($url);  //Receiving url from variable 
                    $scheme   = isset($ParseURL['scheme']) ? $ParseURL['scheme'] . '://' : ''; //The beginning of the link
                    $host     = isset($ParseURL['host']) ? $ParseURL['host'] : ''; //Receiving host name from link
                    $href     = $scheme.$host.$href; //Link gluing
                }
                if($host_name <> parse_url($href, PHP_URL_HOST)) //Checking that the link does not match the hostname
                    continue;
                
                if (false !== strpos($href, 'http')){ //If the link is correct
                     if(!(array_search($href,$lks))){
                         parser($href, $level);
                         $iter +=1;
                         $arr[$iter]['link']=$href; //Save link
                         $arr[$iter]['name']=$CurrentLinkNickname."- Number ".$iter; //Save name
                         $lks[$iter]=$href;
                         $level += 1; 
                     }
                    
                    if ($level < 0) { //Checking depth counter
                        return false;
                    }
                    
                }
            }
            
        }
         

        return true;
    }   
    return false;
}


if(isset($_POST['addr'])){ //Checking post param
  $addr = $_POST['addr']; //Get address
  $dep = 50; //Depth
  echo("<p style=\"color:#f8b475\">Вы ввели ссылку - ".$addr."</p>"); //Printing the link
  parser($addr, $dep); //Call function
  foreach($arr as $lk){ //Result output
   echo("************");
   echo("<p style=\"background-color:#808080;color:#f8b475;\">".$lk['name']."<br>".$lk['link']."</p>"); //Printing the link
  }
  echo("************");
}

?>

</body>
</html>