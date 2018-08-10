<?php $ticketid = $this->uri->segment(3) ?>
<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-right-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Người yêu cầu</label>
	              		<label class="control-label col-md-7 no-padding-right">
	              			<input readonly="true" id="agentcreated" class="col-md-12 no-padding font-size-12" placeholder="-" value="<?php echo $crequest['custname'] ?>">
	              		</label>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Phụ trách</label>
	              		<label class="control-label col-md-7 no-padding-right">
	              			<input list="suggestionListAgent" id="agentInput" placeholder="Người phụ trách" class="col-md-12 no-padding font-size-12" value="<?php echo $agentcurrent['custname'] ?>">
							<datalist id="suggestionListAgent">
								<?php
		              				foreach ($listuser as $user) {
		              					if($user['roleid']==2){
		              					?>
		              					<option data-value="<?php echo $user['custid']?>"><?php echo $user['custname']?></option>
		              					<?php
		              					}
		              				}
		              			?>
							</datalist>
							<input type="hidden" id="agentcurrent" value="<?php echo $agentcurrent['custid'] ?>">
							<script type="text/javascript">
  								var hasUpdate = false;
								document.querySelector('#agentInput').addEventListener('input', function(e) {
								    var input = e.target,
								        list = input.getAttribute('list'),
								        options = document.querySelectorAll('#' + list + ' option'),
								        hiddenInput = document.getElementById('agentcurrent'),
								        inputValue = input.value;

								    hiddenInput.value = inputValue;

								    for(var i = 0; i < options.length; i++) {
								        var option = options[i];

								        if(option.innerText === inputValue) {
								            hiddenInput.value = option.getAttribute('data-value');
								            var oldchange = $('#changelog').val();
										      oldchange += "Phụ trách : "+option.innerText+" | ";
										      $('#changelog').val(oldchange);
								            break;
								        }else{
								        	hiddenInput.value="";
								        }
								    }
								});
							</script>
	              		</label>
	            	</div>
	            	<!--
		            	<div class="">
		            		<label class="control-label user-label col-md-3 no-padding">CCs</label>
		              		<label class="control-label col-md-7 no-padding-right">-</label>
		              		 <a href="#" title="<?php echo $ticketid ?>" class="btn-updateTicket3"></a>
		            	</div>
		            -->
	            </div>
          	</div>
          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-right-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Nguồn phiếu</label>
	              		<select class="control-label col-md-7 no-border no-padding margin-left-10" id="ticketchannel">
	              			<option value="0" <?php if($ticketdetail['ticketchannel']==0){echo "selected";} ?>>Trực tiếp</option>
	              			<option value="1" <?php if($ticketdetail['ticketchannel']==1){echo "selected";} ?>>Điện thoại</option>
	              		</select>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Mức Ưu tiên</label>
	            		
	            		<select class="control-label col-md-7 no-border no-padding margin-left-10" id="priority">
	            			<option value="0" <?php if($ticketdetail['priority)']==0){echo "selected";} ?>>Thấp</option>
	              			<option value="1" <?php if($ticketdetail['priority)']==1){echo "selected";} ?>>Thường</option>
	              			<option value="2" <?php if($ticketdetail['priority)']==2){echo "selected";} ?>>Cao</option>
	              			<option value="3" <?php if($ticketdetail['priority)']==3){echo "selected";} ?>>Khẩn cấp</option>
	              		</select>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Tình trạng</label>
	            		<select class="control-label col-md-7 no-border no-padding margin-left-10" id="ticketstatus">
	            			<option value="0" <?php if($ticketdetail['status']==0){echo "selected";} ?>>Đang xử lý</option>
	              			<option value="4" <?php if($ticketdetail['status']==4){echo "selected";} ?>>Hoàn thành</option>
	              		</select>
	            	</div>
	            </div>
          	</div>
          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-right-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Phân loại</label>
	              		<label class="control-label col-md-7 no-padding-right">
	              			<select class="col-md-12 no-padding font-size-12" id="type">
	              				<option value="0" <?php if($ticket['data'][0]['type']==0){echo "selected";} ?> >Khác</option>
		              			<option value="1" <?php if($ticket['data'][0]['type']==1){echo "selected";} ?>>Chuyển nhượng hợp đồng</option>
		              			<option value="2" <?php if($ticket['data'][0]['type']==2){echo "selected";} ?>>Vay</option>
		              		</select>
	              		</label>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Giai đoạn</label>
	              		
	              		<label class="control-label col-md-7 no-padding-right">
	              			<select class="col-md-12 no-padding font-size-12" id="levelticket">
	              				<option value="0" <?php if($ticket['data'][0]['levelticket']==0){echo "selected";} ?>>A.Nhận phiếu</option>
		              			<option value="1" <?php if($ticket['data'][0]['levelticket']==1){echo "selected";} ?>>B.Đang hỗ trợ</option>
		              			<option value="2" <?php if($ticket['data'][0]['levelticket']==2){echo "selected";} ?>>C.Nhờ hỗ trợ</option>
		              		</select>
	              		</label>
	            	</div>
	            	<div class="break-line margin-bot-5"></div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Ngày yêu cầu</label>
	              		<label class="control-label col-md-7 no-padding-right">
	              		<input id="createat" class="col-md-12 no-padding font-size-12" placeholder="-" value="<?php 
	              		if($ticket['data'][0]['createat']!= null)
	              		{
	              		echo date("d/m/Y H:i:s", strtotime($ticket['data'][0]['createat']));
	              		} ?>">
	              		</label>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Thời hạn SLA</label>
	              		<label class="control-label col-md-8 no-padding-right">
	              			<input id="sla" class="col-md-12 no-padding font-size-12" type="datetime-local" placeholder="-" value="<?php 
	              		if($ticket['data'][0]['sla'] !=null)
	              		{
	              		echo date('Y-m-d\TH:i:s',strtotime($ticket['data'][0]['sla']));} ?>"></label>
	            	</div>
	            	<div class="break-line margin-bot-5"></div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Ngày hẹn</label>
	              		<label class="control-label col-md-8 no-padding-right">
	              			<input id="duedate" type="datetime-local" class="col-md-12 no-padding font-size-12" placeholder="-" value="<?php 
	              		if($ticket['data'][0]['duedate'] !=null)
	              		{
	              			echo date("Y-m-d\TH:i:s", strtotime($ticket['data'][0]['duedate']));} ?>"></label>
	              		 <a href="#" title="<?php echo $ticketid ?>" class="btn-updateTicket11"></a>
	            	</div>
	            	<!--
		            	<div class="">
		            		<label class="control-label user-label col-md-3 no-padding">Đếm ngược</label>
		              		<label class="control-label col-md-7 no-padding-right">5 ngày</label>
		            	</div>
		            -->
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding col-brk-3 margin-left--5">Ngày hoàn thành</label>
	              		<label class="control-label col-md-8 no-padding-right">
	              			<input type="datetime-local" id="finishdate" class="col-md-12 no-padding font-size-12" placeholder="-" value="<?php 
	              			if($ticket['data'][0]['finishdate'] !=null)
	              			{
	              			echo date("Y-m-d\TH:i:s", strtotime($ticket['data'][0]['finishdate']));} ?>">
	              		</label>
	            	</div>
	            </div>
          	</div>
          	<!--
          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-right-10">
	              	<div class="row">
	            		<label class="control-label user-label col-md-3 no-padding">Tags</label>
	              		<label class="control-label col-md-7 no-padding-right">
	              			<ul class="tags no-margin-bot">
						        <li class="addedTag">
						        	VIP
						        	<span class="tagRemove fa fa-times"></span>
						        </li>
							</ul>
	              		</label>
	            	</div>
	            </div>
          	</div>
          -->
          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-right-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">BĐS</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" value="<?php echo $extinfo['bds']?>" id="bds">
		              	</label>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Dự án</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" value="<?php echo $extinfo['duan']?>" id="duan">
		              	</label>
	              		
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Giao dịch</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" value="<?php echo $extinfo['gd']?>" id="giaodich" />
		              	</label>
	              		
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Đợt</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" value="<?php echo $extinfo['dot']?>" id="dot">
		              	</label>
	              		
	            	</div>
	            </div>
          	</div>
          	<!--
    <div class="content-title user-history user-customer">
    	<p>Khách hàng:</p>
    	<div class="div margin-left-10">
          	<img class="user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        </div>
    </div>
-->
	<div class="fc-corner-right">
  		<div class="fc-button-group" style="float:right">
  			<?php if($update){ ?>
			<!--<button type="submit" id="btn-update" ticketid="<?php echo $ticketid?>" class="fc-agendaWeek-button fc-button fc-state-default fc-state-active fc-corner-right btn-createuser">Lưu thông tin</button>-->
			<?php } ?>
		</div>
  	</div>
    <div class="content-title user-history user-support" style="bottom:inherit">
    	<p>Hỗ trợ cho phiếu:</p>
    	<input type="hidden" id="ticketusers" value="<?php echo $ticketdetail['ticketusers'];?>"/>
    	<div class="div margin-left-10">
    		<?php 
    		foreach ($userssuppot as $item_user) {
    			?>
    				<a class="buttonsearchiframe" alt="http://crm.tavicosoft.com/user/detail/?cusid=<?php echo $item_user['custid'] ?>" href="#" title="<?php echo $item_user['custname'] ?>"></a><img class="user-avatar" src="<?php echo $item_user['avatar']?>"  alt="User Image"></a>
    			<?php
    		}
    		?>
        </div>
    </div>