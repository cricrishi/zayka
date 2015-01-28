<?php
include 'rcrawl.php';

set_time_limit(0);
/* To ignore 404 error messages from file_get_contents
 * and unset index notices from $domains. */
error_reporting( E_ERROR );
  
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
//preg_match_all( '~<span class="starsimg"><a id="(.+)" href="(.+)reviews.aspx"><img~', $content, $matches3 );
preg_match_all( '~<a id="(.+)" href="(.+)detail.aspx"><img~', $content, $matches3 );

 //preg_match_all( '<ol>(.+)</div>~', $content, $times );
 
echo 'Found ' . count($matches3[0]) . " urls.\n";

	foreach( $matches3[2] as $crawled_url )
  {
   echo $crawled_url."<br />";
   rcrawl($crawled_url);
   //$loc[]=$crawled_url;
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

//echo "Name ".$name[1]."loc ".$loc[1]."add ".$add[1]." time ".$time[1];
//echo sizeof($name);
}

crawl("http://allrecipes.com/recipes/Newest.aspx");
?>