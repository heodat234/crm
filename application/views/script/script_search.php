<script type="text/javascript">
	$('#search_customer').click(function(){
		// alert($(this).attr('id'));
		var search = $('#search').val();
		var custname = $('#custname').val();
		var custid = $('#custid').val();
		var telephone = $('#telephone').val();
		var email = $('#email').val();
		var mapping1 = $('#mapping1').val();

		document.getElementById('iframesearch').src = "<?php echo base_url().'search/rightSearch/?search=' ?>"+search+"&custname="+custname+"&custid="+custid+"&telephone="+telephone+"&email="+email+"&mapping1="+mapping1;
	});

	$('#search_ticket').click(function(){
		var searchticket = $('#searchticket').val();
		var agentcreated = $('#agentcreated').val();
		var agentcurrent = $('#agentcurrent').val();
		var priority = $('#priority').val();
		var status = $('#status').val();
		document.getElementById('iframesearch').src = "<?php echo base_url().'search/rightSearchTicket/?search='?>"+searchticket+"&agentcreated="+agentcreated+"&agentcurrent="+agentcurrent+"&priority="+priority+"&status="+status;
	});

	$('.buttonsearchiframe').click(function(){
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
			      <i class="fas fa-search"></i> \
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