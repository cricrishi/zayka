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
	<title>Zayka</title>
<script type="text/javascript" src="js/jquery.js">
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
<script>
$(document).ready(function(e) {

$("#search_but").click(function(e) {

var c=$("#bycusine span").html();
var r=$("#search_rest").val();
var l=$("#location").val();
window.location="hotels.php?";
});    
});

</script>
<script language="JavaScript" type="text/javascript">
function makeactive(tab) { 
document.getElementById("tab1").className = ""; 
document.getElementById("tab2").className = ""; 
document.getElementById("tab3").className = "";
alert(tab);
$("tab1").attr('class','current');
//document.getElementById("tab"+tab).className = "current";

} 
</script>
<style>
#rcontainer{ margin-bottom:45px;}
#rcontainer li{ list-style:none; float:left; margin-left:10px;  border-bottom:1px solid #000; padding:5px; border-radius:6px;  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.45); background-color:#fff;}
a{ text-decoration:none; color:#555;}
.current{ border-bottom:1px solid #fff; padding:6px; background-color:#fff; color:#09f;padding:0 8px 2px 8px 8px;}
.recipe{ border-radius:6px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.45); padding:10px; word-wrap:break-word; margin:20px;}
.rsrc{ width:300px; height:200px; float:left; border:1px solid; padding:2px; margin-right:100px;}
.rname{ font-weight:700px; color:#666; margin-bottom:200px; margin-top:50px;}
.ingredients{ margin-bottom: 50px;}
.direct{ font-size:18px; color:#555;}
</style>
<style>
</style>

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
<a href="recipe.php" id="active">Recipe</a>
<a href="hotels.php">Hotels</a>
<a href="social.php">Social</a>

</div>
</div>


<?php//------end of part1 --------- ?>


<ul id="rcontainer">
<li><a href="?" class="current" id="tab1" onclick="makeactive(1)">ALL Recipes</a></li>
<li><a href="?recipe=top" id="tab2" onclick="makeactive(2)">Top Recipes</a></li>
<li><a href="?recipe=new" id="tab3" onclick="makeactive(3)">New Recipes</a></li>
<li><a href="?recipe=our" id="tab4" onclick="makeactive(4)">Our Recipes</a></li>
</ul>
<div id="recipies">

<?php 
$recipe='';
if(isset($_REQUEST['recipe']))
$recipe=$_REQUEST['recipe'];
if($recipe!="our")
include 'getrecipe.php';
else
include 'ourrecipe.php';
?>

</div>

<div id="backgroundPopup"></div>

<div id="popup_container">
<img src="images/logo.gif" id="closepopup"/>
<div id="popup" style="margin:0 0 0 0; padding:0 0 0 0 ;">

</div>
</div>

</body>

</html>
