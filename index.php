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
    <link href="styl.css" rel="stylesheet" type="text/css" media="screen" />
	<title>Zayka</title>
    <link rel="shortcut icon" href="images/favicon.ico"/>
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
var h=$("#search_rest").val();
var l=$("#location").val();
var d1='';
if(c=='SELECT')
c='';
var ds="hotel="+h+"&loc="+l+"&cuisine="+c;
window.location="hotels.php?"+ds;
});    
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
<a href="index.php" id="active">Home</a>
<a href="recipe.php">Recipe</a>
<a href="hotels.php">Hotels</a>
<a href="social.php">Social</a>

</div>
</div>

<div id="part2">
<div id="logo">
<a href=""> <img src="images/new.jpg"  height="70px" width="150px" /></a>
</div>
<div id="state">
Delhi
</div>
<div id="search_by">
<span style="color:#555555;font-family: arial;font-weight: bold;cursor: pointer;font-size:15px; float:left; margin-right:5px; margin-top:10px; cursor: default;">Search</span>
<div id="byrest">
<input type="text" name="search_rest" id="search_rest" size="30" placeholder="Search Resturant....."/>
</div> 
<div id="bycusine" style="margin-right:20px; margin-left:10px;">
<span class="classname2">SELECT</span>
<ul id="cuisine" style="border: solid 1px #ccc;">
<li class="element"> All</li>
<li class="element">Indian</li>
<li class="element">Chinese</li>
<li class="element">Italian</li>
<li class="element">Mughlai</li>
</ul>
</div>
</div>
<div class="dropdown">
<div id="search_select" class="classname2"> Resturant</div>
<ul id="select_options" style="border: solid 1px #ccc;">
<li class="text_style1" >Resturant</li>
<li class="text_style1">Cuisine</li>
</ul>
</div>
<div id="loc">
<span style="color:#555555;font-family: arial;font-weight: bold;cursor: pointer;font-size:15px; margin-left:10px; margin-right:-15px;cursor: default;">Location</span>
<input type="text" name="location" id="location" size="30" placeholder="Enter Your Location..."/>
</div> 
<div id="search_but" class="classname3"> Search</div>


</div>

<?php//------end of part2 --------- ?>
<div id="homebody" >

<div id="tophotels" style="margin-left:80px; padding: 50px 0 0 10px;">
<b style=" color:#444;word-wrap:break-word; margin-left:170px; font-size:18px;">TOP 5 Hotels In Delhi</b>
<?php include 'tophotels.php';?> 
</div>

</div>


<div id="topfoodie" style=" padding: 50px 0 0 0px; margin-left:700px; position:absolute; margin-top:-940px;">
<b style=" color:#444;word-wrap:break-word; margin-left:250px; font-size:18px;">TOP Foodies</b>
<div id="loadfoodie" style=" margin-left:150px;">
<?php include 'topfoodie.php';?> 
</div>
</div>





<div id="backgroundPopup"></div>

<div id="popup_container">
<img src="images/logo.gif" id="closepopup"/>
<div id="popup" style="margin:0 0 0 0; padding:0 0 0 0 ;">

</div>
</div>
</br>
</br>
<hr/>
<div id="footer">
<div id="footer-content" class="container">
	<div id="footer-bg">
		<div id="column1">
			<h2>ZAYKA.COM.</h2>
			<p>Copyright (c) 2012 zayka.com</p>
			<p>All rights reserved.</p>
			<p>Design by:-</br>
            Parag Garg</br>
            Rishi Bhardwaj</br>
            Umang Aggarwal
            </p>
		</div>
		<div id="column2">
			<h2>Popular Cities</h2>
			<ul class="list-style3">
				<li class="first"><a href="#">Delhi</a></li>
				<li><a href="http://localhost/prj/hotels.php?hotel=&loc=noida&cuisine=&rating=0">Noida</a></li>
				<li><a href="http://localhost/prj/hotels.php?hotel=&loc=gurgaon&cuisine=&rating=0">Gurgaon</a></li>
                <li><a href="http://localhost/prj/hotels.php?hotel=&loc=mg%20road&cuisine=&rating=0">Mg Road</a></li>
                <li><a href="http://localhost/prj/hotels.php?hotel=&loc=place&cuisine=&rating=0">Connaught Place</a></li>
			</ul>
		</div>
		<div id="column3">
			<h2>Popular Cuisines</h2>
			<ul class="list-style3">
				<li class="first"><a href="http://localhost/prj/hotels.php?hotel=&loc=&cuisine=Indian&rating=0">indian</a></li>
				<li><a href="http://localhost/prj/hotels.php?hotel=&loc=&cuisine=Indian&rating=0">Northern Indian</a></li>
				<li><a href="http://localhost/prj/hotels.php?hotel=&loc=&cuisine=Indian&rating=0">Southern Indian</a></li>
				<li><a href="http://localhost/prj/hotels.php?hotel=&loc=&cuisine=Italian&rating=0">italian</a></li>
				<li><a href="http://localhost/prj/hotels.php?hotel=&loc=&cuisine=Chinese&rating=0">Chinese</a></li>
				<li><a href="http://localhost/prj/hotels.php?hotel=&loc=&cuisine=Mughlai&rating=0">Mughlai</a></li>
			</ul>
		</div>
		<div id="column4">
			<h2>Social</h2>
			<ul class="list-style3">
				<li class="first"><a href="#">Twitter</a></li>
				<li><a href="https://www.facebook.com/zaykaaindia?ref=ts&fref=ts">Facebook</a></li>
				<li><a href="#">Flickr</a></li>
				<li><a href="#">Google +</a></li>
				<li><a href="#">Instagram</a></li>
				<li><a href="#">RSS</a></li>
			</ul>
		</div>
	</div>
</div>
</div>




</body>

</html>
