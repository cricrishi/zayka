<?php 
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
include $path.'/prj/functions.php';
$cid=$_REQUEST['id'];
$data=getdetails();
$uid=$data['uid'];
$count=chkclikes($uid,$cid);
if($count)
{
if(mysql_query("delete from clikes where cid='$cid' AND uid='$uid'"));
else
die(mysql_error());
}
else
{
if(mysql_query("Insert into clikes values('$uid','$cid')"));
else
die(mysql_error());
}

?>