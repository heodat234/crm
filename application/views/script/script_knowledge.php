<script type="text/javascript">
	function addTab(link,title) {
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
	$('#btn-search').click(function(){
		// alert($(this).attr('id'));
		var text = $('#search_area input[name="s_text"]').val();
		var group = $('#search_area select[name="s_group"]').val();
		var cate = $('#search_area select[name="s_cate"]').val();
		var type = $('#search_area select[name="s_type"]').val();
		var createby = $('#search_area select[name="s_createby"]').val();
		if (text.length>50) {
			alert('Không được nhập quá 50 ký tự.');
		}else{
		document.getElementById('iframesearch').src = "<?php echo base_url().'knowledge/search/?groupid='?>"+group+"&categoryid="+cate+"&tickettype="+type+"&createby="+createby+"&search="+text;
		}
	});
</script>