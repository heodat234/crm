<script type="text/javascript">
	$(document).ready( function () {
    var ticketchannel = '<?php echo $ticket['data'][0]['ticketchannel'] ?>';
    var status = '<?php echo $ticket['data'][0]['status'] ?>';
    if(ticketchannel != '')
    {
		$('#ticketchannel').val(ticketchannel);
    }
    if(status != '')
    {
		$('#status').val(status);
    }
    $('#createat').datetimepicker();
    $('#SLA').datetimepicker();
    $('#appointmentdate').datetimepicker();
    $('#finishday').datetimepicker();
	});

  $('.btn-updateTicket4').click(function(){
      var ticketid = $(this).attr('title');
      var agentcreated = $('#agentcreated').val();
      var ticketchannel = $('#ticketchannel').val();
      var action= 'Sửa nguồn phiếu thành '+ticketchannel+'';
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicket' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid: ticketid, agentcreated: agentcreated,agentcurrent : null,ticketchannel:ticketchannel,levelticket:null,status: null,type:null, priority: null,createat:null,SLA:null,appointmentdate:null,finishday:null, action:action},
            })
            .done(function(data) {
              location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data;
                                })
            .fail(function() {
               alert('Fail');
            });
  });

	$('.btn-updateTicket5').click(function(){
      var ticketid = $(this).attr('title');
      var agentcreated = $('#agentcreated').val();
      var action= 'Sửa ưu tiên '+levelticket+'';
      var levelticket = $('#levelticket').val();
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicket' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid: ticketid, agentcreated: agentcreated,agentcurrent : null,ticketchannel:null,levelticket:levelticket,status: null,type:null, priority: null,createat:null,SLA:null,appointmentdate:null,finishday:null, action:action},
            })
            .done(function(data) {
              location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data;
                                })
            .fail(function() {
               alert('Fail');
            });
  });
  $('.btn-updateTicket6').click(function(){
      var ticketid = $(this).attr('title');
      var agentcreated = $('#agentcreated').val();
      var status = $('#status').val();
      var action= 'Sửa trạng thái '+status+'';
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicket' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid: ticketid, agentcreated: agentcreated,agentcurrent : null,ticketchannel:null,levelticket:null,status: status,type:null, priority: null,createat:null,SLA:null,appointmentdate:null,finishday:null, action:action},
            })
            .done(function(data) {
              location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data;
                                })
            .fail(function() {
               alert('Fail');
            });
  });
  $('.btn-updateTicket7').click(function(){
      var ticketid = $(this).attr('title');
      var agentcreated = $('#agentcreated').val();
      var type = $('#type').val();
      var action= 'Sửa phân loại '+type+'';
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicket' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid: ticketid, agentcreated: agentcreated,agentcurrent : null,ticketchannel:null,levelticket:null,status: null,type:type, priority: null,createat:null,SLA:null,appointmentdate:null,finishday:null, action:action},
            })
            .done(function(data) {
              location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data;
                                })
            .fail(function() {
               alert('Fail');
            });
  });
  $('.btn-updateTicket8').click(function(){
      var ticketid = $(this).attr('title');
      var agentcreated = $('#agentcreated').val();
      var priority = $('#priority').val();
      var action= 'Sửa giai đoạn '+priority+'';
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicket' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid: ticketid, agentcreated: agentcreated,agentcurrent : null,ticketchannel:null,levelticket:null,status: null,type:null, priority: priority,createat:null,SLA:null,appointmentdate:null,finishday:null, action:action},
            })
            .done(function(data) {
              location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data;
                                })
            .fail(function() {
               alert('Fail');
            });
  });

  $('.btn-updateTicket9').click(function(){
      var ticketid = $(this).attr('title');
      var agentcreated = $('#agentcreated').val();
      var createat = $('#createat').val();
      var action= 'Sửa ngày tạo '+createat+'';
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicket' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid: ticketid, agentcreated: agentcreated,agentcurrent : null,ticketchannel:null,levelticket:null,status: null,type:null, priority: null,createat:createat,SLA:null,appointmentdate:null,finishday:null, action:action},
            })
            .done(function(data) {
              location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data;
                                })
            .fail(function() {
               alert('Fail');
            });
  });
  $('.btn-updateTicket10').click(function(){
      var ticketid = $(this).attr('title');
      var agentcreated = $('#agentcreated').val();
      var SLA = $('#SLA').val();
      var action= 'Sửa ngày SLA '+SLA+'';
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicket' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid: ticketid, agentcreated: agentcreated,agentcurrent : null,ticketchannel:null,levelticket:null,status: null,type:null, priority: null,createat:null,SLA:SLA,appointmentdate:null,finishday:null, action:action},
            })
            .done(function(data) {
              location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data;
                                })
            .fail(function() {
               alert('Fail');
            });
  });

  $('.btn-updateTicket11').click(function(){
      var ticketid = $(this).attr('title');
      var agentcreated = $('#agentcreated').val();
      var appointmentdate = $('#appointmentdate').val();
      var action= 'Sửa ngày hẹn '+appointmentdate+'';
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicket' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid: ticketid, agentcreated: agentcreated,agentcurrent : null,ticketchannel:null,levelticket:null,status: null,type:null, priority: null,createat:null,SLA:null,appointmentdate:appointmentdate,finishday:null, action:action},
            })
            .done(function(data) {
              location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data;
                                })
            .fail(function() {
               alert('Fail');
            });
  });

  $('.btn-updateTicket12').click(function(){
      var ticketid = $(this).attr('title');
      var agentcreated = $('#agentcreated').val();
      var finishday = $('#finishday').val();
      var action= 'Sửa ngày hoàn thành '+agentcreated+'';
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicket' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid: ticketid, agentcreated: agentcreated,agentcurrent : null,ticketchannel:null,levelticket:null,status: null,type:null, priority: null,createat:null,SLA:null,appointmentdate:null,finishday:finishday, action:action},
            })
            .done(function(data) {
              location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data;
                                })
            .fail(function() {
               alert('Lỗi hệ thống, vui lòng liên hệ Admin');
            });
  });

   

/*
   $('#finish_btn').click(function(){
      var ticketid = $(this).attr('ticketid');
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicketStatus' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid:ticketid},
            })
            .done(function(data) {
                if(data.code==1){
                  window.location.reload();
                }else{
                  alert(data.message);
                }
              })
            .fail(function() {
               alert('Lỗi hệ thống, vui lòng liên hệ Admin');
            });
  });
  */

   $('#ticketchannel').change(function(){
      var oldchange = $('#changelog').val();
      oldchange += "Nguồn phiếu : "+$('#ticketchannel option:selected').text()+" | ";
      $('#changelog').val(oldchange);
      hasUpdate = true;
      $('.btn-updateAction').html("Cập nhật phiếu");
   });

   $('#priority').change(function(){
      var oldchange = $('#changelog').val();
      oldchange += "Mức ưu tiên : "+$('#priority option:selected').text()+" | ";
      $('#changelog').val(oldchange);
      hasUpdate = true;
      $('.btn-updateAction').html("Cập nhật phiếu");
   });

   $('#ticketstatus').change(function(){
      var oldchange = $('#changelog').val();
      oldchange += "Tình trạng : "+$('#ticketstatus option:selected').text()+" | ";
      $('#changelog').val(oldchange);
      hasUpdate = true;
      $('.btn-updateAction').html("Cập nhật phiếu");
   });

   $('#type').change(function(){
      var oldchange = $('#changelog').val();
      oldchange += "Phân loại : "+$('#type option:selected').text()+" | ";
      $('#changelog').val(oldchange);
      hasUpdate = true;
      $('.btn-updateAction').html("Cập nhật phiếu");
   });

   $('#levelticket').change(function(){
      var oldchange = $('#changelog').val();
      oldchange += "Giai đoạn : "+$('#levelticket option:selected').text()+" | ";
      $('#changelog').val(oldchange);
      hasUpdate = true;
      $('.btn-updateAction').html("Cập nhật phiếu");
   });

   var sla_change = false;
   $('#sla').change(function(){
      sla_change = true;
      hasUpdate = true;
      $('.btn-updateAction').html("Cập nhật phiếu");
   });

   var duedate_change = false;
   $('#duedate').change(function(){
      duedate_change = true;
      hasUpdate = true;
      $('.btn-updateAction').html("Cập nhật phiếu");
   });

   var finish_change = false;
   $('#finishdate').change(function(){
      finish_change = true;
      hasUpdate = true;
      $('.btn-updateAction').html("Cập nhật phiếu");
   });

   $('#btn-update').click(function(){
      var ticketid = $(this).attr('ticketid');
      var customer_request = $('#customer_request').val();
      var agentcurrent= $('#agentcurrent').val();
      if(!agentcurrent){
        alert('Người phụ trách chưa đúng');
        return false;
      }
      var ticketchannel = $('#ticketchannel').val();
      var status = $('#ticketstatus').val();
      var cmt = $('#action').val();
      var priority = $('#priority').val();
      var title = $('#title').val();
      var bds = $('#bds').val();
      var duan = $('#duan').val();
      var gd = $('#giaodich').val();
      var dot = $('#dot').val();
      var sla = $('#sla').val();
      if(sla_change){
        var oldchange = $('#changelog').val();
        oldchange += "Thời hạn SLA : "+$('#sla').val()+" | ";
        $('#changelog').val(oldchange);
      }
      var type = $('#type').val();
      var levelticket = $('#levelticket').val();
      var duedate = $('#duedate').val();
      if(duedate_change){
        var oldchange = $('#changelog').val();
        oldchange += "Ngày hẹn : "+duedate+" | ";
        $('#changelog').val(oldchange);
      }
      var finishdate = $('#finishdate').val();
      if(finish_change){
        var oldchange = $('#changelog').val();
        oldchange += "Ngày hoàn thành : "+finishdate+" | ";
        $('#changelog').val(oldchange);
      }
      var type = $('#type').val();
      var levelticket = $('#levelticket').val();
      var ticketusers = $('#ticketusers').val();
      var changelog = $('#changelog').val();
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicketNew' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid:ticketid,crequest:customer_request,agentcurrent: agentcurrent, priority: priority,bds:bds,gd:gd,duan:duan,dot:dot,ticketchannel:ticketchannel,sla:sla,duedate:duedate,type:type,levelticket:levelticket,finishdate:finishdate,cmt:cmt,ticketusers:ticketusers,changelog:changelog,status:status},
            })
            .done(function(data) {
                if(data.code==1){
                  window.location.reload();
                }else{
                  alert(data.message);
                }
              })
            .fail(function() {
               alert('Lỗi hệ thống, vui lòng liên hệ Admin');
            });
  });
   function showDetailKnowledge(id)
   {
      var show = $('.knl-caret');
      if (show.hasClass('fa-angle-double-up')) {$('.knl-caret').trigger('click');}
       $.ajax({
              url: '<?php echo base_url().'knowledge/detailKnowledge' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {id:id},
            })
            .done(function(data) {
                $('.knl-content').html(data.data[0].article);
              })
            .fail(function() {
               alert('Lỗi hệ thống, vui lòng liên hệ Admin');
            });
   }

  
   $('.btn-updateActionUpdate').click(function(){
      var ticketid = $(this).attr('title');
      var action= $('#action').val();
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicketLog' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {cmt:action,ticketid:ticketid},
            })
            .done(function(data) {
                if(data.code==1){
                  window.location.reload();
                }else{
                  alert(data.message);
                }
              })
            .fail(function() {
               alert('Lỗi hệ thống, vui lòng liên hệ Admin');
            });
  });

  $('.btn-updateAction').click(function(){
    if(hasUpdate){
      var ticketid = $(this).attr('title');
      var customer_request = $('#customer_request').val();
      var agentcurrent= $('#agentcurrent').val();
      if(!agentcurrent){
        alert('Người phụ trách chưa đúng');
        return false;
      }
      var ticketchannel = $('#ticketchannel').val();
      var status = $('#ticketstatus').val();
      var cmt = $('#action').val();
      var priority = $('#priority').val();
      var title = $('#title').val();
      var bds = $('#bds').val();
      var duan = $('#duan').val();
      var gd = $('#giaodich').val();
      var dot = $('#dot').val();
      var sla = $('#sla').val();
      if(sla_change){
        var oldchange = $('#changelog').val();
        oldchange += "Thời hạn SLA : "+$('#sla').val()+" | ";
        $('#changelog').val(oldchange);
      }
      var type = $('#type').val();
      var levelticket = $('#levelticket').val();
      var duedate = $('#duedate').val();
      if(duedate_change){
        var oldchange = $('#changelog').val();
        oldchange += "Ngày hẹn : "+duedate+" | ";
        $('#changelog').val(oldchange);
      }
      var finishdate = $('#finishdate').val();
      if(finish_change){
        var oldchange = $('#changelog').val();
        oldchange += "Ngày hoàn thành : "+finishdate+" | ";
        $('#changelog').val(oldchange);
      }
      var type = $('#type').val();
      var levelticket = $('#levelticket').val();
      var ticketusers = $('#ticketusers').val();
      var changelog = $('#changelog').val();
       $.ajax({
              url: '<?php echo base_url().'ticket/updateTicketNew' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {ticketid:ticketid,crequest:customer_request,agentcurrent: agentcurrent, priority: priority,bds:bds,gd:gd,duan:duan,dot:dot,ticketchannel:ticketchannel,sla:sla,duedate:duedate,type:type,levelticket:levelticket,finishdate:finishdate,cmt:cmt,ticketusers:ticketusers,changelog:changelog,status:status},
            })
            .done(function(data) {
                if(data.code==1){
                  window.location.reload();
                }else{
                  alert(data.message);
                }
              })
            .fail(function() {
               alert('Lỗi hệ thống, vui lòng liên hệ Admin');
            });
      }else{
          var action= $('#action').val();
           $.ajax({
                  url: '<?php echo base_url().'ticket/updateTicketLog' ?>',
                  type: 'POST',
                  dataType: 'JSON',
                  data: {cmt:action,ticketid:ticketid},
                })
                .done(function(data) {
                    if(data.code==1){
                      window.location.reload();
                    }else{
                      alert(data.message);
                    }
                  })
                .fail(function() {
                   alert('Lỗi hệ thống, vui lòng liên hệ Admin');
                });
      }
  });

</script>