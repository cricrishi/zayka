var count=0;
var width=0;
var length=0;
var flag=false;
function check()
{ if(flag)
	$("#left,#right").css('display','inline');

	if(count==0)
{$("#right").css('display','none');
	}
	
else if(count==3)
{
	$("#left").css('display','none');
}

	}

function scroller()
{
	length=$(".elements").length;
	width=$(".elements").width()/length;
		
$("#container").animate({left:-count*width});

check();
}
$(document).ready(function(e) {
	$("#left,#right").css('opacity',.5);
	$("#left").click(function(){
	if(count!=3)
	{
	count++;
	scroller();
	}
		});
	$("#right").click(function(){
	if(count!=0)
	{
	count--;
	scroller();
	}
			});
			$("#left").mouseover(function(){
				$("#left").css('cursor','pointer');
				$("#left").css('opacity',1);
				});
			$("#left,#right").mouseout(function(){
				
				$("#left,#right").css('opacity',.5);
				})	
			$("#right").mouseover(function(){
				$("#right").css('cursor','pointer');
				$("#right").css('opacity',1);
				})	
			$("#wrapper,#left,#right").mouseover(function(){
				flag=true;
				check();
				
								
					});
 
 $("#wrapper").mouseout(function(){
				$("#left,#right").css('display','none');
							flag=false;	
					});
    

setInterval(function(){
if(count!=3)
$("#left").click();
else
{count=0;
scroller();
	}
		},5000);


});


