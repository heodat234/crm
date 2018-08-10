<script type="text/javascript">
	$('.btn-insertTicket').click(function(){
		var customer_request = $('#customer_request').val();
    if(!customer_request){
      alert('Người yêu cầu chưa đúng');
      return false;
    }
		var agentcurrent= $('#agentcurrent').val();
    if(!agentcurrent){
      alert('Người phụ trách chưa đúng');
      return false;
    }
		var ticketchannel = $('#nguonphieu').val();
    var cmt = $('#action').val();
		var priority = $('#priority').val();
    var title = $('#title').val();
    if(!title){
      alert('Tiêu đề phiếu không được để trống');
      return false;
    }
    var bds = $('#bds').val();
    var duan = $('#duan').val();
    var gd = $('#giaodich').val();
    var dot = $('#dot').val();
    var sla = $('#sla').val();
    var type = $('#type').val();
    var levelticket = $('#levelticket').val();
    var duedate = $('#duedate').val();
		var contractid = '<?php echo $this->uri->segment(3) ?>';
		$.ajax({
          url: '<?php echo base_url().'ticket/insertTicket' ?>',
          type: 'POST',
          dataType: 'JSON',
          data: {crequest:customer_request,agentcurrent: agentcurrent, priority: priority,contractid:contractid,title:title,bds:bds,gd:gd,duan:duan,dot:dot,ticketchannel:ticketchannel,cmt:cmt,sla:sla,duedate:duedate,type:type,levelticket:levelticket},
        })
        .done(function(data) {
          if(data.code==0){
             alert(data.message);
          }else{
             location.href= '<?php echo base_url().'/ticket/detail/' ?>'+data.data;
          }})
        .fail(function() {
            alert('Lỗi hệ thống,vui lòng liên hệ admin để được hỗ trợ');
        });
	});
  function showDetailKnowledge(id)
   {
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
</script>