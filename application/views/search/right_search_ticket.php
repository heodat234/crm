<div class="col-md-100 no-padding padding-left-5">
	    	<div class="tile height-1024">
	            <div class="table-responsive">
	              	<table class="table" id="table-1">
	              		<thead class="no-border-top">
	              			<tr>
	              				<th>ID</th>
	              				<th>Tên phiếu</th>
	              				<th>Người yêu cầu</th>
	              				<th>Mức độ ưu tiên</th>
	              				<th>Ngày tạo</th>
	              				<th>Cập nhật lần cuối</th>
	              			</tr>
	              		</thead>
		                <tbody>
		                	<!--
		                  	<tr>
		                		<td colspan="5">
		                			<label class="no-margin-bot field-click-able">Trạng thái: Chờ (1)</label>
		                		</td>
		                	</tr>
		                -->
		                	<?php 
		                	if(count($result['data']) >0&& $result['code']==1)
		                	{
		                	foreach ($result['data'] as $rows) { 
		                			if($rows['status']==$status||$status==-1){
		                		?>
		                	<tr class="border-bot-1">
			                    <td width="100">
			                    	<a class="buttonsearchiframe" alt="<?php echo base_url().'ticket/detail/'.$rows['ticketid'] ?>" href="#" title="#<?php echo $rows['ticketid'] ?>">
			                    	<span class="id-label span-warning">P</span>  #<?php echo $rows['ticketid'] ?>
			                    	</a>
			                    </td>
			                    <td width="250">
			                    	<?php echo $rows['title'] ?>
			                    </td>
			                    <td><?php if(isset($rows['agentcreated'])){ echo $rows['agentcreated'];} ?></td>
			                    <td><?php echo $rows['priority'] ?></td>
			                    <td><?php 
			                    if($rows['createat']!=null)
			                    {
			                    echo date("d/m/Y", strtotime($rows['createat']));}?></td>
			                    <td><?php 
			                    if($rows['lastupdate']!=null)
			                    {
			                    	echo date("d/m/Y", strtotime($rows['lastupdate']));} ?></td>
			                    <!-- <td><a class="buttonsearchiframe" alt="<?php echo base_url().'ticket/detail/'.$rows['ticketid'] ?>" href="#" title="<?php echo $rows['title'] ?>">Chi tiết</a></td> -->
		                  	</tr>	
		                	<?php }}} ?>				  
		                </tbody>
	              	</table>
	            </div>  
	        </div>
	    </div>