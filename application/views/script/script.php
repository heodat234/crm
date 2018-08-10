<script type="text/javascript">
      $(".nav-tabs").on("click", "a", function (e) {
              e.preventDefault();
              if (!$(this).hasClass('add-contact')) {
                  $(this).tab('show');
              }
                })
                .on("click", ".fa-times", function () {
                  var id = $(".nav-tabs").children().length;
                  // alert(id);
                  var width = 956;
                  if(id >4)
                  {
                      $("ul.nav-tabs li").each(function(){
                        $(this).attr('style', 'width:'+width/(id)+'px !important;');
                      });
                     
                  }
                  else{
                    $("ul.nav-tabs li").each(function(){
                        $(this).attr('style', 'width:170px !important;');
                      });
                  }
                  if(id >1)
                  {
                    var anchor = $(this).siblings('a');
                    $(anchor.attr('href')).remove();
                    $(this).parent().remove();
                    // $(".nav-tabs li").children('a').first().click();
                    $('.nav-tabs li:nth-child(' + (id-1) + ') a').click();
                    // $(this).closest('ul.nav-tabs li').prev().click();
                  }
       });
        $('.add-contact').click(function (e) {
              var link = $(this).attr('alt');
              var ulChildren = $(".nav-tabs").children();  
              var id = $(".nav-tabs").children().length;
              var idtab = id+<?php echo rand(1,100) ?>;
              var title = $(this).attr('title');
              var checkLink = false;
              // var width = $(".nav-tabs").width();
              for(var i = 0; i < id ;i++)
              {
                // alert(ulChildren[i].children[0].nodeName.toLowerCase());
                if(ulChildren[i].children[0].nodeName.toLowerCase() === 'a'){
                  if(title == ulChildren[i].children[0].title)
                  {
                    checkLink = true;
                    var j = i+1;
                     $('.nav-tabs li:nth-child(' + j + ') a').click();
                     break;

                    // alert("found one, the id is: " + ulChildren[i].children[0].title);
                  }
                }
              }
              if(checkLink == true)
                {
                    return;
                }
              else
                {
                    if(link == "#")
                    {
                      return;
                    }
                  else{
                      if(title == 'Search')
                      {
                        var icon = 'fas fa-search-plus';
                      }
                      else if(title == 'Ticket')
                      {
                      var icon = 'fas fa-home';
                      }
                      else if(title == 'User')
                      {
                      var icon = 'fas fa-user-circle';
                      }
                      else{
                        var icon = 'far fa-calendar-alt';
                      }
                        e.preventDefault();
                        $( ".nav-link" ).removeClass( "active" );
                        $( ".tab-pane" ).removeClass( "active" );
                         //think about it ;)
                        $('.nav-tabs li:nth-child('+id+')').after('<li class="nav-item width-170"  role="presentation">\
                    <a class="nav-link active show" role="tab" data-toggle="tab" href="#tab'+idtab+'" title="'+title+'" >\
                      <i class="'+icon+'"></i> \
                      <span class="">'+title+'</span> </a><span class="fa fa-times" aria-hidden="true"></span>\
                  </li>');
                        $('.tab-content').append('<div class="tab-pane active" id="tab' + idtab + '"><iframe id="myiframe1" class="myiframe" name="myiframe'+id+'" src="'+link+'" frameborder="0"></iframe></div>');
                       // break;

                    var width = 956;
                    if(id >4)
                    {
                        $("ul.nav-tabs li").each(function(){
                          $(this).attr('style', 'width:'+width/(id+1)+'px !important;');
                        });
                       
                    }
                    else{
                      $("ul.nav-tabs li").each(function(){
                          $(this).attr('style', 'width:170px !important;');
                        });
                    }
                        var i = id+1;
                       $('.nav-tabs li:nth-child(' + i + ') a').click(); 
                  }
                    
               }
      });


            $('.click_navtab').click(function (e) {
              // alert($(this).attr('href'));
              var link = $(this).attr('href');
              var ulChildren = $(".nav-tabs").children();  
              var id = $(".nav-tabs").children().length;
              var title = $(this).attr('title');
              var idtab = id+title;
              var checkLink = false;
              for(var i = 0; i < id ;i++)
              {
                // alert(ulChildren[i].children[0].nodeName.toLowerCase());
                if(ulChildren[i].children[0].nodeName.toLowerCase() === 'a'){
                  if(title == ulChildren[i].children[0].title)
                  {
                    checkLink = true;
                    var j = i+1;
                     $('.nav-tabs li:nth-child(' + j + ') a').click();
                     break;

                    // alert("found one, the id is: " + ulChildren[i].children[0].title);
                  }
                }
              }
              if(checkLink == true)
                {
                    return;
                }
              else
                {
                    if(link == "#")
                    {
                      return;
                    }
                  else{
                      if(title == 'Search')
                      {
                        var icon = 'fas fa-search-plus';
                      }
                      else if(title == 'Ticket')
                      {
                      var icon = 'fas fa-home';
                      }
                      else if(title == 'User')
                      {
                      var icon = 'fas fa-user-circle';
                      }
                      else{
                        var icon = 'far fa-calendar-alt';
                      }
                        e.preventDefault();
                        $( ".nav-link" ).removeClass( "active" );
                        $( ".tab-pane" ).removeClass( "active" );
                         //think about it ;)
                        $('.nav-tabs li:nth-child('+id+')').after('<li class="nav-item width-170"  role="presentation">\
                    <a class="nav-link active show" role="tab" data-toggle="tab" href="#tab'+idtab+'" title="'+title+'" >\
                      <i class="'+icon+'"></i> \
                      <span class="">'+title+'</span> </a><span class="fa fa-times" aria-hidden="true"></span>\
                  </li>');
                        $('.tab-content').append('<div class="tab-pane active" id="tab' + idtab + '"><iframe id="myiframe1" class="myiframe" name="myiframe'+id+'" src="'+link+'" frameborder="0"></iframe></div>');
                        var width = 956;
                    if(id >4)
                    {
                        $("ul.nav-tabs li").each(function(){
                          $(this).attr('style', 'width:'+width/(id+1)+'px !important;');
                        });
                       
                    }
                    else{
                      $("ul.nav-tabs li").each(function(){
                          $(this).attr('style', 'width:170px !important;');
                        });
                    }
                        var i = id+1;
                       $('.nav-tabs li:nth-child(' + i + ') a').click(); 
                       // break;
                  }
                    
               }
            });
            
</script>