<?php
session_start();
include 'connect.php';
$loc ="upload/". $_FILES["file"]["name"];
	 
$sql="select uid from users where email='$_SESSION[email]'";
$result=mysql_query($sql,$con);	  
 while($row=mysql_fetch_array($result))
{
$sql1="update images set src='$loc' where uid='$row[uid]'";
mysql_query($sql1,$con);
}

  move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
?>