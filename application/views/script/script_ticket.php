<script type="text/javascript">
   function locphieu($custid,$status){
      document.getElementById('iframesearch').src = "<?php echo base_url()?>search/rightSearchTicket/?search=&agentcreated="+$custid+"&agentcurrent=&priority=&status="+$status;
   }
   $('#editbutton').click(function(){
      alert('hehe');
    });
	$('#updateModal').on('shown.bs.modal', function (e) {
			     var tvcdb = $(e.relatedTarget).data('tvcdb');
			    $(e.currentTarget).find('input[name="tvcdb"]').val(tvcdb);
			     var ticketid = $(e.relatedTarget).data('ticketid');
			     $(e.currentTarget).find('input[name="ticketid"]').val(ticketid);

			     var custid = $(e.relatedTarget).data('custid');
			     $(e.currentTarget).find('select[name="custid"]').val(custid);

			     var priority = $(e.relatedTarget).data('priority');
			     $(e.currentTarget).find('input[name="priority"]').val(priority);
			     var title = $(e.relatedTarget).data('title');
			     $(e.currentTarget).find('input[name="title"]').val(title);
			     var status = $(e.relatedTarget).data('status');
			     $(e.currentTarget).find('select[name="status"]').val(status);
			     // CKEDITOR.instances['suadescription_eng'].setData(descrip);
			   }); 
	$('#deleteModal').on('shown.bs.modal', function (e) {
			     var ticketid = $(e.relatedTarget).data('ticketid');
			     $(e.currentTarget).find('input[name="ticketid"]').val(ticketid);
           $.ajax({
              url: '<?php echo base_url().'login/post_login' ?>',
              type: 'POST',
              dataType: 'JSON',
              data: {username: username, password: password},
            })
            .done(function(data) {
              if(data.message == "Success")
              {
                  $("#custid").val(data.data[0].custid);
                  $("#groupid").val(data.data[0].groupid);
                  $("#telephone").val(data.data[0].telephone);
                  $("#custname").val(data.data[0].custname);
                  $("#avatar").val(data.data[0].avatar);
                  $("#username1").val(username);
                  $("#password1").val(password);
                 document.getElementById("myForm").submit();
              }
              else
              {
                swal("Thất Bại!", "Sai tên đăng nhập hoặc mật khẩu.", "error");
              }
                                })
            .fail(function() {
                swal("Thất Bại!", "Kiểm tra mạng.", "error");
            });
			   }); 
  
	 $('.buttonnewiframe').click(function(){
    // alert($(this).attr('href'));
    var id = window.top.$(".nav-tabs").children().length;
    var idtab = id+<?php echo rand(1,100) ?>;
    var ulChildren = window.top.$(".nav-tabs").children();  
    var link = $(this).attr('alt');
    var title = $(this).attr('title');
    var checkLink = false;
    for(var i = 0; i < id ;i++)
        {
          if(ulChildren[i].children[0].nodeName.toLowerCase() === 'a'){
                  if(title == ulChildren[i].children[0].title)
                  {
                    checkLink = true;
                    var j = i+1;
                     window.top.$('.nav-tabs li:nth-child(' + j + ') a').click();
                     break;
                  }
                }
        }
       if(checkLink == true)
                {
                    return;
                }
              else
                {
              window.top.$( ".nav-link" ).removeClass( "active" );
              window.top.$( ".tab-pane" ).removeClass( "active" );
               //think about it ;)
              window.top.$('.nav-tabs li:nth-child('+id+')').after('<li class="nav-item width-170  role="presentation"">\
          <a class="nav-link active show" role="tab" data-toggle="tab" href="#tab'+idtab+'" title="'+title+'" >\
            <i class="fas fa-tags"></i> \
            <span class="">'+title+'</span> </a><span class="fa fa-times" aria-hidden="true"></span>\
        </li>');
              window.top.$('.tab-content').append('<div class="tab-pane active" id="tab' + idtab + '"><iframe id="myiframe1" class="myiframe" name="myiframe'+id+'" src="'+link+'" frameborder="0"></iframe></div>');
              var width = 956;
                    if(id >4)
                    {
                        window.top.$("ul.nav-tabs li").each(function(){
                          $(this).attr('style', 'width:'+width/(id+1)+'px !important;');
                        });
                       
                    }
                    else{
                      window.top.$("ul.nav-tabs li").each(function(){
                          $(this).attr('style', 'width:170px !important;');
                        });
                    }
              var i = id+1;
             window.top.$('.nav-tabs li:nth-child(' + i + ') a').click(); 
          // window.top.document.getElementById("myiframe1").src = $(this).attr('title');
        }
      });

</script>