<script type="text/javascript">
	$(document).ready( function () {
    $('.btn-createuser').click(function(){
        var checkValidate =false;
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
        var address = $('#address').val();
        var comments = $('#comments').val();
        var thunhap = $('#thunhap').val();
        var fulladdress = $('#fulladdress').val();
        var custid = $('#custid').val();
        var password = $('#password').val();
        var queue = $('#queue').val();
        $.ajax({
        url: '<?php echo base_url()?>user/insertUser',
        type: 'POST',
        dataType: 'JSON',
        data: {roleid : roleid, groupid: groupid, custname:custname,idcard:idcard,fullbirthday:fullbirthday,telephone:telephone,email:email,country:country,city:city,district:district,ward:ward,address:address,comments:comments,thunhap:thunhap,gender:gender,fulladdress: fulladdress,custid:custid,password:password,queue:queue, ext:$('#dataExt').serialize()},
        // data: $('#insertUserVal').serialize(),
      })
      .done(function(data) {
                 if(data.message =='Success')
                 {
                  alert('Thêm người dùng thành công');
                    location.reload();
                 }
                 else{
                  alert(data.message);
                 }
              })
      .fail(function() {
         alert('Thêm người dùng thất bại');
      })
    });
     $('#insertUserVal').submit(function(e){
        e.preventDefault();
        
    });
      $('#fullbirthday').datetimepicker({timepicker:false,
      format:'d/m/Y'});});
  var fulladdress = '';
  var city = '';
  var district = '';
  var ward='';
  function selectCity(obj){
    var $id = obj.value;
    city = obj.options[obj.selectedIndex].text;
    fulladdress = city; 
    $('#fulladdress').val(fulladdress);
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
      fulladdress = district+' '+city;
    $('#fulladdress').val(fulladdress);
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
      fulladdress = ward+' '+district+' '+city;
      // alert(fulladdress);
      $('#fulladdress').val(fulladdress);
    }

    function selectGroup(obj){
      var $id = obj.value;
      $('.div-add').remove();
      $('.group_item').remove(); 
      $('.div-queue').remove();
      
                if($id != 3)
                 {
                    $('.div-ghichu').hide();
                    $('.div-bonus').hide();
                    $('.div-cmnd').hide();
                    $('.div-address').hide();
                    $('.div-danhxung').hide();
                    $('.div-ngaysinh').hide();
                    document.querySelector('#idcard').required = false;
                    document.querySelector('#email').required = false;
                    // $('#idcard').removeAttr('required');​​​​​
                    // $('#telephone').removeAttr('required');​​​​​
                    // $('#email').removeAttr('required');​​​​​
                    if($id == 2){
                     $('.div-phone').after('<div class="div-queue">\
                   <label class="control-label user-label col-md-3 no-padding">Hàng chờ cuộc gọi</label>\
                     <select class="control-label col-md-8 no-border no-padding margin-left-10" id="queue">\
                                                <option value="21114" >Chuyển nhượng hợp đồng</option>\
                                                       <option value="21115" >Thanh toán vay</option>\
                                                       <option value="21116" >Khác</option>\
                                                      </select>\
                </div>');
                     }
                     $('.div-group').after('<div class="div-add">\
                         <label class="control-label user-label col-md-3 no-padding">ID:</label>\
                           <label class="control-label col-md-8 no-padding-right">\
                             <input class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập ID" minlength="5" maxlength="10" id="custid" name="custid">\
                           </label>\
                       </div>\
                       <div class="div-add">\
                         <label class="control-label user-label col-md-3 no-padding">Password:</label>\
                           <label class="control-label col-md-8 no-padding-right">\
                             <input class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập Password" type="password" id="password" name="password">\
                           </label>\
                       </div>\
                       ');
                 }
                 else{
                    $('.div-ghichu').show();
                    $('.div-bonus').show();
                    $('.div-cmnd').show();
                    $('.div-address').show();
                    $('.div-danhxung').show();
                    $('.div-ngaysinh').show();
                 }
    }

    function keyUpAddress(obj)
    {
      var text = obj.value;
      fulladdress = text+' ' + ward+' '+district+' '+city;
      $('#fulladdress').val(fulladdress);
    }

    $('.buttonsearchiframe').click(function(){
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