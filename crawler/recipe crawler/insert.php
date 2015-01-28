<?php
function addrecipe($sql)
{
include 'connect.php';
echo $sql;
if(mysql_query($sql));
else echo mysql_error();

}

?>