			<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-right-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Người yêu cầu</label>
	              		<label class="control-label col-md-8 no-padding-right">
	              			<input list="suggestionList" id="answerInput" placeholder="Người yêu cầu" class="col-md-12 no-padding font-size-12">
							<datalist id="suggestionList">
								<?php
		              				foreach ($listuser as $user) {
		              					if($user['roleid']==3){
		              					?>
		              					<option data-value="<?php echo $user['custid']?>"><?php echo $user['custname']?></option>
		              					<?php
		              					}
		              				}
		              			?>
							</datalist>
							<input type="hidden" id="customer_request">
							<script type="text/javascript">
								document.querySelector('#answerInput').addEventListener('input', function(e) {
								    var input = e.target,
								        list = input.getAttribute('list'),
								        options = document.querySelectorAll('#' + list + ' option'),
								        hiddenInput = document.getElementById('customer_request'),
								        inputValue = input.value;

								    hiddenInput.value = inputValue;

								    for(var i = 0; i < options.length; i++) {
								        var option = options[i];

								        if(option.innerText === inputValue) {
								            hiddenInput.value = option.getAttribute('data-value');
								            break;
								        }else{
								        	hiddenInput.value="";
								        }
								    }
								});
							</script>
		              	</label>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Phụ trách</label>
	              		<label class="control-label col-md-8 no-padding-right">
	              			<input list="suggestionListAgent" id="agentInput" placeholder="Người phụ trách" class="col-md-12 no-padding font-size-12">
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
							<input type="hidden" id="agentcurrent">
							<script type="text/javascript">
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
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" placeholder="-">
		              	</label>
	              		
	            	</div>
	            -->
	            </div>
          	</div>
          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-right-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Nguồn phiếu</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<select id="nguonphieu" class="col-md-12 no-padding font-size-12">
		              			<option value="0">Trực Tiếp</option>
		              			<option value="1">Điện Thoại</option>
		              		</select>
		              	</label>
	              		
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Mức Ưu tiên</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<select id="priority" class="col-md-12 no-padding font-size-12">
		              			<option value="0">Thấp</option>
		              			<option value="1">Thường</option>
		              			<option value="2">Cao</option>
		              			<option value="3">Khẩn cấp</option>
		              		</select>
		              	</label>
	              		
	            	</div>
	            	<!--
		            	<div class="">
		            		<label class="control-label user-label col-md-3 no-padding">Tình trạng</label>
		              		<label class="control-label col-md-8 no-padding-right">
			              		<select id="status" class="col-md-12 no-padding font-size-12">
			              			<option value="0">Phiếu chưa xử lý</option>
			              			<option value="1">Phiếu đang xử lý</option>
			              		</select>
			              	</label>
		              		
		            	</div>
		            -->
	            </div>
          	</div>
          	
          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-right-10">
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Phân loại</label>
	              		<label class="control-label col-md-8 no-padding-right">
	              			<select id="status" class="col-md-12 no-padding font-size-12" id="type">
	              				<option value="0">Khác</option>
		              			<option value="1">Chuyển nhượng hợp đồng</option>
		              			<option value="2">Vay</option>
		              		</select>
		              	</label>
	              		
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Giai đoạn</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<select id="status" class="col-md-12 no-padding font-size-12" id="levelticket">
	              				<option value="0">A.Nhận phiếu</option>
		              			<option value="1">B.Đang hỗ trợ</option>
		              			<option value="2">C.Nhờ hỗ trợ</option>
		              		</select>
		              	</label>
	              		
	            	</div>
	            	<div class="break-line margin-bot-5"></div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Thời hạn SLA</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" placeholder="-" type="datetime-local" id="sla">
		              	</label>
	              		
	            	</div>
	            	<div class="break-line margin-bot-5"></div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Ngày hẹn</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" placeholder="-" type="datetime-local" id="duedate">
		              	</label>
	              		
	            	</div>
	            	<!--
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Đếm ngược</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" placeholder="-">
		              	</label>
	            	</div>

	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding col-brk-3 margin-left--5">Ngày hoàn thành</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" placeholder="-">
		              	</label>
	              		
	            	</div>
	            	-->
	            </div>
          	</div>
          	<!--
          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-right-10">
	              	<div class="row">
	            		<label class="control-label user-label col-md-3 no-padding">Tags</label>
	              		<label class="control-label col-md-8 no-padding-right">
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
		              		<input class="col-md-12 no-padding font-size-12" placeholder="Bất động sãn liên quan" id="bds">
		              	</label>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Dự án</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" placeholder="Dự án liên quan" id="duan">
		              	</label>
	              		
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Giao dịch</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" placeholder="Giao dịch liên quan" id="giaodich" />
		              	</label>
	              		
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Đợt</label>
	              		<label class="control-label col-md-8 no-padding-right">
		              		<input class="col-md-12 no-padding font-size-12" placeholder="Đợt giao dịch liên quan" id="dot">
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
    <div class="content-title user-history user-support">
    	<p>Hỗ trợ cho phiếu:</p>
    	<div class="div margin-left-10">
          	<img class="user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
          	<img class="user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
          	<img class="user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
          	<img class="user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        </div>
    </div>
-->

    