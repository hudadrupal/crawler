<?php


include 'index.html';
//include 'conn.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {

//$to_crawl = "https://www.homegate.ch/mieten/immobilien/kanton-zuerich/trefferliste";
    
    $to_crawl = $_REQUEST['search'];
    

    if (empty ('search')){
        echo"search bar is empty";
    }
    
    
function get_links($url){
    
   $input = file_get_contents($url);
   $pattern ='/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU';  //regular expression
   preg_match_all($pattern, $input, $matches); 
   
    

        echo"<pre>";  
        $link = $matches[2];
    
    foreach($link as $l)
{
        if (substr($l, 0, 4) === "http")
        {
           $link1= $l; 
             
           echo  $link1. "<br />" ; 
            
            
        }
        
        
       if(substr($l, 0, 1) ==='/')
        {

            $link2= $url. $l;
           echo $link2 . "<br />";

        }
        
       
}


    
    
    
  echo"</pre>";  
    
 

}


         
            
$resultss= get_links($to_crawl);
    


}
?>