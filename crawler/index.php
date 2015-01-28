<?php
include 'score.php';
set_time_limit(0);
/* To ignore 404 error messages from file_get_contents
 * and unset index notices from $domains. */
error_reporting( E_ERROR );
 
define( "CRAWL_LIMIT_PER_DOMAIN", 500 );
 
// Used to store the number of pages crawled per domain.
$domains = array();
// List of all our crawled URLs.
$urls = array();
function crawl( $url )
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
  preg_match_all( '~<p title="(.+)"~', $content, $matches );
  preg_match_all( '~<a class="" href="(.+)" title="(.+)"~', $content, $matches1 );
 preg_match_all( '~<div id="menu-image"><img src="(.+)" alt=~', $content, $matches2 );
preg_match_all( '~title="Restaurants in(.+)"~', $content, $matches3 );
 preg_match_all( '~<div title="(.+)"~', $content, $times );
preg_match_all( '~<p class="tags" title="(.+)">~', $content, $cusines );
 
 
  //echo 'Found ' . count( $matches1[0] ) . " urls.\n";
 
  foreach( $matches[1] as $crawled_url )
  {
//   echo $crawled_url."<br />";
$add[]=$crawled_url;
    }
	
 foreach( $cusines[1] as $crawled_url )
  {
//   echo $crawled_url."<br />";
$cusine[]=$crawled_url;
    }	
	foreach( $times[1] as $crawled_url )
  {
//   echo $crawled_url."<br />";
$time[]=$crawled_url;
    }

	foreach( $matches3[1] as $crawled_url )
  {
  // echo $crawled_url."<br />";
   $loc[]=$crawled_url;
    }

  foreach( $matches1[2] as $crawled_url )
  {
	  
   //echo $crawled_url."<br />";
 $name[]=$crawled_url;
    }

foreach( $matches1[1] as $crawled_url )
  {
   $link[]= "http://www.zomato.com".$crawled_url;
   
   /*$ret=1;
   $i=1; 
   while($ret)
   {  
   $ur="http://www.zomato.com".$crawled_url."/menu?page=".$i."#menutop";
   $img[]=crawlimg($ur);
   $i++;
   }
   
   $image[]=$img;
    */
	}


//echo "Name ".$name[1]."loc ".$loc[1]."add ".$add[1]." time ".$time[1];
for($i=0;$i<20;$i++)
{
	
$n=$name[$i];
$l=$loc[$i];
$lk=$link[$i];
$a=$add[$i];
$t=$time[$i];
$c=$cusine[$i];
$sql[]="Insert into hotel(hname,hloc,address,zlink,time,cusines) values('$name[$i]','$loc[$i]','$a','$link[$i]','$time[$i]','$c')";
//echo "Name ".$n."loc ".$l."add ".$a." time ".$t." link ".$lk."<br />";
	
}

addhotel($sql);
}

for($i=20;$i<=100;$i++)
{
crawl("http://www.zomato.com/ncr/restaurants?page=".$i);
//echo $i;
}
?>