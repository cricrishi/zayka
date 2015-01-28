<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="wall/js/wall.js"></script>
</head>
<body>
<?php
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
include $path.'/prj/functions.php';
$cid=$_REQUEST['id'];
$data=getdetails();
$uid=$data['uid'];
deletecomment($uid,$cid);
?>
</body>
</html>