<script type="text/javascript">

      $(document).ready( function () {
    $('.nav-tabs')
      .scrollingTabs({
        enableSwiping: true
      })
      .on('ready.scrtabs', function() {
        $('.tab-content').show();
      });

          // $('#table-1-ticket').DataTable();
          // $('#table-2-ticket').DataTable();
          // $('#table-3-ticket').DataTable();

          $('#table-1-congno').DataTable({
             "paging":   false,
            "columns": [
              { "width": "46px" },
              { "width": "19px" },
              { "width": "50px" },
              { "width": "100px" },
              { "width": "100px" },
              { "width": "55px" },
              { "width": "220px" },
              { "width": "43px" },
              { "width": "100px" }
            ],
            "info":     false,
            "searching": false,
            "scrollY":        "235px",
            "scrollX":        true,
            "scrollCollapse": true
          }).columns.adjust().draw();

          $('#table-1-dchd').DataTable({
             "paging":   false,
            "info":     false,
            "searching": false,
            "scrollY":        "300px",
            "scrollX":        true,
            "scrollCollapse": true,
            "columns": [
               { "width": "70px" },
              { "width": "100px" },
              { "width": "60px" },
              { "width": "43px" },
              { "width": "100px" },
              { "width": "110px" },
              { "width": "80px" },
              { "width": "100px" },
              { "width": "100px" },
               { "width": "100px" }
            ]
          }).columns.adjust().draw();

          $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
              $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
          });
          
      } );
      function selectCity(obj){
          var $id = obj.value;

            $('.gicungdc').remove(); 
          $.ajax({
            url: '<?php echo base_url()?>user/selectCity',
            type: 'POST',
            dataType: 'JSON',
            data: {id_city : $id},
          })
          .done(function(data) {
                     // console.log(data.loaisp);
                     for (var i = 0; i < data.length; i++) {
                      $('#dodulieu').after('<option class="gicungdc" value="'+data[i]['id_district']+'">'+data[i]['name']+'</option>');
                     }
                        
                  })
          .fail(function() {
            console.log("error");
          })
        }

        function selectDistrict(obj){
          var $id = obj.value;

            $('.gicungdc1').remove(); 
          $.ajax({
            url: '<?php echo base_url()?>user/selectDistrict',
            type: 'POST',
            dataType: 'JSON',
            data: {id_district : $id},
          })
          .done(function(data) {
                     // console.log(data.loaisp);
                     for (var i = 0; i < data.length; i++) {
                      $('#dodulieu1').after('<option selected class="gicungdc1" value="'+data[i]['id_ward']+'">'+data[i]['name']+'</option>');
                     }
                        
                  })
          .fail(function() {
            console.log("error");
          })
        }
      

       $('#demoNotify').click(function(){
            $.notify({
                  title: "Update Complete : ",
                  message: "Something cool is just updated!",
                  icon: 'fa fa-check' ,
                  url: 'https://github.com/mouse0270/bootstrap-notify',
                  target: '_blank'
            },{
                  // settings
                  element: 'body',
                  position: null,
                  type: "info",
                  allow_dismiss: true,
                  newest_on_top: false,
                  showProgressbar: false,
                  placement: {
                        from: "top",
                        align: "right"
                  },
                  offset: {
                        x: 10,
                        y: 40
                  },
                  spacing: 10,
                  z_index: 1031,
                  delay: 5000,
                  timer: 1000,
                  url_target: '_blank',
                  mouse_over: null,
                  animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                  },
                  onShow: null,
                  onShown: null,
                  onClose: null,
                  onClosed: null,
                  icon_type: 'class',
                  template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                              '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                  '</div>' 
            });
      });
      $('#demoSwal').click(function(){
            swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover this imaginary file!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel plx!",
                  closeOnConfirm: false,
                  closeOnCancel: false
            }, function(isConfirm) {
                  if (isConfirm) {
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                  } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                  }
            });
      });

          
      
      $('#demoModal').click(function(){
            var modal = $(
            '<div class="modal fade">\
                  <div class="modal-dialog" role="document">\
                        <div class="modal-content">\
                              <div class="modal-header">\
                                    <h5 class="modal-title">Ghép vào một người khác</h5>\
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>\
                              </div>\
                              <div class="modal-body">\
                                    <div class="flex">\
                                          <div class="div user-call-pad col-sm-5">\
                                            <p class="phone-name"><img class="user-avatar phone-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">Lan Phạm</p>\
                                            <p class="phone-num header-desc field-click-able">038 8485 4949</p>\
                                            <p class="phone-time header-desc field-click-able">00 : 00 : 25</p>\
                                          </div>\
                                          <div class="row col-sm-7">\
                                                <div class="col-md-3">\
                                                      <span class="user-history-label span-danger">O</span>\
                                                      <span>5</span>\
                                                </div>\
                                                <div class="col-md-3">\
                                                      <span class="user-history-label span-warning">P</span>\
                                                      <span>5</span>\
                                                </div>\
                                                <div class="col-md-3">\
                                                      <span class="user-history-label span-success">S</span>\
                                                      <span>5</span>\
                                                </div>\
                                                <div class="col-md-3">\
                                                      <span class="user-history-label span-info">R</span>\
                                                      <span>5</span>\
                                                </div>\
                                                <div class="col-md-3">\
                                                      <span class="fa fa-phone user-history-icon span-default"></span>\
                                                      <span>5</span>\
                                                </div>\
                                                <div class="col-md-3">\
                                                      <span class="fa fa-comment user-history-icon span-default"></span>\
                                                      <span>5</span>\
                                                </div>\
                                                <div class="col-md-3">\
                                                      <span class="fa fa-file-alt user-history-icon span-default"></span>\
                                                      <span>5</span>\
                                                </div>\
                                          </div>\
                                    </div>\
                                    <p>Tìm người cần ghép</p>\
                                    <div id="call-input">\
                                          <input class="form-control margin-top-10 margin-bot-5" type="text" name="" placeholder="Phone Number or name">\
                                    </div>\
                                    <div class="flex">\
                                          <div class="div user-call-pad col-sm-6">\
                                            <p class="phone-name"><img class="user-avatar phone-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">Lan Phạm</p>\
                                            <p class="phone-num header-desc field-click-able">038 8485 4949</p>\
                                            <p class="phone-time header-desc field-click-able">00 : 00 : 25</p>\
                                          </div>\
                                          <div class="div user-call-pad col-sm-6">\
                                            <p class="phone-name"><img class="user-avatar phone-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">Lan Phạm</p>\
                                            <p class="phone-num header-desc field-click-able">038 8485 4949</p>\
                                            <p class="phone-time header-desc field-click-able">00 : 00 : 25</p>\
                                          </div>\
                                    </div>\
                              </div>\
                              <div class="modal-footer">\
                                    <button class="btn btn-primary btn-89" type="button" data-dismiss="modal">Hủy</button>\
                                    <button class="btn btn-secondary btn-89" type="button">Ghép</button>\
                              </div>\
                        </div>\
                  </div>\
            </div>');  
            modal.modal("show").on("hidden", function(){
                  modal.remove();
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
              window.top.$('.nav-tabs li:nth-child('+id+')').after('<li class="nav-item width-170">\
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

      $('.insert-manual').click(function(){
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
            <i class="fas fa-plus-circle"></i> \
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