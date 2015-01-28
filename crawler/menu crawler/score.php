<?php
function addhotel($sql,$con)
{

	include 'connect.php';
for($i=0;$i<sizeof($sql);$i++)
{
echo $sql[$i];
	
if(mysql_query($sql[$i]));
else echo mysql_error();
}
	}

?>