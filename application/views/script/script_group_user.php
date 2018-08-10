<script type="text/javascript">
	$(document).ready(function(){
		$('#keyword').keypress(function(e1){
		   if(e1.keyCode==13){          // if user is hitting enter
		       search();
		   }
		  });
		
	});
	function search() {
		$('#loading').attr('style', 'display: initial;width: 30px; height: 30px;');
		var keyword = $('#keyword').val();
		$.ajax({
          url: '<?php echo base_url()?>setting/searchUser',
          type: 'POST',
          dataType: 'JSON',
          data: {keyword : keyword},
        })
        .done(function(data) {
        	$('#loading').attr('style', 'display:none');
        	var data_html = '';
        	for(var i = 0;i<data.data.length;i++)
        	{
        		var custid = data.data[i].custid;
        		var idcard = data.data[i].idcard;
        		var roleid = data.data[i].roleid;
        		var url1 = '<?php echo base_url() ?>user/detail/?cusid='+custid+'&idcard='+idcard+'&roleid='+roleid;
        		var url = "'"+url1+"'";
        		var custname = "'"+data.data[i].custname+"'";
        		data_html+=
        		'<tr>\
	      			<td width="40px">\
	            	<img class="user-avatar" src="'+data.data[i].avatar+'" alt="User Image">\
	            </td>\
	            <td width="252px">\
	            	<a class="user-name" style="cursor: pointer;" onclick="addTabDetailUser('+url+','+custname+')">'+data.data[i].custname+'</a>\
	            	<p class="">'+data.data[i].groupid+'</p>\
	            </td>\
	            <td width="229px">'+data.data[i].telephone+'</td>\
	            <td  width="218px">'+data.data[i].email+'</td>\
	          </tr>';
        	}
          $('.content-search').html('<div class="table-responsive">\
	              <table class="table" id="table">\
	                <tbody>'+data_html+'\
	                </tbody>\
	              </table>\
	            </div>');
        })
        .fail(function() {
            console.log('error');
            $('#loading').attr('style', 'display:none');
        })	
	}

	function searchRoleid(roleid) {
		$('#loading').attr('style', 'display: initial;width: 30px; height: 30px;');
		var keyword = '';
		$.ajax({
          url: '<?php echo base_url()?>setting/searchUser',
          type: 'POST',
          dataType: 'JSON',
          data: {keyword : keyword},
        })
        .done(function(data) {
        	$('#loading').attr('style', 'display:none');
        	var data_html = '';
        	for(var i = 0;i<data.data.length;i++)
        	{

        		if(data.data[i].roleid == roleid)
        		{
        			var custid = data.data[i].custid;
	        		var idcard = data.data[i].idcard;
	        		var url1 = '<?php echo base_url() ?>user/detail/?cusid='+custid+'&idcard='+idcard+'&roleid='+roleid;
	        		var url = "'"+url1+"'";
	        		var custname = "'"+data.data[i].custname+"'";
        		data_html+=
        		'<tr>\
	      			<td width="40px">\
	            	<img class="user-avatar" src="'+data.data[i].avatar+'" alt="User Image">\
	            </td>\
	            <td width="252px">\
	            	<a class="user-name" style="cursor: pointer;" onclick="addTabDetailUser('+url+','+custname+')">'+data.data[i].custname+'</a>\
	            	<p class="">'+data.data[i].groupid+'</p>\
	            </td>\
	            <td width="229px">'+data.data[i].telephone+'</td>\
	            <td width="218px">'+data.data[i].email+'</td>\
	          </tr>';
	          	}
        	}
          $('.content-search').html('<div class="table-responsive">\
	              <table class="table" id="table">\
	                <tbody>'+data_html+'\
	                </tbody>\
	              </table>\
	            </div>');
        })
        .fail(function() {
            alert("Lỗi hệ thống, vui lòng liên hệ admin");
        })	
	}
	function addTabDetailUser(link,title)
	{
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
    function clickChangeIframe(src)
    {
        document.getElementById('iframesetting').src = src;
    }
	
</script>