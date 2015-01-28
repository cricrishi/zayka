<?php
include 'connect.php';
$result=mysql_query("Select * from rating where uid=28");
 if(mysql_num_rows($result))
 {while($row=mysql_fetch_array($result))
 {echo $row['rating'];
 }
 }
 else
 {
	 echo "not found";}
?>