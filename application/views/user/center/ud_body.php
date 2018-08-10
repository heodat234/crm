<div class="tile">
	            <div class="content-title">
			        <div class="div">
			          	<h5><img class="user-avatar" src="<?php echo $user[0]['avatar'] ?>" alt="User Image"> <?php echo $user[0]['custname'] ?></h5>
			        </div>
			        <button id="demoSwal" style="display: none;" type="hidden" class="btn btn-blank" type="button">+ Phiếu hỗ trợ  </button>
			        <button id="demoNotify" style="display: none;" type="hidden" class="btn btn-blank" type="button">+ Thông báo  </button>
			        <button id="demoModal" style="display: none;" type="hidden" class="btn btn-blank" type="button">+ Modal  </button>
			    </div>
			    <div class="bs-component">
	              	<ul class="nav nav-tabs">
		                <li class="nav-item">
		                	<a class="user-tab active show" data-toggle="tab" href="#tab-content-1">Giao dịch (<?php 
		                				$i = 0;
		                				if(count($trade)>0)
		                				{
		                			foreach ($trade as $value) {
		                					$i++;
		                			}}
		                				echo $i;
		                			 ?>)</a>
		                </li>
		                <li class="nav-item">
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-2">Phiếu (<?php 
		                				$i = 0;
		                				if(count($ticket)>0)
		                				{
		                			foreach ($ticket as $value) {
		                				if($value['hidden'] == '0')
		                				{
		                					$i++;
		                				}
		                			}}
		                				echo $i;
		                			 ?>)</a>
		                </li>
		                <!--
		                <li class="nav-item">
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-3">Cuộc gọi (1)</a>
		                </li>
		            -->
	              	</ul>
	              	<div class="tab-content" id="myTabContent">
		                <div class="tab-pane fade" id="tab-content-2">

		                	
		                  	<div class="table-responsive">
				              	<table class="table" id="table-1-ticket">
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
					                	<?php 
					                	if(count($ticket) >0)
					                	{
					                	foreach ($ticket as $rows) {
					                		if($rows['hidden'] =='0')
					                		{
					                	 ?>
						                  	<tr class="border-bot-1">
							                    <td width="100">
							                    	<a href="<?php echo base_url().'ticket/detail/'.$rows['ticketid'] ?>">
							                    	<span class="id-label span-danger">O</span>  #<?php echo $rows['ticketid'] ?></a>
							                    </td>
							                    <td>
							                    	<?php echo $rows['title'] ?>
							                    </td>
							                    <td><?php echo $rows['createat'] ?></td>
							                    <td><?php echo $rows['agentcreated'] ?></td>
							                    <td><?php echo $rows['lastupdate'] ?></td>
						                  	</tr>
					                	<?php }}} ?>
					                	<tr>
					                	<!--
					                	<tr>
					                	<th colspan="5">
				              				<label class="no-margin-bot field-click-able">Trạng thái: Mở (<?php 
		                				$i = 0;
		                				if(count($ticket) >0)
					                	{
		                			foreach ($ticket as $value) {
		                				if($value['status'] == '1' && $value['hidden'] == '0')
		                				{
		                					$i++;
		                				}
		                			}
		                				}
		                				echo $i;
		                			 ?>)</label>
				              			</th>
				              			</tr>
					                	<?php 
					                	if(count($ticket) >0)
					                	{
					                	foreach ($ticket as $rows) {
					                		if($rows['status'] == '1' && $rows['hidden'] =='0')
					                		{
					                	 ?>
						                  	<tr class="border-bot-1">
							                    <td width="100">
							                    	<a href="<?php echo base_url().'ticket/detail/'.$rows['ticketid'] ?>">
							                    	<span class="id-label span-danger">O</span>  #<?php echo $rows['ticketid'] ?></a>
							                    </td>
							                    <td>
							                    	<?php echo $rows['title'] ?>
							                    </td>
							                    <td><?php echo $rows['createat'] ?></td>
							                    <td><?php echo $rows['agentcreated'] ?></td>
							                    <td><?php echo $rows['lastupdate'] ?></td>
						                  	</tr>
					                	<?php }}} ?>
					                	<tr>
					                	<th colspan="5">
					                		 <label class="no-margin-bot field-click-able">Trạng thái: Chờ (<?php 
		                				$i = 0;
		                				if(count($ticket) >0)
					                	{
		                			foreach ($ticket as $value) {
		                				if($value['status'] == '2' && $value['hidden'] == '0')
		                				{
		                					$i++;
		                				}
		                			}
		                				}
		                				echo $i;
		                			 ?>)</label>
					                	</th>
					                	</tr>
					                  	<?php 
					                	if(count($ticket) >0)
					                	{
					                	foreach ($ticket as $rows) {
					                		if($rows['status'] == '2' && $rows['hidden'] =='0')
					                		{
					                	 ?>
						                  	<tr class="border-bot-1">
							                    <td width="100">
							                    	<a href="<?php echo base_url().'ticket/detail/'.$rows['ticketid'] ?>">
							                    	<span class="id-label span-warning">P</span>  #<?php echo $rows['ticketid'] ?></a>
							                    </td>
							                    <td>
							                    	<?php echo $rows['title'] ?>
							                    </td>
							                    <td><?php echo $rows['createat'] ?></td>
							                    <td><?php echo $rows['agentcreated'] ?></td>
							                    <td><?php echo $rows['lastupdate'] ?></td>
						                  	</tr>
					                	<?php }}} ?>
					                -->
					                	<!--
					                	<tr>
					                	<th colspan="5">
					                		 <label class="no-margin-bot field-click-able">Trạng thái: Đóng (<?php 
		                				$i = 0;
		                				if(count($ticket) >0)
					                	{
		                			foreach ($ticket as $value) {
		                				if($value['status'] == '3' && $value['hidden'] == '0')
		                				{
		                					$i++;
		                				}
		                			}}
		                				echo $i;
		                			 ?>)</label>
					                	</th>
					                	</tr>
					                	<?php 
					                	if(count($ticket) >0)
					                	{
					                	foreach ($ticket as $rows) {
					                		if($rows['status'] == '3' && $rows['hidden'] =='0')
					                		{
					                	 ?>
						                  	<tr class="border-bot-1">
							                    <td width="100">
							                    	<a href="<?php echo base_url().'ticket/detail/'.$rows['ticketid'] ?>">
							                    	<span class="id-label span-info">i</span>  #<?php echo $rows['ticketid'] ?></a>
							                    </td>
							                    <td>
							                    	<?php echo $rows['title'] ?>
							                    </td>
							                    <td><?php echo $rows['createat'] ?></td>
							                    <td><?php echo $rows['agentcreated'] ?></td>
							                    <td><?php echo $rows['lastupdate'] ?></td>
						                  	</tr>
					                	<?php }}} ?>
										-->
					                </tbody>
				              	</table>
				            </div>
				            <!--
				            <div class="col-sm-offset-3 col-md-6 info-area row">
				            	<label class="title-info col-md-10 float-left margin-top-10 no-padding-left">
			              			<span class="label-info span-success">SOLVED</span>  
			              		#Ticket ID</label>
				            	<label class="control-label col-md-10 float-left no-padding-left margin-top-5">Aliquet quis aliquet nec, malesuada</label>
				            	<label class="control-label col-md-10 float-left no-padding-left margin-top-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin enim risus, aliquet quis aliquet nec, malesuada ac odio. Nullam hendrerit porta mi quis imperdiet.</label>
				            	<label class="title-info col-md-10 float-left margin-top-10 no-padding-left">Cập nhật cuối cùng</label>
				            	<div class="col-md-12 margin-top-10">
				              		<label class="control-label col-md-6 no-padding-left float-left">Tickets Subjects</label>
				              		<label class="title-info col-md-6 text-align-right no-padding-left">Last Update Date/Time</label>
				            	</div>
				            	<label class="control-label col-md-11 float-left no-padding-left margin-top-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin enim risus, aliquet quis aliquet nec, malesuada ac odio. Nullam hendrerit porta mi quis imperdiet.</label>
				            </div>
				        -->
		                </div>
		                <div class="tab-pane fade" id="tab-content-3">
		                  <p>Phiếu liên quan.</p>
		                </div>
		                <div  class="tab-pane fade active show" id="tab-content-1">
				              	<table class="table table-striped table-bordered" cellspacing="0" id="table-1-contract">
				              		<thead>
								    <tr>
								        <th>Mã GD</th>
			              				<th>Tình trạng</th>
			              				<th>Mã căn hộ</th>
			              				<th>Ngày bắt đầu</th>
			              				<th>Ngày hiệu lực</th>
				              			<th>Ghi chú</th>
			              				<!-- <th>Cập nhật lần cuối</th>
				              			<th>Email</th>
			              				<th>Địa chỉ</th>
			              				<th>Note</th> -->
								    </tr>
									</thead>
									<tbody>
										<?php 
										if(count($trade) >0)
										{
										foreach ($trade as $rows) { ?>
									    <tr>
									    	
									        <td><a class="buttonnewiframe" href="#" alt="<?php echo base_url().'user/contract/'.$rows['contractid'] ?>" title="<?php echo $rows['contractid'] ?>"><?php echo $rows['contractid'] ?></a>
						                    </td>
						                    <td>
						                    	<?php echo $rows['status'] ?>
						                    </td>
						                    <td><?php echo $rows['property'] ?></td>
			              					<!-- <td><a href="<?php echo base_url().'user/contract/'.$rows['contractid'] ?>">Chi tiết </a></td> -->
						                    <td><?php 
						                    if($rows['startdate'] != null)
						                    {
						                    echo date("d/m/Y", strtotime($rows['startdate']));
						                    } ?></td>
						                    <td><?php 
						                    if($rows['effectivedate'] != null)
						                    {
						                    echo date("d/m/Y", strtotime($rows['effectivedate']));
						                    } ?></td>
						                    <td><?php 

						                    echo $rows['notes'] ?></td>
									    </tr>
									<?php }} ?>
									</tbody>
				              	</table>
		                </div>
	              	</div>
	            </div>
          	</div>