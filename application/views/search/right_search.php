<div class="col-md-100 no-padding padding-left-5">
	    	<div class="tile height-1024">
	            <div class="table-responsive">
	              	<table class="table" id="table-1">
	              		<thead class="no-border-top">
	              			<tr>
	              				<th>Tên</th>
	              				<th>Số điện thoại</th>
	              				<th>Email</th>
	              				<th>Số CMND</th>
	              				<th>Cập nhật lần cuối</th>
	              			</tr>
	              		</thead>
		                <tbody>
		                	<?php 
		                	if(count($result['data']) >0)
		                	{
		                	foreach ($result['data'] as $rows) { ?>
		                	<tr class="border-bot-1">
			                    <td width="250">
			                    	<a class="buttonsearchiframe" alt="<?php echo base_url().'user/detail/?cusid='.$rows['custid'].'&idcard='.$rows['idcard'].'&roleid='.$rows['roleid'] ?>" href="#" title="<?php echo $rows['custname'] ?>">
			                    	<?php echo strtoupper(mb_convert_case($rows['custname'],MB_CASE_UPPER,'UTF-8')) ?>
			                    	</a>
			                    </td>
			                    <td><?php echo $rows['telephone'] ?></td>
			                    <td><?php echo $rows['email'] ?></td>
			                    <td><?php echo $rows['idcard'] ?></td>
			                    <td><?php 
			                    if($rows['lastupdate']!=null)
			                    {
			                    echo date("d/m/Y", strtotime($rows['lastupdate']));}
			                     ?></td>
			                    <!-- <td><a class="buttonsearchiframe" alt="<?php echo base_url().'user/detail/'.$rows['custid'] ?>" href="#" title="<?php echo $rows['custname'] ?>">Chi tiết</a></td> -->
		                  	</tr>	
		                	<?php }} ?>				  
		                </tbody>
	              	</table>
	            </div>  
	        </div>
	    </div>