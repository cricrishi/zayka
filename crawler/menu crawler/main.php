<?php 
set_time_limit(0);
include 'connect.php' ;
include 'test.php';
$sql="Select * from hotel";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$i=1;
$ret=1;	
echo $row['zlink'];
while($ret)
{	
$link=$row['zlink']."/menu?page=".$i."#menutop";	
$ret=crawlimg($link,$row['hid']);
$i++;

}


}


?>

