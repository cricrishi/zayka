<?php
include 'connect.php';
$sql = "CREATE TABLE hotel
(
hid int primary key,
hname varchar(50) not null,
htype int,
hloc varchar(50),
rank int
)";

mysql_query($sql,$con);

mysql_close($con);
?>