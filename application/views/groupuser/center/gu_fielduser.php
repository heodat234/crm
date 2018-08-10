<div class="tile height-1024">
	            <div class="content-title">
			        <div class="div">
			          <h5>Trường dữ liệu người dùng</h5>
			        </div>
			    </div>
			    <p class="margin-top-10 no-margin-bot">Trường dữ liệu người dùng cho phép định nghĩa các trường dữ liệu(fields) bổ sung các thông tin người dùng, các trường dữ liệu này chỉ có thể dùng cho mục đích phân tích PIVOT hoặc Báo cáo quản trị được thiết kế dành riêng cho, không áp dụng cho báo cáo, bảng điều khiển (dashboard) và đồ thị mặc định của hệ thống.</p>
			    <div class="row" style="margin-top: 50px;">
			    	<div class="col-md-5">
			    		<span><b>Trường dữ liệu hiện tại (<?php echo count($list_ext) ?>)</b></span>
			    	</div>
			    	<div class="col-md-7">
						    <div style="float: right;">
								<button type="button" class="fc-agendaWeek-button fc-button fc-state-default fc-state-active fc-corner-right">Thêm</button>
							</div>
			    	</div>
			    </div>
			    
				<div class="bs-component margin-top-10">
					<?php 
					if(count($list_ext) >0)
					{
					foreach ($list_ext as $value) { ?>
					<a style="cursor: pointer;" class="user-name" onclick="createTab('<?php echo base_url()?>groupuser/fielddetail/','<?php echo $value['fieldname'] ?>')">
					<div class="component-fields">
						<?php if($value['fieldtype'] == 'T')
				                    {
				                    	$icon = 'fas fa-font';
				                    }
				                    else{
				                    	$icon = 'far fa-caret-square-down';
				                    }
				                     ?>
				                    <i class="<?php echo $icon ?>"></i> 
				                    <span class="title_tab" style="padding-left: 6px"><?php echo $value['fieldname'] ?></span>
					</div>
					</a>
					<?php }} ?>
	            </div>
          	</div>