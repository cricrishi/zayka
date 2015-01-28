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
margin-left:10px;
width:690px;

 }
 .htext{
	
	 float:right;
	 margin-right:70px;
	 color:#555;
word-wrap:break-word;
overflow:hidden;
width:450px;
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
.slide{ width:8px; height:15px; background-color:#eee; position:relative; margin-top:-12px; border-radius:1em;}
.fill{ width:0px; height:3px; padding-top:1px; padding-bottom:1px; background-color:#09F;}
</style>

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
});
</script>

</head>
<?php 
include 'connect.php';
if(isset($_SESSION['email']))
{
$data=getdetails();
$uid=$data['uid'];
}
else
$uid=0;
$result = mysql_query("SELECT * FROM hotel order by likes desc LIMIT 5");

$j=0;
while($row = mysql_fetch_array($result))
  {
	  $j++;
	  $i=$row['hid'];
$rating=getrating($row['hid']);


 /* echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br />";
 */ 
?>

 <div id="hid<?php echo $i;?>" class="hbody">
 <div class="himage"> 
 <img  class ="small_img" src="cusines/img<?php echo $j;?>.jpg"/>
 </div>
 <div class="htext" />
 <div id="details<?php echo $i;?>" style="float:right; text-align:right;">
  <?php echo '<span style="color:#999;">'.$row['hloc'].'</span><br/>';?>
 <?php echo '<span">'.$row['time'].'</span><br/>';?>
  Likes <b id="blike<?php echo $row['hid']?>"><?php echo $row['likes']?></b><br />
 </div>

 <b><?php echo $row['hname'];?></b><br>
<span style=""> <?php echo $row['address'];?> </span><br>
 <span style="color:#999;"><?php echo $row['cusines'];?></span> <br>
Rating <div class="hcan" id="hcan<?php echo $i;?>"><div id="fill<?php echo $i;?>" class="fill"></div></div><div id="slide<?php echo $i;?>" class="slide"></div>
<span  style="float:left;  margin-left:120px; margin-top:-16px;" id="per<?php echo $i;?>"><?php echo $rating;?></span><br>
<span class="like" id="slike<?php echo $row['hid']?>"><a href="#" class="classname5" id="like<?php echo $row['hid']?>"><?php if(checkhlike($row['hid'],$uid)) echo "Unlike" ;else echo "Like"; ?></a></span>
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

mysql_close($con);
?>