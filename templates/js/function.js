	$(document).ready(function(){
		$('.edit-remind').click(function(){
			$('body').append('<div class="edit-remind-bg"></div><div class="edit-remind-body" style="opacity: 0;"></div>');
			$('.edit-remind-body').load('/bitrix/components/eholab/tasks.list/templates/.default/edit-task.php?i='+$(this).attr('i'), function(){
				$('.edit-remind-body').attr('style', '');
				$('.edit-remind-body').ACS();
			});
		});
		$('.delete-remind').click(function(){
			$(this).load('/bitrix/components/eholab/tasks.list/templates/.default/delete-task.php?i='+$(this).attr('i'));
		});
		
		$('.top-menu-link').click(function(){
			var mh = $('.hidden-user-menu div').height();
			if(mh > 0){
				 $( ".hidden-user-menu div" ).animate({
				height: 0,
				}, 500, function() {
					$('.top-menu-link').removeClass('active');
				});			
				
			}else{
				$('.top-menu-link').addClass('active');
				var h = 0;
				$('.hidden-user-menu').find('a').each(function(){
					h = h + $(this).height() + 2;
				});			
				 $( ".hidden-user-menu div" ).animate({
				height: h,
				}, 500, function() {
				// Animation complete.
				});			
			}
		});
		
		$('.view-alerts	').click(function(){
			var mh = $('.popup-alerts-block').height();
			if(mh > 0){
				 $( ".popup-alerts-block" ).animate({
				height: 0,
				}, 500, function() {
					$('.view-alerts').removeClass('active');
					$('.main-menu table td:last-child.active').css('border-bottom-right-radius', '6px');
					$('.main-menu').css('border-bottom-right-radius', '6px');
				});			
				
			}else{
				$('.view-alerts').addClass('active');
				$('.main-menu table td:last-child.active').css('border-bottom-right-radius', '0px');
				$('.main-menu').css('border-bottom-right-radius', '0px');
				
				var h = 0;
				$('.popup-alerts-block').find('a').each(function(){
					h = h + $(this).height() + 6;
				});			
				h = h + 6;
				 $( ".popup-alerts-block" ).animate({
				height: h,
				}, 500, function() {
				// Animation complete.
				});			
			}
		});
		
	$('.add-s-files').click(function(){
		$('#tload').remove();
		$('body').append('<iframe style="display: none;" id="tload" src="/bitrix/components/eholab/catalog.section/templates/pay/ajax_upload.php?i='+$(this).attr('i')+'"></iframe>');
		setTimeout(second_passed, 200)
	});
	
		$('.delete-p-file').click(function(){
			$(this).load('/bitrix/components/eholab/catalog.section/templates/pay/df.php?i='+$(this).attr('i')+'', function(){
				$(this).parent('div.ofile').remove();
			});
		});
	});
	// первый аргумент - функция
function second_passed() {
		var xxx = $("#tload").contents().find("#gotoselect");
		$(xxx).click();
}

$.fn.ACS = function() {
    this.css("position", "fixed");
	var ttop = ($(window).height() - this.outerHeight()) / 2 + $(window).scrollTop();
    this.css("top", ttop + "px");
    this.css("left", ($(window).width() - this.outerWidth()) / 2 + $(window).scrollLeft() + "px");
    return this
};

function closeEdRe(){
	$('.edit-remind-bg').remove();
	$('.edit-remind-body').remove();
}

function tnt(e){
	if($(e).prop("checked")){
		$(e).parent('td').find('select').attr('style', 'display: none');
		$(e).parent('td').find('span').attr('style', 'display: none');
	}else{
		$(e).parent('td').find('select').attr('style', '');
		$(e).parent('td').find('span').attr('style', '');
	}
}

function saveEditableRemind(e){
	var form_data = $(e).closest('form').serialize();
	$.ajax({
		type: "POST",
		url: "/bitrix/components/eholab/tasks.list/templates/.default/edit-task-save.php",
		data: form_data,
		dataType: 'script',
		error: function(rr){
			console.log(rr);
		}
	});	
}

function setResponse(u, deal){
	var form_data = false;
	$.ajax({
		type: "POST",
		url: "/bitrix/components/eholab/deals/templates/.default/setResp.php?u="+u+"&d="+deal,
		data: form_data,
		dataType: 'script',
		error: function(rr){
			console.log(rr);
		}
	});	
	
}
function unserialize(data) {
    data = data.split('&');
    var response = {};
    for (var k in data){
        var newData = data[k].split('=');
        response[newData[0]] = newData[1];
    }
    return response;
}


	
