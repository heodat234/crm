<script type="text/javascript">
	
  $(document).ready( function () {
    $('#roleid').val('<?php echo $detail[0]['roleid'] ?>');
    $('#gender').val('<?php echo $detail[0]['gender'] ?>');
    var load_roleid = $('#roleid').val();
    loadGroup(load_roleid);
    $('.btn-update').click(function(){
        var custid = '<?php echo strval($_GET['cusid']) ?>';
        var roleid = $('#roleid').val();
        var groupid = $('#groupid').val();
        var custname = $('#custname').val();
        var idcard = $('#idcard').val();
        var fullbirthday = $('#fullbirthday').val();
        var gender = $('#gender').val();
        var telephone = $('#telephone').val();
        var email = $('#email').val();
        var country = $('#country').val();
        var city = $('#city').val();
        var district = $('#district').val();
        var ward = $('#ward').val();
        var text = '';
        var address = $('#address').val();
        var comments = $('#comments').val();
        var thunhap = $('#thunhap').val();
        var fulladdress = $('#fulladdress').val();
        // var custid = $('#custid').val();
        var password = $('#password').val();
        var queue = $('#queue').val();
        var queueold = $('#queue_old').val();
        $.ajax({
        url: '<?php echo base_url()?>user/updateUser',
        type: 'POST',
        dataType: 'JSON',
        data: {roleid : roleid, groupid: groupid, custname:custname,idcard:idcard,fullbirthday:fullbirthday,telephone:telephone,email:email,country:country,city:city,district:district,ward:ward,address:address,comments:comments,thunhap:thunhap,gender:gender,fulladdress: fulladdress,custid:custid,password:password,queue:queue,queueold:queueold, ext:$('#dataExt').serialize()},
      })
      .done(function(data) {
                 if(data.message =='Success')
                 {
                  alert('Sửa thông tin thành công');
                    location.reload();
                 }
                 else{
                  alert(data.message);
                 }
              })
      .fail(function() {
         alert('Sửa thông tin thất bại');
      })
    });
    $('#insertUserVal').submit(function(e){
        e.preventDefault();
        
    });
            $('#fullbirthday').datetimepicker({timepicker:false,
          format:'d/m/Y'});
          $('#table-1-contract').DataTable({
            "paging":   false,
            "columns": [
              { "width": "60px" },
              { "width": "80px" },
              { "width": "90px" },
              { "width": "90px" },
              { "width": "90px" },
              { "width": "250px" }
            ],
            "info":     false,
            "searching": false,
            "scrollY":        "235px",
            "scrollX":        true,
            "scrollCollapse": true
          });
           $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
              $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
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
        });


    function keyUpAddress(obj)
    {
      text = obj.value;
      fulladdress = text;
      $('#fulladdresstemp').val(fulladdress);
    }
      function selectCity(obj){
    var $id = obj.value;
    city = obj.options[obj.selectedIndex].text;
    fulladdress = text+ ' '+ 'Thành phố '+city; 
    $('#fulladdresstemp').val(fulladdress);
    // alert(fulladdress);
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
                $('#dodulieu').after('<option title="'+data[i]['name']+'" class="gicungdc" value="'+data[i]['id_district']+'">'+data[i]['name']+'</option>');
               }
                  
            })
    .fail(function() {
      console.log("error");
    })
  }

  function selectDistrict(obj){
      var $id = obj.value;
      district = obj.options[obj.selectedIndex].text;
      fulladdress =text+ ' '+ district+' '+city;
    $('#fulladdresstemp').val(fulladdress);
      // alert(fulladdress);
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
                  $('#dodulieu1').after('<option title="'+data[i]['name']+'" class="gicungdc1" value="'+data[i]['id_ward']+'">'+data[i]['name']+'</option>');
                 }
                    
              })
      .fail(function() {
        console.log("error");
      })
    }

    function selectWard(obj){
      var $id = obj.value;
      ward = obj.options[obj.selectedIndex].text;
      fulladdress =text+ ' '+ ward+' '+district+' '+city;
      // alert(fulladdress);
      $('#fulladdresstemp').val(fulladdress);
    }

    function updateUser(obj)
    {
      var id = obj.title;
      var data = $('#'+id+'').val();
      $.ajax({
        url: '<?php echo base_url()?>user/selectDistrict',
        type: 'POST',
        dataType: 'JSON',
        data: {id_district : $id},
      })
      .done(function(data) {
                 // console.log(data.loaisp);
                 for (var i = 0; i < data.length; i++) {
                  $('#dodulieu1').after('<option title="'+data[i]['name']+'" selected class="gicungdc1" value="'+data[i]['id_ward']+'">'+data[i]['name']+'</option>');
                 }
                    
              })
      .fail(function() {
        console.log("error");
      })

    }
   
   function selectGroup(obj){
      var $id = obj.value;
      $('.div-add').remove();
      $('.group_item').remove(); 
      $.ajax({
        url: '<?php echo base_url()?>user/getGroupByRoleId',
        type: 'POST',
        dataType: 'JSON',
        data: {roleid : $id},
      })
      .done(function(data) {
                 data =data.data;
                 if(data[0]['roleid'] == 3)
                 {
                   for (var i = 0; i < data.length; i++) {
                    console.log(data[0]['roleid']);

                      $('.grouplist').append('<option selected class="group_item" value="'+data[i]['groupid']+'">'+data[i]['groupname']+'</option>');
                   }
                 }
                 else{
                    for (var i = 0; i < data.length; i++) {
                    console.log(data[0]['roleid']);

                      $('.grouplist').append('<option selected class="group_item" value="'+data[i]['groupid']+'">'+data[i]['groupname']+'</option>');
                   }
                   $('.div-group').after('<div class="div-add">\
                  <label class="control-label user-label col-md-3 no-padding">ID:</label>\
                    <label class="control-label col-md-8 no-padding-right">\
                      <input class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập ID" id="custid" name="custid">\
                    </label>\
                </div>\
                <div class="div-add">\
                  <label class="control-label user-label col-md-3 no-padding">Password:</label>\
                    <label class="control-label col-md-8 no-padding-right">\
                      <input class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập Password" type="password" id="password" name="password">\
                    </label>\
                </div>\
                ')
                 }
                      
              })
      .fail(function() {
          console.log("error");
      })
    }

    function loadGroup(roleid)
    {
      var $id = roleid;
      $('.div-add').remove();
      $('.group_item').remove(); 
      $.ajax({
        url: '<?php echo base_url()?>user/getGroupByRoleId',
        type: 'POST',
        dataType: 'JSON',
        data: {roleid : $id},
      })
      .done(function(data) {

                 data =data.data;
                 if(data[0]['roleid'] == 3)
                 {
                   for (var i = 0; i < data.length; i++) {
                    console.log(data[0]['roleid']);

                      $('.grouplist').append('<option selected class="group_item" value="'+data[i]['groupid']+'">'+data[i]['groupname']+'</option>');
                   }
                 }
                 else{
                    for (var i = 0; i < data.length; i++) {

                      $('.grouplist').append('<option selected class="group_item" value="'+data[i]['groupid']+'">'+data[i]['groupname']+'</option>');
                   }
                   $('.div-group').after('<div class="div-add">\
                  <label class="control-label user-label col-md-3 no-padding">ID:</label>\
                    <label class="control-label col-md-8 no-padding-right">\
                      <input class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập ID" id="custid" name="custid">\
                    </label>\
                </div>\
                <div class="div-add">\
                  <label class="control-label user-label col-md-3 no-padding">Password:</label>\
                    <label class="control-label col-md-8 no-padding-right">\
                      <input class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập Password" type="password" id="password" name="password">\
                    </label>\
                </div>\
                ')
                 }
                  
                  $('#groupid').val('<?php echo $detail[0]['groupid'] ?>');    
              })
      .fail(function() {
          console.log("error");
      })
    }

    function removeemail($email, $emaillist){
        var custid = $('#cusit_id').attr('custid');
        $.ajax({
          url: '<?php echo base_url()?>user/updateUserEmailList',
          type: 'POST',
          dataType: 'JSON',
          data: {custid : custid,email:$email,emaillist:$emaillist},
        })
        .done(function(data) {
          if(data.code==1){
              window.location.reload();
            }else{
              alert(data.message);
            }
        })
        .fail(function() {
            alert("Lỗi hệ thống, vui lòng liên hệ admin");
        })
    }

    function removephone($phone, $phonelist){
        var custid = $('#cusit_id').attr('custid');
        $.ajax({
          url: '<?php echo base_url()?>user/updateUserPhoneList',
          type: 'POST',
          dataType: 'JSON',
          data: {custid : custid,phone:$phone,phonelist:$phonelist},
        })
        .done(function(data) {
            if(data.code==1){
              window.location.reload();
            }else{
              alert(data.message);
            }
        })
        .fail(function() {
           alert("Lỗi hệ thống, vui lòng liên hệ admin");
        })
    }

    $('.btn-addfulladdress').click(function(){
        var addid = $(this).attr('addid');
        var fulladdress = $('#fulladdresstemp').val();
        var city = $('#city').val();
        var district = $('#dodulieu').val();
        var ward = $('#dodulieu1').val();
        var sonha = $('#sonha').val();
        $.ajax({
          url: '<?php echo base_url()?>user/updateAddress',
          type: 'POST',
          dataType: 'JSON',
          data: {addressid : addid,fulladdress:fulladdress,city:city,district:district,ward:ward,address:sonha},
        })
        .done(function(data) {
          if(data.code==1){
              window.location.reload();
            }else{
              alert(data.message);
            }
        })
        .fail(function() {
            alert("Lỗi hệ thống, vui lòng liên hệ admin");
        })
    });
</script>