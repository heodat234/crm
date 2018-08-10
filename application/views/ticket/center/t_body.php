<?php $ticketid = $this->uri->segment(3) ?>
<div class="tile no-margin-bot">
        <div class="content-title">
	        <div class="div">
	          	<h5><i class="fa fa-lg fa-file-alt header-icon"></i><?php echo $ticket['data'][0]['title'] ?> #<?php echo $this->uri->segment(3) ?></h5>
	          	<p class="header-desc field-click-able"><?php echo $ticket['data'][0]['agentcreated'] ?></p>
	        </div>
	        <!--
	        <button class="btn btn-primary header-btn" type="button">Tiếp nhận</button>
	        <button class="btn btn-blank header-btn" type="button">Từ chối</button>
	    -->
	        <?php 
	        if($finish){
	        	?>
	        		<!--<button class="btn btn-danger header-btn" id="finish_btn" ticketid=<?php echo $ticketid?> type="button">Hoàn Thành</button>-->
	        	<?php
	        }
	        ?>
	        <!--<button class="btn btn-blank header-btn btn-caret" type="button"><i class="fa fa-caret-down fa-md float-right margin-top-3"></i></button>-->
	    </div>
	    <div class="break-line margin-bot-5"></div>
	    <div class="row">
	    	<div class="col-md-12 comment-wrap">
				<div class="photo">
					<div class="avatar" style="background-image: url('<?php $var = $this->session->userdata;
                    if($var['avatar'] != 'null')
                    {
                    echo $custid = $var['avatar'];
                    }
                    else{ echo 'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg';} ?>')"></div>
				</div>
				<div class="comment-block">
						<form method="post" enctype= multipart/form-data action="<?php echo base_url().'ticket/insertTicketLog' ?>">
					
					<!--<ul class="nav nav-tabs no-margin-left">
		                <li class="nav-item active show">
		                	<a class="user-tab active show" data-toggle="tab" href="#tab-content-1">Tất cả</a>
		                </li>
		                <li class="nav-item">
		                	<a class="user-tab" data-toggle="tab" href="#tab-content-2">Nội bộ</a>
		                </li>
		                <select>
							<option>Áp dụng mẫu</option>
							<option>Không áp dụng</option>
						</select>
	              	</ul>
	              -->
					<div class="status-upload">
							<input type="hidden" name="ticketid" value="<?php echo $this->uri->segment(3) ?>">
							<!--
							<ul>
								<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
								<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video"></i></a></li>
								<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
								<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-image"></i></a></li>
							</ul>
						-->
							<!-- <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button> -->
							<input type="hidden" id="changelog">
							<textarea name="action" id="action" placeholder="Nhập ghi chú" ></textarea>
					</div><!-- Status Upload  -->
					<button type="button" title="<?php echo $ticketid ?>" class="btn btn-gray float-right <?php if($update){ echo "btn-updateAction"; }else{ echo "btn-updateActionUpdate";}  ?>"><i class="fa fa-share"></i> Ghi nhận
						<!-- <select>
							<option>Đang xử lý</option>
							<option>Chưa xử lý</option>
						</select> -->
					
					</button>
						</form>
				</div>
			</div>
		</div>
  	</div>
<div class="comments">
	<p>Lịch sử phiếu</p>
	
	<!-- <div>
		<div class="comment-wrap">
			<div class="photo">
				<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg')"></div>
			</div>
			<div class="comment-block">
				<p class="comment-text">Mai Nguyễn</p>
				<p class="comment-text">tiếp nhận phiếu</p>
			</div>
		</div>
		<ul class="app-breadcrumb breadcrumb react-comment">
    		<p class="margin-right-30">Thứ Ba, 06/06/2018, 10:06:14</p>
	        <li class="breadcrumb-item"><a href="#">Phản hồi</a></li>
	        <li class="breadcrumb-item"><a href="#">Tạo công việc</a></li>
        </ul>

        <div class="reply-comment">
			<div class="comment-wrap">
				<div class="photo">
					<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg')"></div>
				</div>
				<div class="comment-block">
					<p class="comment-text">Mai Nguyễn</p>
					<p class="comment-text">Tạo một công việc: <span>Lập bảng tính thanh lý gửi PKD</span></p>
					<p class="comment-text">Thực hiện bởi: <a href="#">Mai Nguyễn</a> + <a href="#">Thúy Nguyễn</a></p>
					<p class="comment-text">Thời hạn: 17:35 - 08/06/2018 - Nhắc nhở: 1 giờ trước khi tới hạn</p>
				</div>
			</div>
			<ul class="app-breadcrumb breadcrumb react-comment">
	    		<p class="margin-right-30">Thứ Ba, 06/06/2018, 10:06:14</p> -->
		        <!-- <li class="breadcrumb-item"><a href="#">Phản hồi</a></li>
		        <li class="breadcrumb-item"><a href="#">Tạo công việc</a></li> -->
	        <!-- </ul>
	    </div>
    </div> -->

    <?php 
    if(count($listticketlog) >0)
    {
    foreach ($listticketlog as $rows) {
     ?>
	<div>
		<div class="comment-wrap">
			<div class="photo">
				<div class="avatar" style="background-image: url('<?php echo 'http://crm.tavicosoft.com/api/avatar/'.$rows['useraction'] ?>')"></div>
			</div>
			<div class="comment-block">
				<p class="comment-text"><?php echo $rows['custname'] ?></p>
				<p class="comment-text"><?php echo $rows['action']?></p>
				<p class="comment-text"><?php echo $rows['cmt']?></p>
				<?php 
					if(strlen($rows['srcrecord'])>5){
						?>
						<audio controls>
						  <source src="<?php echo $rows['srcrecord'] ?>" type="audio/ogg">
						  Your browser does not support the audio tag.
						</audio>
						<?php
					}
				?>
				
				<div class="bottom-comment">
					<div class="comment-date"><?php echo $rows['changelog']?></div>

					<!-- <ul class="comment-actions">
						<li class="complain">Complain</li>
						<li class="reply">Reply</li>
					</ul> -->
				</div>
			</div>
		</div>
		<ul class="app-breadcrumb breadcrumb react-comment">
    		<p class="margin-right-30"><?php echo $rows['createdat'] ?></p>
	        <!--<li class="breadcrumb-item"><a href="#">Phản hồi</a></li>
	        <li class="breadcrumb-item"><a href="#">Tạo công việc</a></li>-->
        </ul>
    </div>
    <?php }} ?>
</div>

<!-- <div class="comments">
	<div class="comment-wrap">
		<div class="photo">
			<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg')"></div>
		</div>
		<div class="comment-block">
			<form action="">
				<textarea name="" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
			</form>
		</div>
	</div>

	<div class="comment-wrap">
		<div class="photo">
			<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg')"></div>
		</div>
			<div class="comment-block">
				<p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto temporibus iste nostrum dolorem natus recusandae incidunt voluptatum. Eligendi voluptatum ducimus architecto tempore, quaerat explicabo veniam fuga corporis totam reprehenderit quasi
						sapiente modi tempora at perspiciatis mollitia, dolores voluptate. Cumque, corrupti?</p>
				<div class="bottom-comment">
					<div class="comment-date">Aug 24, 2014 @ 2:35 PM</div>
					<ul class="comment-actions">
						<li class="complain">Complain</li>
						<li class="reply">Reply</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="comment-wrap">
			<div class="photo">
				<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/felipenogs/128.jpg')"></div>
			</div>
			<div class="comment-block">
				<p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto temporibus iste nostrum dolorem natus recusandae incidunt voluptatum. Eligendi voluptatum ducimus architecto tempore, quaerat explicabo veniam fuga corporis totam.</p>
				<div class="bottom-comment">
					<div class="comment-date">Aug 23, 2014 @ 10:32 AM</div>
					<ul class="comment-actions">
						<li class="complain">Complain</li>
						<li class="reply">Reply</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div> -->