<?php
include 'insert.php';
set_time_limit(0);
/* To ignore 404 error messages from file_get_contents
 * and unset index notices from $domains. */
error_reporting( E_ERROR );
 
define( "CRAWL_LIMIT_PER_DOMAIN", 500 );
 
// Used to store the number of pages crawled per domain.
$domains = array();
// List of all our crawled URLs.
$urls = array();
function rcrawl( $url )
{
  global $domains, $urls;
 
  /* This is where we add to the count of crawled URLs
   * and to our list of crawled URLs. */
 
  $content = file_get_contents( $url );
  if ( $content === FALSE )
  {
    echo "Error.\n";
    return;
  }
 
  /* Maybe do something with the content here.
   * Save it, parse it for data, etc. */
 
  $content = stristr( $content, "body" );
  preg_match_all( '~<p class="recipeTitle"><span id="(.+)">(.+)</span><~', $content, $matches );
  preg_match_all( '~class="ingredient-amount">(.+)<~', $content, $matches1 );
  preg_match_all( '~itemprop="image"(.+)src="(.+)" alt~', $content, $rimage );
 preg_match_all( '~ class="ingredient-name">(.+)</~', $content, $times );
 preg_match_all( '~<span class="plaincharacterwrap break">(.+)</span>~', $content, $directions );
 //preg_match_all( '<ol>(.+)</div>~', $content, $times );
 
 //echo 'Found ' . count( $rimage[0] ) . " urls.\n";
 
  foreach( $matches[2] as $crawled_url )
  {
 // echo $crawled_url."<br />";
$rname=$crawled_url;
    }
$src=NULL;	
 foreach( $rimage[2] as $crawled_url )
  {
// echo $crawled_url."<br />";
$src=$crawled_url;
   }	
	foreach( $times[1] as $crawled_url )
  {
   //echo $crawled_url."<br />";
if($crawled_url!='&nbsp;')
$iname[]=$crawled_url;
    }
	
		foreach( $directions[1] as $crawled_url )
  {
   //echo $crawled_url."<br />";
$dir[]=$crawled_url;
    }

  foreach( $matches1[1] as $crawled_url )
  {
	  
   //echo $crawled_url."<br />";
   if($crawled_url!='&nbsp;')
 $iammount[]=$crawled_url;
    }
/*
foreach( $matches1[1] as $crawled_url )
  {
   echo $crawled_url."<br />";
   $ret=1;
   $i=1; 
   while($ret)
   {  
   $ur="http://www.zomato.com".$crawled_url."/menu?page=".$i."#menutop";
   $img[]=crawlimg($ur);
   $i++;
   }
   
   $image[]=$img;
    }
*/

for($i=0;$i<sizeof($iname);$i++){
	
	$ingredient=$ingredient.$iammount[$i]." ".$iname[$i].", ";
	
	}

for($i=0;$i<sizeof($dir);$i++)
{
	$direct=$direct."<br />".$dir[$i];
	}

//echo $rname."<br />";
//echo $ingredient."<br />";
//echo $direct;
$rname=addslashes($rname);
$ingredient=addslashes($ingredient);
$direct=addslashes($direct);
if($src!=NULL)
$sql="INSERT INTO `zayka`.`recipes` (`rid`, `name`, `ingredients`, `directions`, `src`, `category`) VALUES (NULL,'$rname', '$ingredient', '$direct','$src','NEW')";
else
$sql="INSERT INTO `zayka`.`recipes` (`rid`, `name`, `ingredients`, `directions`, `category`) VALUES (NULL,'$rname', '$ingredient', '$direct','NEW')";

addrecipe($sql);
}

?>