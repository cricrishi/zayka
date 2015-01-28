<head>
<style>
.small_img{ float:left;
height:100px;
width:150px;
padding:3px;
border-radius:1em;
 }
.fbody{margin-top:10px;
overflow:auto;
margin-left:10px;
width:690px;
 }
 .ftext{
	 float:right;
	 margin-right:70px;
	 color:#555;
word-wrap:break-word;
overflow:hidden;
width:450px;
text-decoration:none;
text-transform:capitalize;
 
 }
</style>
<script>
$(document).ready(function(e) {
   
    $(".subs").click(function(e){
		e.preventDefault();
		var id=$(this).attr('id').replace('subs','');
	var ds='id='+id;
		$.getJSON("sfoodie.php",ds,function(data){
      
        if(data.success)
      {
		
      val=$("#s"+id).html();
	  val=parseInt(val);
      $("#s"+id).html(val+1);
	  document.getElementById("subs"+id).innerHTML="<a href=\"#\"class=\"classname5\" id=\"subs\"+id>Unsubscribe</a>";
	  }
	  if(data.error)
	  {
	val=$("#s"+id).html();
	  val=parseInt(val);
      $("#s"+id).html(val-1);  
     	document.getElementById("subs"+id).innerHTML="<a href=\"#\"class=\"classname5\" id=\"subs\"+id>Subscribe</a>";	  
		  }
  
  });
			
			

	
	
		
		})
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

$result = mysql_query("SELECT * FROM users  order by tfriends desc",$con);
$i=0;  
while(($row = mysql_fetch_array($result))&&$i<5)
  {
  
  $r=mysql_query("Select * from images where uid=$row[uid] ");
while($row1 = mysql_fetch_array($r))
  $src=$row1['src'];

?>


 <div id="hid<?php echo $i;?>" class="fbody">
 <div class="fimage"> 
 <img  class ="small_img" src="<?php echo $src?>" id="dp<?php echo $row['uid']?>"/>
 </div>
 <div class="ftext" />
 <b><?php echo $row['fname']." ".$row['lname'];?></b><br>
 <?php echo $row['email'];?> <br>
 Subscribers <b id="s<?php echo $row['uid']?>"><?php echo $row['tsubs'] ?></b><br />
<div class="subs" id="subs<?php echo $row['uid'];?>"><a href="#"class="classname5" id="subs<?php echo $row['uid']?>"><?php if(checksub($row['uid'],$uid)) echo "Unsubscribe" ;else echo "Subscribe";?></a></div>

 </div>
 </div>  
 
 <script>

 </script>




<?php  
  $i++;
  }


?>