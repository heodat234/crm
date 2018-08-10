<main class="app-content padding-5 no-padding-right">
    <div class="row">
        <div class="col-md-2 col-md-22 no-padding padding-left-15">
          	<div class="tile p-0 padding-5 margin-bot-5">
	            <div class="tile-body padding-left-10" id="search_area">
	            	<div>
	              		<input class="form-control margin-top-10 margin-bot-5" type="text" name="s_text" placeholder="Tìm kiếm bài viết">
	              		<p class="font-size-8 field-click-able">Tìm theo bộ lọc</p>
	              	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Nhóm</label>
	              		<select name="s_group" class="control-label col-md-8 no-border no-padding margin-left-10">
	              			<option value="" selected="">Tất cả</option>
	              			<?php if (isset($l_group) && !empty($l_group)) {
	              				foreach ($l_group as $key => $value) {
	              					echo '<option value="'.$value['code'].'">'.$value['name'].'</option>';
	              				}
	              			} ?>
	              		</select>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Danh mục</label>
	              		<select name="s_cate" class="control-label col-md-8 no-border no-padding margin-left-10">
	              			<option value="" selected="">Tất cả</option>
	              			<?php if (isset($l_cate) && !empty($l_cate)) {
	              				foreach ($l_cate as $key => $value) {
	              					echo '<option value="'.$value['code'].'">'.$value['name'].'</option>';
	              				}
	              			} ?>
	              		</select>
	            	</div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Phân loại</label>
	              		<select name="s_type" class="control-label col-md-8 no-border no-padding margin-left-10">
	              			<option value="" selected="">Tất cả</option>
	              			<?php if (isset($l_type) && !empty($l_type)) {
	              				foreach ($l_type as $key => $value) {
	              					echo '<option value="'.$value['code'].'">'.$value['name'].'</option>';
	              				}
	              			} ?>
	              		</select>
	            	</div>
	            	<div class="break-line margin-bot-5"></div>
	            	<div class="">
	            		<label class="control-label user-label col-md-3 no-padding">Đăng bởi</label>
	              		<select name="s_createby" class="control-label col-md-8 no-border no-padding margin-left-10">
	              			<option value="" selected="">Tất cả</option>
	              			<?php if (isset($agent) && !empty($agent)) {
	              				foreach ($agent as $key => $value) {
	              					echo '<option value="'.$value['custid'].'">'.$value['custname'].'</option>';
	              				}
	              			} ?>
	              		</select>
	            	</div>
	            	<div class="">
	            		<label class="control-label col-md-8 no-padding-right"></label>
	            		<label class="control-label col-md-8 no-padding-right"></label>
	            		<button id="btn-search" class="btn btn-primary float-right" type="button">Tìm kiếm</button>
	            		<label class="control-label col-md-8 no-padding-right"></label>
	            	</div>
	           	</div>
          	</div>       
	    </div>
        <div class="col-md-6 col-md-78 no-padding padding-left-5">
          	<!-- <div class="tile height-1024">
          		<div class="offset-10 col-md-2 margin-bot-10">
          			<?php $link =  base_url().'knowledge/detail';
          					$title = 'Insert Knowledge';
          			?>
			    			<button onclick="addTab('<?php echo $link?>','<?php echo $title ?>')"  class="btn btn-primary float-right" id="ck-edit" type="button"> Thêm mới </button>
			    		</div>
	            <div class="table-responsive">
	              	<table class="table" id="table-1">
	              		<thead class="no-border-top">
	              			<tr>
	              				<th>Nhóm / Danh mục</th>
	              				<th>Phân loại</th>
	              				<th>Chủ đề</th>
	              				<th>Đăng bởi</th>
	              				<th>Ngày đăng</th>
	              				<th>Trạng thái</th>
	              			</tr>
	              		</thead>
		                <tbody>
		                	<?php foreach ($news as  $value) { ?>
		                		<tr class="border-bot-1">
			                    <td>
			                    	Chăm sóc KH
			                    </td>
			                    <td>
			                    	Thủ tục
			                    </td>
			                    <?php $linkUpdate=  base_url().'knowledge/detail/edit/'.$value['id'];
			                    	$titleUpdate = 'Update Knowledge '.$value['id']; ?>
			                    <td><a onclick="addTab('<?php echo $linkUpdate ?>','<?php echo $titleUpdate ?>')" href="#"><?php echo $value['title'] ?></a></td>
			                    <td>User</td>
			                    <td>dd/mm/yyyy</td>
			                    <td>Đang hoạt động</td>
		                  	</tr>
		                	<?php } ?>
		                </tbody>
	              	</table>
	            </div>
          	</div>    -->
          	<iframe class="iframesearch" id="iframesearch" src="http://crm.tavicosoft.com/knowledge/search/?search="></iframe>     
        </div>
    </div>
</main>