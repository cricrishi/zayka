$(document).ready(function(e) {
    
$("#spost").click(function(e) {
    e.preventDefault();
	e.stopImmediatePropagation();
$('#spost').unbind('click');
var msg=$("#post").val();
var ds="msg="+msg;
if(msg=='')
{}
else
{
$("#flash").show();
$("#flash").fadeIn(400).html('Loading Post...');


$.ajax({
type: "POST",
url: "wall/updatepost.php",
data: ds,
cache: false,
success: function(html)
{
$("#flash").fadeOut('slow');
$("#load").prepend(html);
 $("#post").val('');	
$("#post").focus();   	
}
 });

}
});	


$(".cinput").keyup(function(event) {
	event.preventDefault();
	 

  var id=$(this).attr('id').replace('cinput','');
  var msg=$(this).val();
  if(event.keyCode == 13 && msg!=''){
	  
event.stopImmediatePropagation();
$('.cinput').unbind('keyup');
$('.likes').unbind('click');
var ds="p_id="+id+"&msg="+msg;  
$.ajax({
type: "POST",
url: "wall/updatecomment.php",
data: ds,
cache: false,
success: function(html)
{

$("#comments"+id).append(html);
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


$(".post").mouseover(function(e) {
    var id=$(this).attr('id').replace('p_id','pdelete');
	$("#"+id).css('display','inline');
});
$(".post").mouseout(function(e) {
    var id=$(this).attr('id').replace('p_id','pdelete');
	$("#"+id).css('display','none');
});



$(".postdelete").click(function(event){
	event.preventDefault();
	var id=$(this).attr('id').replace('pdelete','');
	var ds="id="+id;
	
$.ajax({
type: "POST",
url: "wall/deletepost.php",
data: ds,
cache: false,
success: function(html)
{
$("#p_id"+id).slideUp(200);

}
 });


});




$(".stcommentdelete").click(function(event){
	event.preventDefault();
	var id=$(this).attr('id').replace('cdelete','');
	var ds="id="+id;
	
$.ajax({
type: "POST",
url: "wall/deletecomment.php",
data: ds,
cache: false,
success: function(html)
{
$("#stcommentbody"+id).slideUp(200);
}
 });


});

$(".plike").mouseover(function(){

var id=$(this).attr('id').replace('plike','plikers');
$("#"+id).css('display','block');
	})

$(".plike").mouseout(function(){

var id=$(this).attr('id').replace('plike','plikers');
$("#"+id).css('display','none');
	})

$(".clike").mouseover(function(){

var id=$(this).attr('id').replace('clike','clikers');
$("#"+id).css('display','block');
	})

$(".clike").mouseout(function(){

var id=$(this).attr('id').replace('clike','clikers');
$("#"+id).css('display','none');
	})


	

$(".likes").click(function(e){
	
e.stopImmediatePropagation();

var id=$(this).attr('id').replace('likes','');	
var ds="id="+id;
if($(this).html()=='Like')
$(this).html('Unlike');	
else
$(this).html('Like');	

$.ajax({
type: "POST",
url: "wall/makeplike.php",
data: ds,
cache: false,
success: function(html)
{

}
 });

	});



$(".mcomments").click(function(e){
	
e.stopImmediatePropagation();	
var id=$(this).attr('id').replace('mcomments','cinput');	
$("#"+id).focus();	
});


	

$(".clikes").click(function(e){
	
e.stopImmediatePropagation();

var id=$(this).attr('id').replace('clikes','');	
var ds="id="+id;
if($(this).html()=='Like')
$(this).html('Unlike');	
else
$(this).html('Like');	

$.ajax({
type: "POST",
url: "wall/makeclike.php",
data: ds,
cache: false,
success: function(html)
{
}
 });

	});





$("#i4").click(function(e) {

centerPopup();
loadPopup();    
upload();
});


$("#sfriend").keyup(function(e) {
    
var msg=$(this).val();
var ds="msg="+msg;
if(msg=='')
{
	$("#is1").hide();
	}
	
else{
$.ajax({
type: "POST",
url: "wall/search_user.php",
data: ds,
cache: false,
success: function(html)
{
$("#is1").show();
$("#is1").html(html);
}
 });


}
	
	
});


$("#bbody").mouseleave(function(e) {
    $("#is1").fadeOut(500);

	
});
$(".box").click(function(e) {
 var id=  $(this).attr('id').replace('box','');
var ds='fid='+id;
$.ajax({
type: "POST",
url: "wall/friends.php",
data: ds,
cache: false,
success: function(html)
{
$("#bresult").html(html);
}
 });



});


$("#i2").click(function(e) {
var ds='';
$.ajax({
type: "POST",
url: "wall/notifi.php",
data: ds,
cache: false,
success: function(html)
{
$("#is1").show();
$("#is1").html(html);
}
 });


	
});


$("#i3").click(function(e) {
var ds='';
$.ajax({
type: "POST",
url: "wall/myfriends.php",
data: ds,
cache: false,
success: function(html)
{
$("#is1").show();
$("#is1").html(html);
}
 });


	
});

setInterval(function() {
var ds='';
$.ajax({
type: "POST",
url: "wall/frequest.php",
data: ds,
cache: false,
success: function(html)
{
$("#is2").show();
$("#is2").html(html);
}
 });

$.ajax({
type: "POST",
url: "wall/tfriends.php",
data: ds,
cache: false,
success: function(html)
{
$("#is3").show();
$("#is3").html(html);
}
 });

      
}, 2000);


});
