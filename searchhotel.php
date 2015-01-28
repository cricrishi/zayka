<head>
<style>
.small_img{ float:left;
height:100px;
width:150px;
padding:3px;
border-radius:1em;
 }
.hbody{margin-top:10px;
overflow:auto;
margin-left:-50px;
width:890px;
border-bottom:1px solid #ccc;
padding-bottom:20px; 
 }
 
 .htext{
	
	 float:right;
	 margin-right:70px;
	 color:#555;
word-wrap:break-word;
overflow:hidden;
width:650px;
text-decoration:none;
text-transform:capitalize;
 
 }
 
 .atext{
	
color:#035;
word-wrap:break-word;
overflow:hidden;
font-size:16px;
margin:5px 25px 5px 0px;

width:450px;
text-decoration:none;
text-transform:capitalize; 
 }
 .hcan
 {
	  height:5px;  width:108px; border:solid 1px #000; background-color:#fff;}
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
.slide{ width:8px; height:15px; background-color:#ccc; position:relative; margin-top:-12px; border-radius:1em;}
.fill{ width:0px; height:3px; padding-top:1px; padding-bottom:1px; background-color:#09F;}
.menu{ width:60px;
height:40px;
background:#92B901;
color:#ffffff;
font-weight:bold;
font-size:15px;
padding:5px;
float:left;
margin:5px;
-webkit-transition:-webkit-transform 1s,opacity 1s,background 1s,width 1s,height 1s,font-size 1s;
-webkit-border-radius:5px;
-o-transition-property:width,height,-o-transform,background,font-size,opacity;
-o-transition-duration:1s,1s,1s,1s,1s,1s;
-moz-transition-property:width,height,-o-transform,background,font-size,opacity;
-moz-transition-duration:1s,1s,1s,1s,1s,1s;
transition-property:width,height,transform,background,font-size,opacity;
transition-duration:1s,1s,1s,1s,1s,1s;
border-radius:5px;
opacity:0.4;

}
.menu:hover{ 
-moz-transform: rotate(360deg);
-webkit-transform: rotate(360deg);
-o-transform: rotate(360deg);
transform: rotate(360deg);
opacity:1;
background:#1ec7e6;
margin-top:-300px;
margin-left:-400px;
width:700px;
height:500px;
position:absolute;
z-index:2;}
.page{ margin-left:10px; color:#09f;}
#page{ margin-left:100px;}
</style>
<script type="text/javascript" src="js/jquery.js">
</script>
<script type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js">
</script>
<script>
/*
$(document).ready(function(e) {
	var rating=0;
		$(".slide").draggable({axis:'x',containment:'#hcan2',
		start: function(event, ui) {
      xpos = ui.position.left;
    },
	 stop: function(event, ui) {
      // calculate the dragged distance, with the current X and Y position and the "xpos" and "ypos"
      var xmove = ui.position.left - xpos;

      // define the moved direction: right, bottom (when positive), left, up (when negative)
      var xd = xmove >= 0 ? ' To right: ' : ' To left: ';
	  rating=rating+(xmove/20);
	  var a=rating.toFixed(1);
	  $("#result").html(a);
    }
	
	});

			
});*/
</script>
<script>
$(document).ready(function(e) {
    
	$(".like").click(function(e) {
		e.preventDefault();
       var id= $(this).attr('id').replace('slike','');
    
	var ds='id='+id;
		$.getJSON("lhotel.php",ds,function(data){
      
        if(data.success)
      {
		val=$("#blike"+id).html();
	  val=parseInt(val);
      $("#blike"+id).html(val+1);    
	  $("#like"+id).html("Unlike");
	  }
	  if(data.error)
	  {
		 	val=$("#blike"+id).html();
	  val=parseInt(val);
      $("#blike"+id).html(val-1);     
		$("#like"+id).html("Like"); 
		  
		  }
  
  });
	
	
	});
	
	$(".cinput").keyup(function(event) {
	event.preventDefault();
	 

  var id=$(this).attr('id').replace('cinput','');
  var msg=$(this).val();

  if(event.keyCode == 13 && msg!=''){
var ds="p_id="+id+"&msg="+msg;  
$.ajax({
type: "POST",
url: "updatereview.php",
data: ds,
cache: false,
success: function(html)
{

$("#commentss"+id).append(html);
 $("#cinput"+id).val('');	
$("#cinput"+id).focus();   	
}
 });



  }
});

$(".stcommentbody").mouseover(function(e) {
   
	var id=$(this).attr('id').replace('stcommentbody','cdelete');
	$("#"+id).css('display','inline');
});
$(".stcommentbody").mouseout(function(e) {
    var id=$(this).attr('id').replace('stcommentbody','cdelete');
	$("#"+id).css('display','none');
});


$(".stcommentdelete").click(function(event){
	event.preventDefault();
	var id=$(this).attr('id').replace('cdelete','');
	var ds="id="+id;
	
$.ajax({
type: "POST",
url: "deletereview.php",
data: ds,
cache: false,
success: function(html)
{
$("#stcommentbody"+id).slideUp(200);
}
 });


});

$(".commm").click(function(e){
	e.preventDefault();
	var id=$(this).attr('id').replace('cor','');
	$("#commentbox"+id).slideDown(200);
	})
	
	
});
</script>

</head>
<?php 

$url="http://".$_SERVER['HTTP_HOST'];
if(isset($_SESSION['email']))
$img=getimage();
else
$img['src']="images/noimage.jpg";
?>

<?php 
include 'connect.php';
$q1='';
$q2='';
$q3='';
$q4='';
$q5='';
if(isset($_REQUEST['hotel']))
{
$hotel=$_REQUEST['hotel'];	
$q1=" AND H.hname like '%$hotel%'";	
	}
if(isset($_REQUEST['loc']))
{
$loc=$_REQUEST['loc'];	
$q5=" AND H.hloc like '%$loc%'";	
	}


if(isset($_REQUEST['cuisine']))
{
$cuisine=$_REQUEST['cuisine'];	
$q2=" AND H.cusines like '%$cuisine%'";	
	}

if(isset($_REQUEST['rating']) && $_REQUEST['rating']>0)
{
$rating=$_REQUEST['rating'];	
$q3=" AND H.hid=R.hid AND R.rating >= $rating";	
$q4=",rating R ";	
	}


$sql="SELECT H.hid,H.hname,H.hloc,H.subscribers,H.likes,H.address,H.zlink,H.time,H.cusines FROM hotel H".$q4." where 1 ".$q1.$q2.$q3.$q5." order by likes desc";
$page=1;
if(isset($_REQUEST['page']))
$page=$_REQUEST['page'];

$r = mysql_query($sql);

$count=ceil(mysql_num_rows($r)/10);
if($count==0)
echo "<div style=\"margin-left:100px\">No Result Found </div>";
$p="limit ".(0+10*($page-1)).",10";
$sql1="SELECT H.hid,H.hname,H.hloc,H.subscribers,H.likes,H.address,H.zlink,H.time,H.cusines FROM hotel H".$q4." where 1 ".$q1.$q2.$q3.$q5." order by likes desc ".$p;


$result = mysql_query($sql1);

$j=0;
while($row = mysql_fetch_array($result))
  {
	  $j++;
	  $i=$row['hid'];
$rating=getrating($row['hid']);
$menu=getmenu($row['hid']);
 /* echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br />";
 */ 
if(isset($_SESSION['email']))
{
$data=getdetails();
$uid=$data['uid'];
}
else
$uid=0;


?>

 <div id="hid<?php echo $i;?>" class="hbody">
 <div class="htext" />
 <div id="details<?php echo $i;?>" style="float:right; text-align:right;">
 <?php echo '<span style="color:#999;">'.$row['hloc'].'</span><br/>';?>
 <?php echo '<span">'.$row['time'].'</span><br/>';?>
  Likes <b id="blike<?php echo $row['hid']?>"><?php echo $row['likes']?></b><br />
<span class="like" id="slike<?php echo $row['hid']?>"><a href="#" class="classname5" id="like<?php echo $row['hid']?>"><?php if(checkhlike($row['hid'],$uid)) echo "Unlike" ;else echo "Like";?></a></span>
<span class="commm" id="cor<?php echo $row['hid']?>"><a href="#" class="classname5">Reviews</a></span>

 </div>

 <b><?php echo $row['hname'];?></b><br>
 <span style="color:#999;"><?php echo $row['cusines'];?></span> <br>
Rating <div class="hcan" id="hcan<?php echo $i;?>"><div id="fill<?php echo $i;?>" class="fill"></div></div><div id="slide<?php echo $i;?>" class="slide"></div>
<span  style="float:left;  margin-left:120px; margin-top:-16px;" id="per<?php echo $i;?>"><?php echo $rating;?></span><br />

<div style="margin-top:-10px; margin-bottom:-10px;"><span style="margin-top:50px;"> <?php echo $row['address'];?> </span></div><br>




<b>Menu</b>
<div class="menu_container" id="menu<?php echo $row['hid']?>" >

<?php 

while($m=mysql_fetch_array($menu))
{
?>

<img src="<?php echo $m['src']?>"  class="menu"/>
<?php
}
?>
</div>

 
<?php 
$reviews=getreviews($i);
?>


<br /><br /><br /><br /><br /><br /><br /><br />
 
<div class="commentbox" id="commentbox<?php echo $i?>" style="float:left; display:none;">
<div class="stcommentbody" ></div>
<div id="commentss<?php echo $i?>">
<?php include 'loadreviews.php';?>
</div>
<div class="stcommentbody">
<div class="stcommentimg">
<img src="<?php echo $img['src'] ?>" class='small_img1'/>
</div>
<input type="text" class="cinput" id="cinput<?php echo $i?>" size="53" style="margin-top:8px;"/>
</div>
</div>

 
 
 
 
 
 
 
 </div>
 </div>  
 
 <script>
var temp;
 function getrating(ds)
 {
	 $.getJSON("getrating.php",ds,function(data){
     //alert(data.rating);
	 rat=data.rating;
	 temp=rat; 
	  rat=parseFloat(rat,10);
	  if(rat>5)
	  rat=5;
	  if(rat<0)
	  rat=0;
	  });	 
}

function updaterating(ds,s)
 {
	 $.getJSON("updaterating.php",ds,function(data){
     //alert(data.rating);
	if(data.error)
	 //alert(data.error);
	{ 
	
	  centerPopup();
	loadPopup();
	 $("#"+s.attr('id').replace("slide", "fill")).css({'width':20*temp,'background-color':'#09F'});
    s.css('left',20*temp);
    $("#"+s.attr('id').replace("slide", "per")).html(temp);

	}


	  });	 
}
var rating=<?php echo $rating?>;
var d=rating.toFixed(1);
 $("#fill<?php echo $i;?>").css('width',20*rating);
 $("#slide<?php echo $i;?>").css('left',20*rating);
 var c=document.getElementById("hcan<?php echo $i;?>");
var p=document.getElementById("per<?php echo $i;?>");
var rate="<?php echo $row['likes']?>";
/*
var per=rate/maxx;
var per1=(per*100).toFixed(1);
p.innerHTML="<b>"+per1+"% </b>"; 
/*var fill=300*per;
var ctx=c.getContext("2d");
ctx.fillStyle="#069"
ctx.fillRect(0,0,fill,150);    
*/
	
		$("#slide<?php echo $i;?>").draggable({axis:'x',containment:'#hcan<?php echo $i;?>',
		start: function(event, ui) {
      xpos = ui.position.left;
	  var hid=$(this).attr('id').replace("slide", "");
	var ds="hid="+hid;
	getrating(ds);		
	
	},
	 stop: function(event, ui) {
      // calculate the dragged distance, with the current X and Y position and the "xpos" and "ypos"
      var xmove = ui.position.left - xpos;
	  
	  

      // define the moved direction: right, bottom (when positive), left, up (when negative)
      var xd = xmove >= 0 ? ' To right: ' : ' To left: ';
	  //var temp=rat;
	  rat=rat+(xmove/20);
 var a=rat.toFixed(1);
	 if(a>5)
	 { a=5;
	  rat=5;
	 }
	  if(a<0)
	  {
	  a=0;
	  rat=0;
	  }
	 $("#fill<?php echo $i;?>").css({'width':20*a,'background-color':'#243'});
	  $("#per<?php echo $i;?>").html(a);
	  $(this).css('left',20*a);
	  var hid=$(this).attr('id').replace("slide", "");
	var ds="hid="+hid+"&rating="+a;
	updaterating(ds,$(this));		
	
	}
	
	});


 </script>



<?php
}
$url=$url."/prj/hotels.php?";
if(isset($_REQUEST['hotel']))
$url=$url."&hotel=".$_REQUEST['hotel'];
if(isset($_REQUEST['loc']))
$url=$url."&loc=".$_REQUEST['loc'];
if(isset($_REQUEST['cuisine']))
$url=$url."&cuisine=".$_REQUEST['cuisine'];
if(isset($_REQUEST['rating']))
$url=$url."&rating=".$_REQUEST['rating'];

echo "<div id=\"page\">";
for($i=1;$i<=$count;$i++)
{
if($page==$i)
{
//echo "<a class=\"page\" class=\"pselect\" href=\"$l&page=$i\">$i</a>";
echo "<span style=\"margin-left:10px;\">$page</span>";
}
else
echo "<a class=\"page\" href=\"$url&page=$i\">$i</a>";

}
echo "</div>";

mysql_close($con);
?>