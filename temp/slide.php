<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.14.custom.min.js"></script>
<style>
 #slide{ width:8px; height:15px; background-color:#555; position:relative; margin-top:-12px; border-radius:1em;}
#fill{ width:108px; height:3px; padding-top:1px; padding-bottom:1px; background-color:#09F;}
#hcan
 {
	  height:5px;  width:108px; border:solid 1px #000; background-color:#fff;}


</style>

</head>
<?php 
if(!isset($rating)){
	$rating=5;
	}

?>
<body>
<div id="hcan"><div id="fill"></div></div>
<div id="slide"></div>
<div id="per">5</div>
<script>

var rating=<?php echo $rating?>;
 $("#fill").css('width',20*rating);
 $("#slide").css('left',20*rating);

$("#slide").draggable({axis:'x',containment:'#hcan',

start: function(event, ui) {
      xpos = ui.position.left;
    },
    // when dragging stops
    stop: function(event, ui) {
      // calculate the dragged distance, with the current X and Y position and the "xpos" and "ypos"
      var xmove = ui.position.left - xpos;
	  rating=rating+(xmove/20);
 var a=rating.toFixed(1);
	 if(a>5)
	 { a=5;
	  rating=5;
	 }
	  if(a<0)
	  {
	  a=0;
	  rating=0;
	  }
	 $("#fill").css({'width':20*a,'background-color':'#09f'});
	  $("#per").html(a);
	  $(this).css('left',20*a);
      // define the moved direction: right, bottom (when positive), left, up (when negative)
    }


});
</script>
</body>
</html>