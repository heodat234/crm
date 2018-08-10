(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

})();
$(document).ready(function(){
    
    $("[data-toggle=tooltip]").tooltip();

    $('.num').click(function () {
        var num = $(this);
        var text = $.trim(num.find('.txt').clone().children().remove().end().text());
        var telNumber = $('#user-call-search');
        $(telNumber).val(telNumber.val() + text);
    });

    $("#status-selection").click(function() {
		$("#status-options").toggleClass("active");
	});
});

$(document).on('click','#dropdown-btn',function(){
	var cur = $(this);
	if (cur.parent().find('.show').length>0) {
		cur.next().removeClass('show');
        $('#phone-chat').css('display','none');
	}else{
		hideScreen(5);
		cur.parent().find('.dropdown-menu').addClass('show');
        $('#phone-chat').css('display','block');
	}
});

$(document).on('click','#accept-call',function(){
	// hideScreen(1);
});

$(document).on('click','#call-direct',function(){
	hideScreen(4);
});

$(document).on('click','#call-to',function(){
    hideScreen(6);
});

function hideScreen(hide,data={}) {
    console.log(data);
    switch (hide) {
      case 0:
            $('#c-chanel').css('display', 'block');
                $('#c-chanel #channel').attr('channel',data.channel!=null?data.channel:'');
            $('#c-phone-option').css('display', 'block');
            $('#c-call-header').css('display', 'none');
            $('#call-search').css('display', 'none');
            $('#call-input').css('display', 'none');
            $('#has-call-pad').css('display', 'block');

                $('#has-call-pad').find('#num-pad').css('display', 'none');
                $('#has-call-pad').find('#c-title').html('Cuộc gọi đến').css('display', 'block');
                $('#has-call-pad').find('.loader').css('display', 'block');
                $('#has-call-pad').find('#c-avatar').find('img').attr('src',data.avatar!==null?data.avatar:'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg').css('display', 'initial');
	            $('#has-call-pad').find('#c-name').html(data.custname).css('display', 'block');
	            $('#has-call-pad').find('#c-number').attr({'custid':(data.custid!=null?data.custid:''),'act':data.phone_act}).html(data.phone).css('display', 'block');
                $('#has-call-pad').find('#c-time').html('').css('display', 'block');
                $('#has-call-pad').find('#c-record').css('display', 'none');
                $('#has-call-pad').find('#c-option-1').css('display', 'block');
                $('#has-call-pad').find('#c-option-2').css('display', 'block');
                $('#has-call-pad').find('#c-ticket').css('display', 'none');
                $('#has-call-pad').find('#c-hang-up').css('display', 'none');
                // button area
                $('#has-call-pad').find('#are-b-end').css('display', 'none');
                $('#has-call-pad').find('#are-b-has').css('display', 'flex'); 
                $('#has-call-pad').find('#are-b-call').css('display', 'none');
                $('#has-call-pad').find('#are-b-direct').css('display', 'none');
                $('#has-call-pad').find('#are-b-close').css('display', 'none');
            break;
      case 1:
            // call answered from phone number
            $('#c-chanel').css('display', 'block');
                $('#c-chanel #channel').attr('channel',data.channel!=null?data.channel:'');
            $('#c-phone-option').css('display', 'block');
            $('#c-call-header').css('display', 'none');
            $('#call-search').css('display', 'none');
            $('#call-input').css('display','none');
            $('#has-call-pad').css('display', 'block');
                $('#has-call-pad').find('#num-pad').css('display', 'none');
                $('#has-call-pad').find('#c-title').html('Cuộc gọi đến').css('display', 'block');
                $('#has-call-pad').find('.loader').css('display', 'none');
                $('#has-call-pad').find('#c-avatar').find('img').attr('src',data.avatar!==null?data.avatar:'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg').css('display', 'initial');
                $('#has-call-pad').find('#c-name').html(data.custname).css('display', 'block');
                $('#has-call-pad').find('#c-number').attr({'custid':(data.custid!=null?data.custid:''),'act':data.phone_act}).html(data.phone).css('display', 'block');
                $('#has-call-pad').find('#c-time').css('display', 'none');
                $('#has-call-pad').find('#c-record').css('display', 'block');
                $('#has-call-pad').find('#c-option-1').css('display', 'none');
                $('#has-call-pad').find('#c-option-2').css('display', 'none');
                $('#has-call-pad').find('#c-ticket').attr('ticketid',data.ticket!=null?data.ticket:'').html(data.ticket!=null?'#Phiếu '+data.ticket:'').css('display', 'block');
                $('#has-call-pad').find('#c-hang-up').css('display', 'flex');
                // button area
                $('#has-call-pad').find('#are-b-end').css('display', 'block');
                $('#has-call-pad').find('#are-b-has').css('display', 'none'); 
                $('#has-call-pad').find('#are-b-call').css('display', 'none');
                $('#has-call-pad').find('#are-b-direct').css('display', 'none');
                $('#has-call-pad').find('#are-b-close').css('display', 'none');
            break;
      case 2:
            // call direct to extension
            $('#c-chanel').css('display', 'none');
                $('#c-chanel #channel').attr('channel',data.channel!=null?data.channel:'');
            $('#c-phone-option').css('display', 'none');
            $('#c-call-header').css('display', 'block');
                $('#c-call-header #u-name').html(data.custname).css('display','block');
                $('#c-call-header #u-avatar').attr('src',data.avatar).css('display','block');
                $('#c-call-header #u-time').css('display','block');
                $('#c-call-header #u-phone').html(data.phone).css('display','block');
                $('#c-call-header #u-ticket').css('display','block');
            $('#call-search').css('display', 'block');
            $('#call-input').css('display','none');
                $('#call-input ul').attr('action','tranfer');
            $('#has-call-pad').css('display', 'block');
                $('#has-call-pad').find('#num-pad').css('display', 'block');
                $('#has-call-pad').find('#c-title').html('Cuộc gọi đến').css('display', 'none');
                $('#has-call-pad').find('.loader').css('display', 'none');
                $('#has-call-pad').find('#c-avatar').find('img').attr('src',data.avatar!==null?data.avatar:'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg').css('display', 'none');
                $('#has-call-pad').find('#c-name').html(data.custname).css('display', 'none');
                $('#has-call-pad').find('#c-number').attr({'custid':(data.custid!=null?data.custid:''),'act':data.phone_act}).html(data.phone).css('display', 'none');
                $('#has-call-pad').find('#c-time').html('').css('display', 'none');
                $('#has-call-pad').find('#c-record').css('display', 'none');
                $('#has-call-pad').find('#c-option-1').css('display', 'none');
                $('#has-call-pad').find('#c-option-2').css('display', 'none');
                $('#has-call-pad').find('#c-ticket').css('display', 'none');
                $('#has-call-pad').find('#c-hang-up').css('display', 'none');
                // button area
                $('#has-call-pad').find('#are-b-end').css('display', 'none');
                $('#has-call-pad').find('#are-b-has').css('display', 'none'); 
                $('#has-call-pad').find('#are-b-call').css('display', 'none');
                $('#has-call-pad').find('#are-b-direct').css('display', 'flex');
                $('#has-call-pad').find('#are-b-close').css('display', 'none');
            break;
      case 3:
            // direct to extension
            $('#c-chanel').css('display', 'none');
                $('#c-chanel #channel').attr('channel',data.channel!=null?data.channel:'');
            $('#c-phone-option').css('display', 'none');
            $('#c-call-header').css('display', 'block');
            $('#call-search').css('display', 'none');
            $('#call-input').css('display','none');
                $('#call-input ul').attr('action','tranfer');
            $('#has-call-pad').css('display', 'block');
                $('#has-call-pad').find('#num-pad').css('display', 'none');
                $('#has-call-pad').find('#c-title').html('Kết nối chuyển tiếp').css('display', 'block');
                $('#has-call-pad').find('.loader').css('display', 'block');
                $('#has-call-pad').find('#c-avatar').find('img').attr('src',data.avatar!==null?data.avatar:'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg').css('display', 'initial');
                $('#has-call-pad').find('#c-name').html(data.custname).css('display', 'block');
                $('#has-call-pad').find('#c-number').attr({'custid':(data.custid!=null?data.custid:''),'act':data.phone_act}).html(data.phone).css('display', 'block');
                $('#has-call-pad').find('#c-time').html('').css('display', 'block');
                $('#has-call-pad').find('#c-record').css('display', 'none');
                $('#has-call-pad').find('#c-option-1').css('display', 'none');
                $('#has-call-pad').find('#c-option-2').css('display', 'none');
                $('#has-call-pad').find('#c-ticket').css('display', 'none');
                $('#has-call-pad').find('#c-hang-up').css('display', 'none');
                // button area
                $('#has-call-pad').find('#are-b-end').css('display', 'none');
                $('#has-call-pad').find('#are-b-has').css('display', 'none'); 
                $('#has-call-pad').find('#are-b-call').css('display', 'none');
                $('#has-call-pad').find('#are-b-direct').css('display', 'flex');
                $('#has-call-pad').find('#are-b-close').css('display', 'none');
            break;
            break;
      case 4:
            $('#phone-pad').css('display', 'block');

            	$('#phone-pad').find('.num-pad').css('display', 'none');
            	$('#phone-pad').find('#c-avatar').css('display', 'block');
            	$('#phone-pad').find('#c-title').css('display', 'block');
            	$('#phone-pad').find('.loader').css('display', 'block');
            	$('#phone-pad').find('#c-name-status').css('display', 'block');
            	$('#phone-pad').find('#c-number').css('display', 'block');
            	$('#phone-pad').find('#c-time').css('display', 'block');
            	$('#phone-pad').find('#are-b-call').css('display', 'none');
            	$('#phone-pad').find('#are-b-direct').css('display', 'none');
            	$('#phone-pad').find('#are-b-close').css('display', 'block');

            $('#call-search').css('display', 'none');
            break;
      case 5:
            $('#c-chanel').css('display', 'block');
                $('#c-chanel #channel').attr('channel',data.channel!=null?data.channel:'');
            $('#c-phone-option').css('display', 'block');
            $('#c-call-header').css('display', 'none');
            $('#call-search').css('display', 'block');
            $('#call-input').css('display','none');
                $('#call-input ul').attr('action','call');
            $('#has-call-pad').css('display', 'block');
                $('#has-call-pad').find('#num-pad').css('display', 'block');
                $('#has-call-pad').find('#c-title').html('Cuộc gọi đi').css('display', 'none');
                $('#has-call-pad').find('.loader').css('display', 'none');
                $('#has-call-pad').find('#c-avatar').find('img').attr('src',data.avatar!==null?data.avatar:'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg').css('display', 'none');
                $('#has-call-pad').find('#c-name').html(data.custname).css('display', 'none');
                $('#has-call-pad').find('#c-number').attr({'custid':(data.custid!=null?data.custid:''),'act':data.phone_act}).html(data.phone).css('display', 'none');
                $('#has-call-pad').find('#c-time').css('display', 'none');
                $('#has-call-pad').find('#c-record').css('display', 'none');
                $('#has-call-pad').find('#c-option-1').css('display', 'none');
                $('#has-call-pad').find('#c-option-2').css('display', 'none');
                $('#has-call-pad').find('#c-ticket').css('display', 'none');
                $('#has-call-pad').find('#c-hang-up').css('display', 'none');
                // button area
                $('#has-call-pad').find('#are-b-end').css('display', 'none');
                $('#has-call-pad').find('#are-b-has').css('display', 'none'); 
                $('#has-call-pad').find('#are-b-call').css('display', 'block');
                $('#has-call-pad').find('#are-b-direct').css('display', 'none');
                $('#has-call-pad').find('#are-b-close').css('display', 'none');
            break;
      case 6:
            $('#c-chanel').css('display', 'block');
            $('#c-phone-option').css('display', 'block');
            $('#c-call-header').css('display', 'none');
            $('#call-search').css('display', 'block');
            $('#phone-pad').css('display', 'none');
            $('#has-call-pad').css('display', 'block');
                $('#has-call-pad').find('#c-name').css('display', 'block');
                $('#has-call-pad').find('#c-number').css('display', 'block');
                $('#has-call-pad').find('#c-option-1').css('display', 'none');
                $('#has-call-pad').find('#c-option-2').css('display', 'none');
                $('#has-call-pad').find('#are-b-has').css('display', 'none');

                $('#has-call-pad').find('#c-time').css('display', 'block');
                $('#has-call-pad').find('#c-ticket').css('display', 'block');
                $('#has-call-pad').find('#c-hang-up').css('display', 'flex');
                $('#has-call-pad').find('#are-b-end').css('display', 'block');
            break;
      case 7:
        // call outside to phone number
            $('#c-chanel').css('display', 'block');
                $('#c-chanel #channel').attr('channel',data.channel!=null?data.channel:'');
            $('#c-phone-option').css('display', 'block');
            $('#c-call-header').css('display', 'none');
            $('#call-search').css('display', 'none');
            $('#call-input').css('display','none');
            $('#has-call-pad').css('display', 'block');
                $('#has-call-pad').find('#num-pad').css('display', 'none');
                $('#has-call-pad').find('#c-title').html('Cuộc gọi đi').css('display', 'block');
                $('#has-call-pad').find('.loader').css('display', 'block');
                $('#has-call-pad').find('#c-avatar').find('img').attr('src',data.avatar!==null?data.avatar:'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg').css('display', 'initial');
                $('#has-call-pad').find('#c-name').html(data.custname).css('display', 'block');
                $('#has-call-pad').find('#c-number').attr({'custid':(data.custid!=null?data.custid:''),'act':data.phone_act}).html(data.phone).css('display', 'block');
                $('#has-call-pad').find('#c-time').html('Đang kết nối').css('display', 'block');
                $('#has-call-pad').find('#c-record').css('display', 'none');
                $('#has-call-pad').find('#c-option-1').css('display', 'none');
                $('#has-call-pad').find('#c-option-2').css('display', 'none');
                $('#has-call-pad').find('#c-ticket').css('display', 'block');
                $('#has-call-pad').find('#c-hang-up').css('display', 'flex');
                // button area
                $('#has-call-pad').find('#are-b-end').css('display', 'block');
                $('#has-call-pad').find('#are-b-has').css('display', 'none'); 
                $('#has-call-pad').find('#are-b-call').css('display', 'none');
                $('#has-call-pad').find('#are-b-direct').css('display', 'none');
                $('#has-call-pad').find('#are-b-close').css('display', 'none');
            break;
    }
}