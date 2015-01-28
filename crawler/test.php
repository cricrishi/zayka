<?php
/* To ignore 404 error messages from file_get_contents
 * and unset index notices from $domains. */
error_reporting( E_ERROR );
 
define( "CRAWL_LIMIT_PER_DOMAIN", 500 );
 
// Used to store the number of pages crawled per domain.
$domains = array();
// List of all our crawled URLs.
$urls = array();
 
function crawlimg( $url)
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
 preg_match_all( '~<div id="menu-image"><img src="(.+)" alt=~', $content, $matches2 );

 
 // echo 'Found ' . count( $matches2[0] ) . " urls.\n";


foreach( $matches2[1] as $crawled_url )
  {
   return $crawled_url;
   }
return 0;

}

?>