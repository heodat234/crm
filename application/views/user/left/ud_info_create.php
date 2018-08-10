<form id="insertUserVal" method="POST" role="form">
<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Phân quyền</label>
	              		<select name="roleid" class="control-label col-md-8 no-border no-padding margin-left-10" id="roleid" onchange="selectGroup(this)">
	              			<option selected="true" disabled="true" value="">--Chọn Phân Quyền--</option>
	              			<?php
	              				foreach ($role_list as $key => $value) {
	              					?>
	              						<option value="<?php echo $key ?>" ><?php echo $value?></option>
	              					<?php
	              				}
	              			?>
	              		</select>
	            	</div>
	            	<div class="div-group">
	            		<label class="control-label user-label col-md-3 no-padding">Nhóm</label>
	              		<select name="groupid" class="control-label col-md-8 no-border no-padding margin-left-10  grouplist" id="groupid">
	              			<option selected="true" disabled="true" value="">--Chọn Nhóm Quyền--</option>
	              			<?php
	              				foreach ($group_list as $value) {
	              					?>
	              						<option value="<?php echo $value['groupid'] ?>" ><?php echo $value['groupname']?></option>
	              					<?php
	              				}
	              			?>
	              		</select>
	            	</div>
	            	<!-- <?php $var = $this->session->userdata;
							$roleid = $var['roleid'];
							if($roleid == '1')
								{ ?>
							
	            	<div class="div-add">
	            		<label class="control-label user-label col-md-3 no-padding">ID:</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="custid" name="custid" type="text" class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập ID" required
               minlength="4" maxlength="8">
		              	</label>
	            	</div>

	            	<div class="div-add">
	            		<label class="control-label user-label col-md-3 no-padding">Password:</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="password" name="custid" type="password" class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập password" required
               minlength="4" maxlength="30">
		              	</label>
	            	</div>
							 <?php } ?> -->
	            	<!--
		            	<div class="">
		            		<label class="control-label user-label col-md-3 no-padding">Tên hiển thị</label>
		              		<label class="control-label col-md-8 no-padding-right">
			              		<input class="col-md-12 no-padding font-size-12" value="">
			              	</label>
		            	</div>
		            -->
	            </div>
          	</div>

          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Họ và Tên</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập họ tên" name="custname" id="custname" required
               minlength="4" maxlength="30">
		              	</label>
	            	</div>
	            	<div class="div-danhxung">
	            		<label class="control-label user-label col-md-3 no-padding">Danh xưng</label>
	              		<select class="control-label col-md-8 no-border no-padding margin-left-10" name="gender" id="gender">
	              			<option value="M">Ông</option>
	              			<option value="F">Bà</option>
	              		</select>
	            	</div>

	            	<div class="div-cmnd">
	            		<label class="control-label user-label col-md-3 no-padding">CMND:</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="idcard" name="idcard" class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập cmnd" required
               minlength="9" maxlength="10">
		              	</label>
	            	</div>
	            	<div class="div-ngaysinh">
	            		<label class="control-label user-label col-md-3 no-padding">Ngày sinh:</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="fullbirthday" name="fullbirthday" class="col-md-12 no-padding font-size-12" value="">
		              	</label>
	            	</div>
	            	<div class="break-line margin-bot-5"></div>
	            	<div class="div-phone">
	            		<label class="control-label user-label col-md-3 no-padding">Điện thoại</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="telephone" name="telephone" class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập sdt chính" required>
		              	</label>
	            	</div>
	            	<!--
		            	<div class="">
		            		<label class="control-label user-label col-md-3 no-padding"></label>
		              		<label class="control-label col-md-8 no-padding-right field-click-able"><a data-toggle="modal" data-target="#insertPhone">+ Thêm số liên lạc</a></label>
		            	</div>
		            -->
	            	<div class="break-line margin-bot-5"></div>

	            	<div class="div-email">
	            		<label class="control-label user-label col-md-3 no-padding">E-mail</label> 
	            	
	            		<label class="control-label col-md-8 no-padding-right">
		              		<input id="email" name="email" type="email" class="col-md-12 no-padding font-size-12" value="" placeholder="Nhập email chính" 
               minlength="4" maxlength="50">
		              	</label>
		              	<!--
	            	
	            		<label class="control-label col-md-8 no-padding-right">
	              			<input class="col-md-12 no-padding font-size-12" value="">
		              	</label>
						-->
	            	</div>
	            	<!--
		            	<div class="">
		            		<label class="control-label user-label col-md-3 no-padding"></label>
		              		<label class="control-label col-md-8 no-padding-right field-click-able"><a data-toggle="modal" data-target="#insertEmail">+ Thêm địa chỉ e-mail</a></label>
		            	</div>
		            -->
		            <div class="div-address">

	            	<div class="break-line margin-bot-5"></div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Địa chỉ</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input name="fulladdress" class="col-md-12 no-padding font-size-12" value="" id="fulladdress" placeholder="Địa chỉ" maxlength="50">
		              	</label>
	            	</div>
	            	<div class="margin-bot-5">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	              		<select class="control-label col-md-8 no-border no-padding margin-left-10" onchange="selectCity(this)" id="city">
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
	            	<div class="margin-bot-5">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	              		<select class="control-label col-md-8 no-border no-padding margin-left-10" id="district" onchange="selectDistrict(this)">
	              			<option selected="true" id="dodulieu" disabled="true">
    							--Chọn Quận Huyện--
  							</option>
	              		</select>
	            	</div>
	            	<div class="margin-bot-5">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	              		<select class="control-label col-md-8 no-border no-padding margin-left-10" id="ward" onchange="selectWard(this)">
	              			<option selected="true" id="dodulieu1" disabled="true">
    							--Chọn Phường Xã--
  							</option>
	              		</select>
	            	</div>
	            	<div class="margin-bot-5">
	            		<label class="control-label user-label col-md-3 no-padding"></label>
	            		<label class="control-label col-md-8 no-padding-right">
		              		
	              				<input id="address" onkeyup="keyUpAddress(this)" class="col-md-12 no-padding font-size-12" placeholder="-Số nhà, Đường,..." maxlength="15">
		              	</label>
	            	</div>
	            	</div>
	            </div>
          	</div>
          	<div class="tile p-0 padding-5 margin-bot-5 div-ghichu">
	            <div class="tile-body padding-left-10">
	            	<!--
	              	<div class="row">
	            		<label class="control-label user-label col-md-3 no-padding">Tags</label>
	              		<label class="control-label col-md-8 no-padding-right">
	              			<ul class="tags no-margin-bot">
						        <li class="addedTag">
						        	VIP
						        	<span class="tagRemove fa fa-times"></span>
						        </li>
						         <li class="addedTag">
						        	<span class="tagRemove fa fa-times"></span>
						        </li>
							</ul>
	              		</label>
	            	</div>
	            	-->
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Tags</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input name="tag" id="tag" class="col-md-12 no-padding font-size-12 available" value="" placeholder="Tags">
		              	</label>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Ghi chú</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input name="comments" id="comments" class="col-md-12 no-padding font-size-12 available" value="" placeholder="Nhập ghi chú">
		              	</label>
	            	</div>
	            </div>
          	</div>
<!-- <div class="">
	            		<label class="control-label user-label col-md-3 no-padding">TT Hôn Nhân</label>
	              		<select class="control-label col-md-8 no-border no-padding margin-left-10" id="materialstt" onchange="selectWard(this)">
	              			<option id="dodulieu1" disabled="true">
    							--Chọn Tình Trạng--
  							</option>
  							<option id="dodulieu1">
    							Độc Thân
  							</option>
  							<option id="dodulieu1">
    							Đã Kết Hôn
  							</option>
	              		</select>
	            	</div>

	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Thu nhập</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="thunhap" class="col-md-12 no-padding font-size-12 available" value="" placeholder="Nhập thu nhập">
		              	</label>
	            	</div>

	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Nghề Nghiệp</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="work" class="col-md-12 no-padding font-size-12 available" value="" placeholder="Nhập nghề nghiệp">
		              	</label>
	            	</div>

	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Sở thích/Giải trí</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="enjoy" class="col-md-12 no-padding font-size-12 available" value="" placeholder="Nhập sở thích">
		              	</label>
	            	</div>

	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Người liên hệ</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="enjoy" class="col-md-12 no-padding font-size-12 available" value="" placeholder="Nhập người liên hệ">
		              	</label>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Facebook Fanpage</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input id="enjoy" class="col-md-12 no-padding font-size-12 available" value="" placeholder="Facebook">
		              	</label>
	            	</div> -->
</form>
          	<div class="tile p-0 padding-5 margin-bot-5 div-bonus">
	            	<form id="dataExt" method="POST" role="form">
	            <div class="tile-body padding-left-10">
	            	
	            	<?php foreach ($list_ext as $value) {
	            	if($value['formid'] == 'user'){
	             ?>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">
	            			<?php echo $value['fieldname'] ?>
	            		</label>
	              			<?php if($value['fieldtype'] == 'T') {?>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input name="<?php echo $value['fieldcode'] ?>" id="<?php echo $value['fieldcode'] ?>" class="col-md-12 no-padding font-size-12 available" value="" placeholder="<?php echo $value['fieldname'] ?>">
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
	            <?php }} ?>
	            </div>
	        	</form>
          	</div>

          	<div class="fc-corner-right">
          		<div class="fc-button-group" style="float:right">
					<button type="submit" class="fc-agendaWeek-button fc-button fc-state-default fc-state-active fc-corner-right btn-createuser">Lưu thông tin</button>
				</div>
          	</div>
