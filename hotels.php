<?php 
session_start();
include 'functions.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="zayka" >
    <link rel="stylesheet" href="css/slider.css" type="text/css"/>
    <link rel="stylesheet" href="css/p1p2.css" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="wall/css/wall.css">
    <title>Zayka</title>
<script type="text/javascript" src="js/jquery.js">
</script>
<script type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js">
</script>

  <style type="text/css">
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
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	background-color:#dfdfdf;
}.classname5:active {
	position:relative;
	top:1px;
}
  .t1{
	 
	  text-transform:capitalize;
	  color:#333;
	  font-family:"Times New Roman", Times, serif;
	  font-weight:600;
	  margin-left:80px;	
	 }
	 

  .t2{
	  text-transform:capitalize;
	  color:#555;
	  font-family:"Times New Roman", Times, serif;
	  font-weight:600;
	  
	  margin:10px 0 0px 30px;
	 }
.t3{
	  text-transform:capitalize;
	  color:#999;
	  font-family:"Times New Roman", Times, serif;
	  font-weight:600;
	 
	 }


	 #filter{ margin-top:50px;padding:10px 15px 10px 15px; width:250px; border-radius:1em; background-color:#eee; margin-left:100px; box-shadow: 0 2px 8px rgba(0, 0, 0, .45); }
	 
	 .slide{ width:8px; height:15px; background-color:#555; position:relative; margin-top:-12px; border-radius:1em;}
.fill{ width:0px; height:3px; padding-top:1px; padding-bottom:1px; background-color:#09F;}
.hcan
 {
	  height:5px;  width:108px; border:solid 1px #000; background-color:#fff;}
#slide{ width:100px; height:10px; background-color:#09f;}
  
#hotels{float:right; margin-right:100px; margin-top:-320px;
width:800px; background-color:#fff; border-radius:6px;box-shadow: 0 2px 8px rgba(0, 0, 0, 0.45);
overflow:hidden;
}
  </style>  
<script>
$(document).ready(function(e) {

$("#search_but").click(function(e) {

var c=$("#bycusine span").html();
var h=$("#search_rest").val();
var l=$("#location").val();
var r=$("#per").html();
var d1="&rating="+r;
if(r=='')
var d1='';
if(c=='SELECT')
c='';
var ds="hotel="+h+"&loc="+l+"&cuisine="+c+d1;
window.location="hotels.php?"+ds;
});    
});

</script>

<script type="text/javascript">
var popupstatus=0;
function upload()
{	
		popupstatus=1;
	 $.ajax({url:"imageupload.php",success:function(result){
    $("#popup").html(result);
	
	var width=$("#imageuploder").width();
	var height=$("#imageuploder").height();
	$("#popup_container").css({"width":width,"height":height});
  centerPopup();
  }});
	
	
	}
function loadPopup(){
	if(popupstatus==0)
	{  
		 $("#backgroundPopup").css({  
"opacity": "0.7"  
}); 
		$("#backgroundPopup").fadeIn("slow");
		$("#popup_container").fadeIn("slow");
	popupstatus=1;
	 $.ajax({url:"login.php",success:function(result){
    $("#popup").html(result);
	var width=$("#popup1").width();
	var height=$("#popup1").height();
	$("#popup_container").css({"width":width,"height":height});
  centerPopup();


	
  }});
	
	}

}

function centerPopup(){  
//request data for centering  
var windowWidth = document.documentElement.clientWidth;  
var windowHeight = document.documentElement.clientHeight;  
var popupHeight = $("#popup_container").height();  
var popupWidth = $("#popup_container").width();  
//centering  
$("#popup_container").css({  
"position": "absolute",  
"top": windowHeight/2-popupHeight/2,  
"left": windowWidth/2-popupWidth/2  
});  
//only need force for IE6  
  
$("#backgroundPopup").css({  
"height": windowHeight  
});  
  
}  

function disablePopup(){  
if(popupstatus==1)
	{ 
		$("#backgroundPopup").fadeOut("slow");
		$("#popup_container").fadeOut("slow");
	popupstatus=0;
	}
}

function checkloginstatus()
{
	 $.getJSON("checksession.php",function(data){
    flag=data.flag;

  if(flag==1)
				{
					
				
					document.getElementById("dp").src=data.img['src'];
					$("#uname").html(data.data['fname']);
					$("#plogin").css('display','none');
					$("#logined").css('display','inline');
	
					}
					else
					{
					$("#plogin").css('display','inline');
					$("#logined").css('display','none');
					}

  });
						
		
	}
$(document).ready(function(e) {
    $("#plogin").click(function(){
		
		centerPopup();
		
				loadPopup();
		});
	$("#backgroundPopup,#closepopup").click(function(){
		disablePopup();
	
		
		});
		$("#plogout").click(function(){
			
			$.ajax('logout.php');
			checkloginstatus();
			})
		checkloginstatus();
		setInterval(function(){
			checkloginstatus();
			},2000);
	


});
</script>



<script type="text/javascript"> 
function change_select_option()
{
	opt=$("#search_select").html().toLowerCase();
	if(opt=='cuisine')
	{$("#bycusine").css('display','block');
		$("#byrest").css('display','none');
		}	
	else
	{
		$("#bycusine").css('display','none');
		$("#byrest").css('display','block');

		}	
	}
$(document).ready(function(e) {
    $(".dropdown").mouseover(function(){
		$(".dropdown ul").css('display','block');
			
		})
		$(".dropdown").mouseout(function(){
		$(".dropdown ul").css('display','none');
			
		})
$("#select_options li").click(function(){
	val=$(this).html();
	$("#search_select").html(val);
		change_select_option();

	
	});
	$("#bycusine").mouseover(function(){
			
			$("#cuisine").css('display','block');
			});
			
$("#bycusine").mouseout(function(){
			
			$("#cuisine").css('display','none');
			});
$("#cuisine li").click(function(){
	
	val=$(this).html();
	$("#bycusine span").html(val);
	})

});
</script>

</head>
<body>


<div id="part1">
<div id="login_bar">
<a href="#" class="classname" id="plogin">Login Or Sign Up</a>
<div id="logined"  style="display:none;">
<span style=" top:30px; right:180px;margin-right:100px; position:absolute; font-weight:600; color:#333; font-size:18px; text-transform:capitalize;" id="uname"></span>

<img src="" alt="" width="40" height="40" style=" top:25px; right:140px;margin-right:90px; position:absolute; " id="dp" />

<a href="#" class="classname" id="plogout">Logout</a>
</div>
</div>
<div id="slider">
<?php include 'image.php';?>


</div>
<div id="menu">
<a href="index.php" >Home</a>
<a href="recipe.php">Recipe</a>
<a href="hotels.php" id="active">Hotels</a>
<a href="social.php">Social</a>

</div>
</div>
<?php 
$hotel='';
$loc='';
$cuisine='SELECT';
if(isset($_REQUEST['hotel']))
$hotel=$_REQUEST['hotel'];
if(isset($_REQUEST['hotel']))
$loc=$_REQUEST['loc'];
if(isset($_REQUEST['cuisine']) && $_REQUEST['cuisine']!='')
$cuisine=$_REQUEST['cuisine'];

?>
<div id="hotelbody">
<div id="filter">
<span class="t1">Filter by</span>
<div class="t2" >Location</div>
<input type="text" id="location" name="l" value="<?php echo $loc?>"/>
<div class="t2" >Hotel Name</div>
<input type="text" id="search_rest" name="h" value="<?php echo $hotel;?>"style="margin-left:20px;"/>

<div class="t2">Cuisine</div>
<div id="bycusine" style=" margin-left:20px; display: block;">
<span class="classname2"><?php echo $cuisine;?></span>
<ul id="cuisine" style="border: solid 1px #ccc;">
<li class="element"> All</li>
<li class="element">Indian</li>
<li class="element">Chinese</li>
<li class="element">Italian</li>
<li class="element">Mughlai</li>
</ul>
</div>
<div class="t2" >
<?php
if(isset($_REQUEST['rating']))
$rating=$_REQUEST['rating'];
 ?>
Rating <?php include 'slide.php';?>

</div> 
<div id="search_but" class="classname5" style="text-align:center; margin-left:20px; cursor:pointer;">Filter</div>
</div>




<div id="backgroundPopup"></div>

<div id="popup_container">
<img src="images/logo.gif" id="closepopup"/>

<div id="popup" style="margin:0 0 0 0; padding:0 0 0 0 ;">

</div>
</div>
<div id="hotels">
<div style="margin-left:-50px;">
<?php include 'searchhotel.php';?>
</div>
</div> 


</body>


</html>
