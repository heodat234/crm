
<div class="tile no-margin-bot">
        <div class="content-title">
	        <div class="div">
	          	<h5><i class="fa fa-lg fa-file-alt header-icon"></i>
	          		<input style="margin-left: 25px; margin-top: -9px;
	          		" id="title" class="col-md-12 no-padding font-size-19" placeholder="Nhập tiêu đề phiếu hỗ trợ">
	          	</h5>
	        </div>
	        <!--<button class="btn btn-primary header-btn" type="button">Tiếp nhận</button>
	        <button class="btn btn-blank header-btn btn-caret" type="button"><i class="fa fa-caret-down fa-md float-right margin-top-3"></i></button>-->
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
					<!--
					<ul class="nav nav-tabs no-margin-left">
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
							<textarea id="action" name="action" placeholder="Để lại thông tin ghi chú cho phiếu" ></textarea>
					</div><!-- Status Upload  -->
					<button type="submit" class="btn btn-gray float-right btn-insertTicket"><i class="fa fa-share"></i> Ghi nhận
						<!-- <select>
							<option>Đang xử lý</option>
							<option>Chưa xử lý</option>
						</select> -->
					
					</button>
				</div>
			</div>
		</div>
  	</div>