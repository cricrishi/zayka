<!Doctype html>
<html>
<head>
<script   type="text/javascript" src="wall/js/wall.js"> </script>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="wall/css/wall.css">
<style>
.classname5 {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	background-color:#ededed;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:2px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:4px 13px;
	text-decoration:none;
	text-shadow:0px 0px 0px #ffffff;
}.classname5:hover {
	cursor:pointer;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	background-color:#dfdfdf;
}.classname5:active {
	position:relative;
	top:1px;
}
#leftpannel{ float:left;width:12%; height:150px;; background-color:rgba(238,238,238,1); margin:100px 0 0 20px; border-radius:1em; padding:20px 20px 20px 20px;}
#rightpannel{height:1000px; margin-top:10px; margin-left:300px; margin-right:50px;}
#dsearch{ background-color:rgb(238,238,238); padding:10px 10px 10px 10px; }
#search{ padding:5px 5px 5px 5px; margin-left:100px;}
#dpost{ padding:10px 10px 10px 10px; background-color:rgb(238,238,238); width:600px; margin-left:100px; margin-top:50px;}
#leftpannel a{ 
	width: 110px;
	text-align: left;
	color: #567;
	font-weight: normal;
	text-decoration: none;
	font-family: "Lucida Grande", Arial, Helvetica, sans-serif;
	text-transform: capitalize;
	font-size: 18px;
	font-style: normal;
	text-shadow: 0px 0px 1px #aab;
	overflow: hidden;
	cursor:pointer;

}
#leftpannel div{ padding:5px 5px 5px 5px;}
#sfriend{ }
#leftpannel span{ position:absolute;  margin-top:-25px;  }
#is1{margin-left:200px;width:200px;}
span#is2{ background-color:#ccc; overflow:hidden; margin-left:150px; text-align:center;}
span#is3{ background-color:#ccc; overflow:hidden; margin-left:150px; text-align:center;}

</style>
</head>
<body>
<div id="content">
<div id="leftpannel">
<div><input type="text" name="search_friend" placeholder="Search Friend ...." id="sfriend"/></div><span id="is1"></span>
<div><a id="i2">Friend Requests</a></div><span id="is2"></span>
<div><a id="i3">Friends</a></div><span id="is3"></span>
<div><a id="i4">change Image</a></div>

</div>

<div id="rightpannel">
<div id="dpost">
<form method="post" action="">
<input type="text" name="post" placeholder="What's on Your mind?" title="What's on Your mind?"size="80" style="padding:3px 3px 3px 3px;" id="post"/>
<input type="submit" value="Post" class="classname5" id="spost"/>
</form>
</div>
<div id="flash" style="color:#777; margin:30px 0 0 170px; display:none;"></div>
<div style="margin:100px 0 0 80px;" id="load">
<?php include 'wall/post.php';?>
</div>
</div>

</div>
</body>
</html>