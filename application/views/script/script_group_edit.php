<script type="text/javascript">
	function createTab(link,title) {
		var id = window.top.$(".nav-tabs").children().length;
		var idtab = id+<?php echo rand(1,100) ?>;
	    var ulChildren = window.top.$(".nav-tabs").children();  
	    var link = link;
	    var title = title;
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
	}
          $('#udpategroup_btn').click(function(){
               var groupid = $('#groupid').val();
          	   var ticketrule = $('#ticketrule').val();
          	   var taskrule = $('#taskrule').val();
          	   var userrule = $('#userrule').val();
          	   var knowledgerule = $('#knowledgerule').val();var status = $('#status').val()
          $.ajax({
             url: '<?php echo base_url().'groupuser/updategroup' ?>',
             type: 'POST',
             dataType: 'JSON',
             data: {groupid:groupid,ticketrule:ticketrule,taskrule:taskrule,userrule:userrule,knowledgerule:knowledgerule,status:status},
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
</script>