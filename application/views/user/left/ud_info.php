<form id="insertUserVal" method="POST" role="form">

<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Phân quyền</label>
	              		<select onchange="selectGroup(this)" id="roleid" class="control-label col-md-8 no-border no-padding margin-left-10" <?php 
	              			$var = $this->session->userdata;
        					$roleid = $var['roleid'];
	              		if($roleid =='2'){echo 'disabled';} ?>>
	              			<?php
	              				foreach ($role_list as $key => $value) {
	              					?>
	              						<option value="<?php echo $key ?>" ><?php echo $value?></option>
	              					<?php
	              				}
	              			?>
	              		</select>
	            	</div>
	            	<input type='hidden' custid='<?php echo $detail[0]['custid'] ?>' id="cusit_id" />
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Nhóm</label>
	              		<select class="control-label col-md-8 no-border no-padding margin-left-10 grouplist" id="groupid" name="groupid">
	              			
	              		</select>
	            	</div>
	            	<!-- <div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Tên hiển thị</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" value="<?php echo $detail[0]['custname'] ?>">
		              	</label>
	            	</div> -->
	            </div>
          	</div>
          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Họ và Tên</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input name="custname" id="custname" class="col-md-12 no-padding font-size-12" minlength="4" maxlength="30" value="<?php echo $detail[0]['custname'] ?>">
		              	</label>
	            	</div>
	            	<div class="" <?php if($detail[0]['roleid'] !='3'){echo 'hidden';} ?>>
	            		<label class="control-label user-label col-md-3 no-padding">Danh xưng</label>
	              		<select name="gender"class="control-label col-md-8 no-border no-padding margin-left-10" id="gender">
	              			<option value="M">Ông</option>
	              			<option value="F">Bà</option>
	              		</select>
	            	</div>

	            	<div class="" <?php if($detail[0]['roleid'] !='3'){echo 'hidden';} ?>>
	            		<label class="control-label user-label col-md-3 no-padding">CMND:</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input name="idcard" readonly="true" id="idcard" class="col-md-12 no-padding font-size-12" value="<?php echo $detail[0]['idcard'] ?>">
		              	</label>
	            	</div>
	            	<div class="" <?php if($detail[0]['roleid'] !='3'){echo 'hidden';} ?>>
	            		<label class="control-label user-label col-md-3 no-padding">Ngày sinh:</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input name="fullbirthday" id="fullbirthday" class="col-md-12 no-padding font-size-12" value="<?php echo $detail[0]['fullbirthday'] ?>">

		              	</label>
	            	</div>
	            	<div class="break-line margin-bot-5"></div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Điện thoại</label>
	            		<?php if($detail[0]['telephone'] != ''){ ?> 
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input 
		              		<?php if($detail[0]['roleid']== '3'){
		              			echo '';
		              		}
		              		else{echo 'readonly';}  ?>  minlength="10" maxlength="11" name="telephone" id="telephone" class="col-md-12 no-padding font-size-12" value="<?php echo $detail[0]['telephone'] ?>">
		              	</label>
		              	<?php } ?>
	            	<?php if($detail[0]['telephonelist'] != ''){ ?> 
	            		<label class="control-label user-label col-md-3 no-padding"></label>
		              	<label class="control-label col-md-8 no-padding-right">
	              			<?php 
	              			$arrayTelephone = explode(",",$detail[0]['telephonelist']);
	              			if(count($arrayTelephone) >0)
	              			{
	              			foreach ($arrayTelephone as $rows) { ?>
	              				<div class="row">
	              				<input class="col-md-9 padding-left-15 font-size-12" value="<?php echo $rows  ?>">
	              				<a href="#" onclick="removephone('<?php echo $rows  ?>','<?php echo $detail[0]['telephonelist'];?>')"><i class="fas fa-times-circle fa-md float-right margin-top-3" style="margin-right: 2px"></i></a>
	              				<a href="#"><i class="fas fa-arrow-circle-up fa-md float-right margin-top-3"></i></a>
	              				</div>
	              			<?php }}} ?>
		              		
		              	</label>

	            	</div>
	            	<?php if($detail[0]['queue']!=null ){?>
	            	<div class="div-queue">
                  <label class="control-label user-label col-md-3 no-padding">Hàng chờ cuộc gọi</label>
		                    <select class="control-label col-md-8 no-border no-padding margin-left-10" id="queue">
		                       <option value="21114" >Chuyển nhượng hợp đồng</option>
		                      <option value="21115" >Thanh toán vay</option>
		                      <option value="21116" >Khác</option>
		                    </select>
		                    <input type="hidden" id="queue_old" value="<?php echo $detail[0]['queue'] ?>">
                	</div>
                	 <?php } ?>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	              		<label class="control-label col-md-8 no-padding-right field-click-able"><a data-toggle="modal" data-target="#insertPhone">+ Thêm số liên lạc</a></label>
	            	</div>
	            	<div class="break-line margin-bot-5"></div>

	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">E-mail</label>
	            		<?php 
	            	if($detail[0]['email'] != ''){ ?> 

	            		<label class="control-label col-md-8 no-padding-right">
		              		<input name="email" id="email"  minlength="4" maxlength="30" type="email" class="col-md-9 no-padding font-size-12" value="<?php echo $detail[0]['email'] ?>">
		              	</label>

	            	<?php } ?>
	            	<?php if($detail[0]['emaillist'] != ''){ ?> 
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	            		<label class="control-label col-md-8 no-padding-right">
		              		<?php 
	              			$arrayEmail = explode(",",$detail[0]['emaillist']);
	              			if(count($arrayEmail) >0)
	              			{
	              			foreach ($arrayEmail as $rows) { ?>
	              				<div class="row">
	              				<input  class="col-md-9 padding-left-15 font-size-12" value="<?php echo $rows  ?>">
		              			<a href="#" onclick="removeemail('<?php echo $rows  ?>','<?php echo $detail[0]['emaillist'];?>')"><i class="fas fa-times-circle fa-md float-right margin-top-3" style="margin-right: 2px"></i></a>
	              				<a href="#" ><i class="fas fa-arrow-circle-up fa-md float-right margin-top-3"></i></a>
	              			</div>
	              			<?php }}} ?>
		              	</label>

	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	              		<label class="control-label col-md-8 no-padding-right field-click-able"><a data-toggle="modal" data-target="#insertEmail">+ Thêm địa chỉ e-mail</a></label>
	            	</div>
	            	<div class="break-line margin-bot-5"></div>
	            	<div class="" <?php if($detail[0]['roleid'] !='3'){echo 'hidden';} ?>>
	            		<label class="control-label user-label col-md-3 no-padding">Địa chỉ</label>
	              		<label class="control-label col-md-8 no-padding-right">
	              			<input onkeyup="" name="fulladdress" class="col-md-12 no-padding font-size-12" value="<?php echo $address[0]['fulladdress'] ?>" id="fulladdress" placeholder="Địa chỉ" maxlength="30">
	              			<?php

	              				/*
	              				foreach ($address as $add) {
	              					?>
	              					<input onkeyup="" name="fulladdress" class="col-md-12 no-padding font-size-12" value="<?php echo $add['fulladdress'] ?>" id="fulladdress" placeholder="Địa chỉ" maxlength="30">
	              					<?php
	              				}
	              				*/
	              			?>
		              	</label>
	            	</div>

	            	<div class="" <?php if($detail[0]['roleid'] !='3'){echo 'hidden';} ?>>
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	              		<label class="control-label col-md-8 no-padding-right field-click-able"><a data-toggle="modal" data-target="#updateAddress">+ Sửa địa chỉ</a></label>
	            	</div>
	            	<!-- <div class="margin-bot-5">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	              		<select name="city" class="control-label col-md-8 no-border no-padding margin-left-10" onchange="selectCity(this)" id="city">
	              			<option selected="true" disabled="true">
    							--Chọn Tỉnh Thành--
  							</option>
	              			<?php 
	              			if(count($city) >0)
	              			{
	              			foreach ($city as $rows) { ?>
	              				<option value="<?php echo $rows->id_city ?>"><?php echo $rows->name ?></option>
	              			<?php }} ?>
	              		</select>
	            	</div> -->
	            	<!-- <div class="margin-bot-5">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	              		<select name="district" id="district" class="control-label col-md-8 no-border no-padding margin-left-10" onchange="selectDistrict(this)">
	              			<option selected="true" id="dodulieu" disabled="true">
    							--Chọn Quận Huyện--
  							</option>
	              		</select>
	            	</div>
	            	<div class="margin-bot-5">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	              		<select name="ward" class="control-label col-md-8 no-border no-padding margin-left-10" id="ward" onchange="selectWard(this)">
	              			<option  selected="true" id="dodulieu1" disabled="true">
    							--Chọn Phường Xã--
  							</option>
	              		</select>
	            	</div>
	            	<div class="margin-bot-5">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	            		<label class="control-label col-md-8 no-padding-right">
		              		
	              				<input name="address" class="col-md-12 no-padding font-size-12" placeholder="-Số nhà, Đường,..." value="" onkeyup="keyUpAddress(this)"  maxlength="20">
		              	</label>
	            	</div> -->
	            </div>
	            <div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Ghi chú</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input name="comments" id="comments" class="col-md-12 no-padding font-size-12" value="<?php echo $detail[0]['comments'] ?>"  maxlength="30">
		              	</label>
	            	</div>
          	</div>
          </form>	
          <form id="dataExt" method="POST" role="form">
          	<?php 
          	if($detail[0]['extinfo'] !=null)
          	{
          	$data = json_decode($detail[0]['extinfo'],true);
          	}
          	else{$data = null;}
          	 ?>
          	
          	<div class="tile p-0 padding-5 margin-bot-5 div-bonus" <?php if($detail[0]['roleid'] !='3'){echo 'hidden';} ?>>
	            <div class="tile-body padding-left-10">
	            	<?php 
	            	if(count($list_ext)>0){
	            	foreach ($list_ext as $value) {
	            	if($value['formid'] == 'user'){
	             ?>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">
	            			<?php echo $value['fieldname'] ?>
	            		</label>
	              			<?php if($value['fieldtype'] == 'T') {
	              				$dataReal='';
	              				if($data !=null)
	              				{
	              				foreach ($data as $extkey => $extvalue){
	              					if($extkey == $value['fieldcode']){
	              						$dataReal = $extvalue;
	              						break;
	              					}else{$dataReal = '';}}}?>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input name="<?php echo $value['fieldcode'] ?>" id="<?php echo $value['fieldcode'] ?>" class="col-md-12 no-padding font-size-12 available" value="<?php echo $dataReal ?>" placeholder="<?php echo $value['fieldname'] ?>">
		              	</label>
		              		<?php }else if($value['status'] == 'S'){?>
		              			<select class="control-label col-md-8 no-border no-padding margin-left-10" id="<?php echo $value['code'] ?>">
		              			<?php foreach ($list_ext as $material) {
		              				if($material['category'] == $value['code'] && $material['status'] =='O'){
		              				?>
		              				<option value="<?php echo $material['code'] ?>"><?php echo $material['name'] ?></option>
		              			<?php }}?> 
		              			</select>
		              		<?php } ?>
	            	</div>
	            <?php }}} ?>
	            </form>
	            </div>
          	</div>

          	<div>
	        <div class="fc-corner-right">
          		<div class="fc-button-group" style="float:right">
					<button type="submit" id="updateUser" class="fc-agendaWeek-button fc-button fc-state-default fc-state-active fc-corner-right btn-update">Lưu thông tin</button>
				</div>
          	</div>
          	</div>
          	<div class="padding-5 margin-bot-5" style="margin-top: 40px">
	          	<div class="">
	        		<label class="control-label user-label col-md-3 no-padding">Ngày tạo</label>
	          		<label class="control-label col-md-8 no-padding-right"><?php
	          		if($detail[0]['createddate'] !=null)
	          		{
	          		echo date("d/m/Y", strtotime($detail[0]['createddate']));}
	          		 ?></label>
	        	</div>
	        	<!-- <div class="">
	        		<label class="control-label user-label col-md-3 no-padding">Cập nhật</label>
	          		<label class="control-label col-md-8 no-padding-right">Vài phút trước</label>
	        	</div>
	        	<div class="clearfix">
	        		<label class="control-label user-label col-md-3 no-padding">Tương tác cuối</label>
	          		<label class="control-label col-md-8 no-padding-right no-margin-top">2 ngày trước</label>
	        	</div> -->
	        </div>
	        <?php
	        try
	        { 
	        $id = isset($_GET['cusid']) ? $_GET['cusid'] :'' ;
	    	}catch(exception $Ex)
	    	{
	    		$id = '';
	    	} 
	        
    		if($id == '')
    		{
    			$id = strval($_GET['phone']);
    		}
    		$idcard = strval($_GET['idcard']);
    		$roleid = strval($_GET['roleid']);
	         ?>
	        <div class="modal fade" id="insertPhone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" style="margin-top: 5%" role="document">
			    <div class="modal-content">
			    	<form method="post" enctype="multipart/form-data" action="<?php echo base_url().'user/insertPhoneList/?cusid='.$id.'&idcard='.$idcard.'&roleid='.$roleid ?>">
			      <div class="modal-header">
			        <h4 class="modal-title" id="myModalLabel">Thêm số điện thoại</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
			        	<div class="form-group">
					    <label for="exampleInputEmail1">Số Điện Thoại</label>
					    <input type="text" class="form-control" name="telephonelist" id="telephonelist" name="tvcdb" placeholder="-Số điện thoại">
					  </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Thêm</button>
			      </div>
					</form>
			    </div>
			  </div>
			</div>

			<div class="modal fade" id="insertEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" style="margin-top: 5%" role="document">
			    <div class="modal-content">
			    	<form method="post" enctype="multipart/form-data" action="<?php echo base_url().'user/insertEmailList/?cusid='.$id.'&idcard='.$idcard.'&roleid='.$roleid ?>">
			      <div class="modal-header">
			        <h4 class="modal-title" id="myModalLabel">Thêm email</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
			        <div class="form-group">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="email" class="form-control" name="emaillist" id="emaillist" name="tvcdb" placeholder="-Email">
					  </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Thêm</button>
			      </div>
			  		</form>
			    </div>
			  </div>
			</div>

			<div class="modal fade" id="updateAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" style="margin-top: 5%" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title" id="myModalLabel">Sửa địa chỉ</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
			      	<div class="form-group">
					    <label for="exampleInputEmail1">Địa chỉ:</label>
					    <input name="fulladdress" class="form-control" value="<?php echo $address[0]['fulladdress'] ?>" id="fulladdresstemp" placeholder="Địa chỉ" maxlength="30">
					  </div>

			      	<div class="form-group">
					    <label for="exampleInputEmail1">Số nhà:</label>
					    <input id="sonha" name="address" class="form-control" placeholder="-Số nhà, Đường,..." value="" onkeyup="keyUpAddress(this)"  maxlength="20">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Thành Phố:</label>
					    <select name="city" class="form-control" onchange="selectCity(this)" id="city">
	              			<option selected="true" disabled="true">
    							--Chọn Tỉnh Thành--
  							</option>
	              			<?php 
	              			if(count($city) >0)
	              			{
	              			foreach ($city as $rows) { ?>
	              				<option value="<?php echo $rows->id_city ?>"><?php echo $rows->name ?></option>
	              			<?php }} ?>
	              		</select>
					  </div>
			        <div class="form-group">
					    <label for="exampleInputEmail1">Quận huyện:</label>
					    <select name="district" id="district" class="form-control" onchange="selectDistrict(this)">
	              			<option selected="true" id="dodulieu" disabled="true">
    							--Chọn Quận Huyện--
  							</option>
	              		</select>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Phường xã:</label>
					    <select name="ward" class="form-control" id="ward" onchange="selectWard(this)">
	              			<option  selected="true" id="dodulieu1" disabled="true">
    							--Chọn Phường Xã--
  							</option>
	              		</select>
					  </div>
					  
			      </div>

			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary btn-addfulladdress" data-dismiss="modal" addid="<?php echo $address[0]['addressid'] ?>">Sửa</button>
			      </div>
			    </div>
			  </div>
			</div>
