<main class="app-content padding-5 no-padding-right">
    <div class="row">
        <div class="col-md-2 col-md-22 no-padding padding-left-15">
          	<div class="tile p-0 padding-5 margin-bot-5 height-1024">
	            <div class="tile-body padding-left-right-10">
	            	<ul class="nav nav-tabs no-margin-left">
		                <li class="nav-item">
		                	<a class="user-tab active show" data-toggle="tab" href="#tab-content-1">Người dùng</a>
		                </li>
		                <?php 
		                $var = $this->session->userdata;
		                if ($var['roleid'] != '1') { ?>
		                <li class="nav-item">
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-2">Phiếu</a>
		                </li>
		            	<?php } ?>
	              	</ul>
	              	<div class="tab-content" id="myTabContent">
	              		<div id="tab-content-1" class="tab-pane fade active show">
	              			<div>
			              		<input class="form-control margin-top-10 margin-bot-5" type="text" id="search" name="search" placeholder="Nhập bất kỳ nội dung để tìm kiếm">
			              		<p class="font-size-8 field-click-able">Tìm theo bộ lọc</p>
			              	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Tên</label>
			              		<label class="control-label col-md-8 no-padding-right">
			              			<input class="col-md-12 no-padding font-size-12" id="custname" placeholder="-">
			              		</label>
			            	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">CMND</label>
			              		<label class="control-label col-md-8 no-padding-right"><input class="col-md-12 no-padding font-size-12" id="custid" placeholder="-"></label>
			            	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Điện thoại</label>
			              		<label class="control-label col-md-8 no-padding-right"><input class="col-md-12 no-padding font-size-12" id="telephone" placeholder="-"></label>
			            	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Email</label>
			              		<label class="control-label col-md-8 no-padding-right"><input class="col-md-12 no-padding font-size-12" id="email" placeholder ="-"></label></label>
			            	</div>
			            	<div class="break-line margin-bot-5"></div>
			            	
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Mã căn hộ:</label>
			              		<label class="control-label col-md-8 no-padding-right"><input class="col-md-12 no-padding font-size-12" id="mapping1" placeholder ="-"></label></label>
			            	</div>
			            	<div class="">
			            		<label class="control-label col-md-8 no-padding-right"></label>
			            		<label class="control-label col-md-8 no-padding-right"></label>
			            		<button id="search_customer" class="btn btn-primary float-right" type="button">Tìm kiếm</button>
			            		<label class="control-label col-md-8 no-padding-right"></label>
			            	</div>

			            	<div class="break-line margin-bot-5"></div>
			            	<!--
				            	<div>
				              		<p class="font-size-8 field-click-able">Tìm theo Tag</p>
				              		<ul class="tags no-margin-bot">
								        <li class="addedTag">
								        	VIP
								        </li>
								        <li class="addedTag">
								        	Contract
								        </li>
								        <li class="addedTag">
								        	User
								        </li>
								        <li class="addedTag">
								        	login
								        </li>
									</ul>
				              	</div>
				              -->
	              		</div>
		              	<div id="tab-content-2" class="tab-pane fade">
			              	<div>
			              		<input class="form-control margin-top-10 margin-bot-5" type="text" name="searchticket" id="searchticket" placeholder="Nhập bất kỳ nội dung để tìm kiếm">
			              		<p class="font-size-8 field-click-able">Tìm theo bộ lọc</p>
			              	</div>
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
									<input type="hidden" id="agentcreated">
									<script type="text/javascript">
										document.querySelector('#answerInput').addEventListener('input', function(e) {
										    var input = e.target,
										        list = input.getAttribute('list'),
										        options = document.querySelectorAll('#' + list + ' option'),
										        hiddenInput = document.getElementById('agentcreated'),
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
			            	<div class="break-line margin-bot-5"></div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Nguồn phiếu</label>
			              		<select class="control-label col-md-8 no-padding-right">
			              			<option>Trực tiếp</option>
			              			<option>Điện thoại</option>
			              		</select>
			            	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Mức ưu tiên</label>
			              		<select class="control-label col-md-8 no-padding-right" id="priority" name="priority">
			              			<option value="0">Thấp</option>
			              			<option value="1">Thường</option>
			              			<option value="2">Cao</option>
			              			<option value="3">Khẩn cấp</option>
			              		</select>
			            	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Tình trạng</label>
			              		<select class="control-label col-md-8 no-padding-right" id="status" name="status">
			              			<option value="0">Đang xử lý</option>
	              					<option value="4">Hoàn thành</option>
			              		</select>
			            	</div>
			            	<!--
			            	<div class="break-line margin-bot-5"></div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Phân loại</label>
			              		<select class="control-label col-md-8 no-padding-right">
			              			<option>abcd</option>
			              			<option>cdf</option>
			              		</select>
			              		<i class="fa fa-caret-down fa-md float-right margin-top-3"></i>
			            	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Giai đoạn</label>
			              		<select class="control-label col-md-8 no-padding-right">
			              			<option>abcd</option>
			              			<option>cdf</option>
			              		</select>
			              		<i class="fa fa-caret-down fa-md float-right margin-top-3"></i>
			            	</div>
			            	<div class="break-line margin-bot-5"></div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Từ ngày</label>
			              		<select class="control-label col-md-8 no-padding-right">
			              			<option>abcd</option>
			              			<option>cdf</option>
			              		</select>
			              		<i class="fa fa-caret-down fa-md float-right margin-top-3"></i>
			            	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Đến ngày</label>
			              		<select class="control-label col-md-8 no-padding-right">
			              			<option>abcd</option>
			              			<option>cdf</option>
			              		</select>
			              		<i class="fa fa-caret-down fa-md float-right margin-top-3"></i>
			            	</div>
			            	<div class="break-line margin-bot-5"></div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">BĐS</label>
			              		<select class="control-label col-md-8 no-padding-right">
			              			<option>abcd</option>
			              			<option>cdf</option>
			              		</select>
			              		<i class="fa fa-caret-down fa-md float-right margin-top-3"></i>
			            	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Dự án</label>
			              		<select class="control-label col-md-8 no-padding-right">
			              			<option>abcd</option>
			              			<option>cdf</option>
			              		</select>
			              		<i class="fa fa-caret-down fa-md float-right margin-top-3"></i>
			            	</div>
			            	<div class="">
			            		<label class="control-label user-label col-md-3 no-padding">Giao dịch</label>
			              		<select class="control-label col-md-8 no-padding-right">
			              			<option>abcd</option>
			              			<option>cdf</option>
			              		</select>
			              		<i class="fa fa-caret-down fa-md float-right margin-top-3"></i>
			            	</div>
			            -->
			            	<div class="">
			            		<label class="control-label col-md-8 no-padding-right"></label>
			            		<label class="control-label col-md-8 no-padding-right"></label>
			            		<button id="search_ticket" class="btn btn-primary float-right" type="button">Tìm kiếm</button>
			            		<label class="control-label col-md-8 no-padding-right"></label>
			            	</div>
			            	<!--
			            	<div class="break-line margin-bot-5"></div>
			            	<div>
			              		<p class="font-size-8 field-click-able">Tìm theo Tag</p>
			              		<ul class="tags no-margin-bot">
							        <li class="addedTag">
							        	VIP
							        </li>
							        <li class="addedTag">
							        	Contract
							        </li>
							        <li class="addedTag">
							        	User
							        </li>
							        <li class="addedTag">
							        	login
							        </li>
								</ul>
			              	</div>-->
			            </div>
			        </div>
	           	</div>
          	</div>       
	    </div>
        <iframe class="iframesearch" id="iframesearch" style="width: 78%;display: block; border: none;"  src=""></iframe>
    </div>
</main>