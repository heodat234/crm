<div class="tile height-429 no-margin-bot">
	            <div class="content-title">
	            	<?php $contractid = $this->uri->segment(3); ?>
			        <button class="btn btn-blank insert-manual" type="button" title="Insert Ticket" alt="<?php echo base_url().'ticket/viewInsert/'.$contractid ?>">+ Phiếu hỗ trợ  </button>
			    </div>
			    <div class="bs-component margin-top-10">
	              	<ul class="nav nav-tabs nav-user" role="tablist">
	              		<!-- <li class="nav-item angle angle-left">
    						<i id="move-left" class="fa fa-angle-left"></i>
		                </li> -->
		                <li class="nav-item" role="presentation">
		                	<a class="user-tab active show" data-toggle="tab" href="#tab-content-1">Thành viên</a>
		                </li>
		                <li class="nav-item" role="presentation">
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-2">Lịch sử trạng thái</a>
		                </li>
		                <li class="nav-item" role="presentation"> 
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-3">Công nợ/ Thanh toán</a>
		                </li>
		                <li class="nav-item" role="presentation">
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-4">KM/ Quà tặng</a>
		                </li>
		                <li class="nav-item" role="presentation">
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-5">NV Kinh doanh</a>
		                </li>
		                <li class="nav-item" role="presentation">
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-6">Điều chỉnh hợp đồng</a>
		                </li>
		                <li class="nav-item" role="presentation">
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-7">Ghi chú</a>
		                </li>
		               <!--  <li class="nav-item angle angle-right">
    						<i id="move-right" class="fa fa-angle-right"></i>
		                </li> -->
	              	</ul>
	              	<div class="tab-content" id="myTabContent">
		                <div class="tab-pane fade active show" id="tab-content-1">
		                  	<div class="table-responsive">
		                  		<?php 
		                  		if(count($trade_tv) >0)
		                  		{
		                  		foreach ($trade_tv as $value) { ?>

					                <div class="row">
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Họ và Tên: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['name'] ?></label>
										  </div>
									  </div>
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Giới tính: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['gender'] ?></label>
										  </div>
									  </div>

									  <div class="col-md-4">
									  	<div class="form-group">
									  		 <label for="exampleInputName2"><strong>Ngày sinh: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['birthday'].'/'.$value['birthmonth'].'/'.$value['birthyear'] ?></label>
										  </div>
									  </div>
									</div>

									<div class="row">
									  <div class="col-md-6">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Số điện thoại: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['telephone'] ?></label>
										  </div>
									  </div>

									  <div class="col-md-6">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Email: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['email'] ?></label>
										  </div>
									  </div>
									</div>

									<div class="row">
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Số CMND: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['idcard'] ?></label>
										  </div>
									  </div>
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Ngày cấp: </strong></label>
										    <label for="exampleInputName2"><?php 
										    if($value['issueddate'] !=null)
										    {
										    echo date("Y/m/d", strtotime($value['issueddate']));} ?></label>
										  </div>
									  </div>
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Nơi cấp: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['issuedplace'] ?></label>
										  </div>
									  </div>
									</div>

									<div class="row">
									  <div class="col-md-12">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Địa chỉ thường trú: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['residencyaddress'] ?></label>
										  </div>
									  </div>

									</div>

									<div class="row">
									  <div class="col-md-12">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Địa chỉ liên lạc: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['contactaddress'] ?></label>
										  </div>
									  </div>

									</div>

									<div class="row">
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Chức vụ: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['title'] ?></label>
										  </div>
									  </div>
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Số TKNH: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['bankaccountno'] ?></label>
										  </div>
									  </div>
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Ngân hàng: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['bankname'] ?></label>
										  </div>
									  </div>
									  
									</div>

									<div class="row">

									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Quốc gia: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['nationalily'] ?></label>
										  </div>
									  </div>

									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Số DTDD: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['cellphone'] ?></label>
										  </div>
									  </div>

									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Giấy uỷ quyền: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['authorizedletter'] ?></label>
										  </div>
									  </div>
									  
									</div>

									<div class="row">
									  <div class="col-md-12">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Công ty: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['company'] ?></label>
										  </div>
									  </div>
									  
									</div>

									<div class="row">
									  <div class="col-md-12">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Ghi chú: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['remarks'] ?></label>
										  </div>
									  </div>
									</div>
					                
				              	<!-- </table> -->

		                  	<?php	}} ?>
				            </div>
		                </div>
		                <div class="tab-pane fade" id="tab-content-2">
		                  	<div class="table-responsive" style="height: 235px;">
				              	<table class="table" id="table-1">
				              		<thead class="no-border-top">
				              			<tr>
				              				<th style="width: 11%;">Tình trạng</th>
				              				<th style="width: 17%;">Ngày</th>
				              				<th>Từ khách hàng</th>
				              				<th>Đến khách hàng</th>
				              				<th width="30%">Ghi chú</th>
				              			</tr>
				              		</thead>
					                <tbody>
					                	<?php 
					                	if(count($trade_history) >0)
					                	{
					                	foreach ($trade_history as $value) { ?>
					                  	<tr class="border-bot-1">
						                    <td width="100">
						                    	<?php echo $value['status'] ?>
						                    </td>
						                    <td>
						                    	<?php 
						                    	if($value['statusdate'] !=null)
										    {
						                    	echo date("Y/m/d", strtotime($value['statusdate']));} ?>
						                    </td>
						                    <td><?php echo $value['name'] ?></td>
						                    <td><?php echo $value['name1'] ?></td>
						                    <td><?php echo $value['remarks'] ?></td>
					                  	</tr>
					                	<?php }} ?>
					                </tbody>
				              	</table>
				            </div>
		                </div>
		                <div class="tab-pane fade" id="tab-content-3">
				              	<table class="table table-striped table-bordered" id="table-1-congno">
				              		<thead class="no-border-top">
				              			<tr>
				              				<th>Loại NK</th>
				              				<th>HĐC</th>
				              				<th>HĐ MB</th>
				              				<th>Ngày</th>
				              				<th>Ngày ĐH</th>
				              				<th>S.tiền</th>
				              				<th>Diễn Giải</th>
				              				<th>PB</th>
				              				<th>Tiến Độ</th>
				              			</tr>
				              		</thead>
					                <tbody>
					                	<?php 
					                	if(count($trade_cntt) >0)
					                	{
					                	foreach ($trade_cntt as $value) { ?>
					                  	<tr class="border-bot-1">
						                    <td width="60">
						                    	<?php echo $value['revenuetype'] ?>
						                    </td>
						                    <td>
						                    	<?php echo $value['value0'] ?>
						                    </td>
						                    <td><?php echo $value['value4'] ?></td>
						                    <td>
												<?php 
												if($value['transdate'] !=null)
												{
												echo date("Y/m/d", strtotime($value['transdate']));} ?>
						                    <td><?php 
						                    if($value['duedate'] !=null)
												{
													echo date("Y/m/d", strtotime($value['duedate']));} ?></td>
						                    <td><?php echo number_format(abs($value['amount']))   ?></td>
						                    <td><?php echo $value['extdescription1'] ?></td>
						                    <td><?php echo $value['allocation'] ?></td>
						                    <td><?php 
						                    if($value['duedate'] !=null)
												{
													echo date("Y/m/d", strtotime($value['duedate'])); }?></td>
					                  	</tr>
					                	<?php }} ?>
					                </tbody>
				              	</table>
		                </div>
		                <div class="tab-pane fade" id="tab-content-4">
		                  	<div class="table-responsive" style="height: 235px">
				              	<table class="table" id="table-1">
				              		<thead class="no-border-top">
				              			<tr>
				              				<th style="
												width: 19%;">Ngày</th>
												<th style="
												width: 19%;;">HH/DV</th>
												<th style="
												width: 11%;">Số lượng</th><th style="
												width: 19%;;">Giá trị</th>
				              				<th>Ghi chú</th>
				              			</tr>
				              		</thead>
					                <tbody>
					                	<?php 
					                	if(count($trade_km)>0)
					                	{
					                	foreach ($trade_km as $key => $value) { ?>
					                  	<tr class="border-bot-1">
						                    <td width="100">
						                    	<?php 
						                    	if($value['promotiondate'] !=null)
												{
						                    	echo date("Y/m/d", strtotime($value['promotiondate']));} ?>
						                    </td>
						                    <td>
						                    	<?php echo $value['description'] ?>
						                    </td>
						                    <td><?php echo $value['quantity'] ?></td>
						                    <td><?php echo $value['amount'] ?></td>
						                    <td><?php echo $value['remarks'] ?></td>
					                  	</tr>
					                	<?php }} ?>
					                </tbody>
				              	</table>
				            </div>
		                </div>
		                <div class="tab-pane fade" id="tab-content-5">
		                  	<div class="table-responsive">
				              	<table class="table" id="table-1">
				              		<thead class="no-border-top">
				              			<tr>
				              				<th style="
								width: 30%;">Nhân viên</th><th style="
								width: 14%;">Sàn</th><th style="
								width: 18%;">Tỉ lệ thưởng</th>
												              				<th>Ghi chú</th>
				              			</tr>
				              		</thead>
					                <tbody>
					                	<?php foreach ($trade_nvkd as $value) { ?>
					                  	<tr class="border-bot-1">
						                    <td>
						                    	<?php echo $value['name'] ?>
						                    </td>
						                    <td><?php echo $value['name1'] ?></td>
						                    <td><?php echo number_format((float)$value['commissionrate'],5,'.','')  ?></td>
						                    <td><?php echo $value['remarks'] ?></td>
					                  	</tr>
					                	<?php } ?>
					                </tbody>
				              	</table>
				            </div>
		                </div>
		                <div class="tab-pane fade" id="tab-content-6">
				              	<div class="table-responsive">
				              		<?php 
				              		if(count($trade_dchd) >0)
				              		{
				              		foreach ($trade_dchd as $value) { ?>
				              		<div class="row">
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Ngày Đc: </strong></label>
										    <label for="exampleInputName2"><?php 
						                    	if($value['adjustdate'] !=null)
												{
													echo date("Y/m/d", strtotime($value['adjustdate']));} ?></label>
										  </div>
									  </div>
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Ngày đến hạn: </strong></label>
										    <label for="exampleInputName2"><?php 
						                    	if($value['duedate'] !=null)
												{
													echo date("Y/m/d", strtotime($value['duedate']));} ?></label>
										  </div>
									  </div>

									  <div class="col-md-4">
									  	<div class="form-group">
									  		 <label for="exampleInputName2"><strong>Ghi chú: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['comments'] ?></label>
										  </div>
									  </div>
									</div>

									<div class="row">
									  <div class="col-md-6">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Diện tích: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['pptarea'] ?></label>
										  </div>
									  </div>

									  <div class="col-md-6">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Giá trị hợp đồng: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['contractvalue'] ?></label>
										  </div>
									  </div>
									</div>

									<div class="row">
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Giá bán chưa VAT: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['value0'] ?></label>
										  </div>
									  </div>
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Thuế VAT: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['value1'] ?></label>
										  </div>
									  </div>
									  <div class="col-md-4">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Phí bảo trì: </strong></label>
										    <label for="exampleInputName2"><?php echo $value['value2'] ?></label>
										  </div>
									  </div>
									</div>

									<div class="row">
									  <div class="col-md-6">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Giá trị quyền SDĐ:</strong></label>
										    <label for="exampleInputName2"><?php echo $value['value3'] ?></label>
										  </div>
									  </div>
									  <div class="col-md-6">
									  	<div class="form-group">
										    <label for="exampleInputName2"><strong>Giá để tính thuế VAT: </strong></label>
										   <label for="exampleInputName2"><?php echo $value['value4'] ?></label>
										  </div>
									  </div>
									</div>
				              		<?php }} ?>
				              	</div>
				              	<!-- <table class="table table-striped table-bordered" id="table-1-dchd">
				              		<thead class="no-border-top">
				              			<tr>
				              				<th>Ngày Đ/c</th>
				              				<th>Ngày đến hạn</th>
				              				<th>Ghi Chú</th>
				              				<th>DT</th>
				              				<th>Giá trị hợp đồng</th>
				              				<th>Giá bán chưa VAT</th>
				              				<th>Thuế VAT</th>
				              				<th>Phí bảo trì</th>
				              				<th>Giá trị QSDĐ</th>
				              				<th>Giá tính VAT</th>
				              			</tr>
				              		</thead>
					                <tbody>
					                	<?php 
					                	if(count($trade_dchd) >0)
					                	{
					                	foreach ($trade_dchd as $value) { ?>
					                  	<tr class="border-bot-1">
						                    <td width="60">
						                    	<?php 
						                    	if($value['adjustdate'] !=null)
												{
													echo date("Y/m/d", strtotime($value['adjustdate']));} ?>
						                    </td>
						                    <td>
						                    	<?php 
						                    	if($value['duedate'] !=null)
												{
													echo date("Y/m/d", strtotime($value['duedate']));} ?>
						                    </td>
						                     <td>
						                    	<?php echo $value['comments'] ?>
						                    </td>
						                    <td><?php echo $value['pptarea'] ?></td>
						                    <td><?php echo $value['contractvalue'] ?></td>
						                    <td><?php echo $value['value0'] ?></td>
						                    <td><?php echo $value['value1'] ?></td>
						                   <td><?php echo $value['value2'] ?></td>
						                   <td><?php echo $value['value3'] ?></td>
						                   <td><?php echo $value['value4'] ?></td>
					                  	</tr>
					                	<?php }} ?>
					                </tbody>
				              	</table> -->
		                </div>
		                <div class="tab-pane fade" id="tab-content-7">
		                  	<div class="table-responsive">
				              	<table class="table" id="table-1">
				              		<thead class="no-border-top">
				              			<tr>
				              				<th style="
												width: 14%;">Loại ghi chú</th><th style="
												width: 20%;">Ngày ghi chú</th><th style="
												width: 14%;;">Tình trạng</th><th style="
												width: 26%;">Nhân viên</th>
				              				<th>Nội dung</th>
				              			</tr>
				              		</thead>
					                <tbody>
					                	<?php 
					                	if(count($trade_gc) >0)
					                	{
					                	foreach ($trade_gc as $value) { ?>
					                  	<tr class="border-bot-1">
						                    <td width="150">
						                    	<?php echo $value['eventtype'] ?>
						                    </td>
						                    <td>
						                    	<?php 
						                    	if($value['eventdate'] !=null)
												{
													echo date("Y/m/d", strtotime($value['eventdate']));} ?>
						                    </td>
						                    <td><?php echo $value['eventstatus'] ?></td>
						                    <td><?php echo $value['name'] ?></td>
						                    <td><?php echo $value['notes'] ?></td>
					                  	</tr>
					                	<?php }} ?>
					                </tbody>
				              	</table>
				            </div>
		                </div>
	              	</div>
	            </div>
          	</div>
<div class="tile height-429 margin-top-7">
	<div>
	<button type="button" class="fc-agendaWeek-button fc-button fc-state-default fc-state-active fc-corner-right">Ticket</button>
			    </div>
			    <div class="bs-component margin-top-10">
          			<div class="table-responsive" style="height: 396px">
		              	<table class="table" id="table-1">
		              		<thead class="no-border-top">
		              			<tr>
		              				<th>ID</th>
		              				<th>Tựa đề</th>
		              				<th>Ngày yêu cầu</th>
		              				<th>Người phụ trách</th>
		              				<th>Cập nhật lần cuối</th>
		              			</tr>
		              		</thead>
			                <tbody>
			                	<tr>
			                		<td colspan="5">
			                			<label class="no-margin-bot field-click-able">Trạng thái: Mở (2)</label>
			                		</td>
			                	</tr>
			                	<?php 
			                	if(count($ticket_bottom['data'])>0)
			                	{
			                	foreach ($ticket_bottom['data'] as $value) {?>
			                  	<tr class="border-bot-1">
				                    <td width="100">
				                    	<a class="buttonnewiframe" title="<?php echo $value['ticketid'] ?>" alt="<?php echo base_url().'ticket/detail/'.$value['ticketid'] ?>" href="#">
				                    	<span class="id-label span-danger">O</span>  <?php echo $value['ticketid'] ?>
				                    	</a>
				                    </td>
				                    <td>
				                    	<?php echo $value['title'] ?>
				                    </td>
				                    <td>
				                    	<?php 
				                    	if($value['createat'] !=null)
												{
													echo date("Y/m/d", strtotime($value['createat'])); }?></td>
				                    <td><?php 
				                    echo $value['agentcurrent'] ?></td>
				                    <td><?php 
				                    if($value['lastupdate'] !=null)
												{
				                    echo date("Y/m/d", strtotime($value['lastupdate']));} ?></td>
			                  	</tr>
			                	<?php }} ?>
			                </tbody>
		              	</table>
		            </div>
	            </div>
          	</div>