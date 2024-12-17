$(document).ready(function(){
$('.oktell-call-button').click(function(){
	var number = $(this).attr('phone');
	$('#call-result').load('/call/callm.php?n='+number, function(responce) {
			console.log(responce);
	});
	alert('Вызываю номер: '+number);

});
	});