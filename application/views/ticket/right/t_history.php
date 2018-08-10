<div class="tile p-0 padding-5 margin-bot-5">
    <div class="content-title user-history">
        <div class="div">
          	<p><img class="user-avatar" src="<?php $var = $this->session->userdata;
                    if($var['avatar'] != 'null')
                    {
                    echo $custid = $var['avatar'];
                    }
                    else{ echo 'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg';} ?>" alt="User Image"><?php $var = $this->session->userdata;
                    if($var['custname'] != 'null')
                    {
                    echo $custid = $var['custname'];
                    }
                    else{ echo 'Undefined';} ?></p>
          	<p class="header-desc field-click-able">Ngày tạo: <?php 
            if(isset($ticket['data'][0]['createat']))
            {
            echo $ticket['data'][0]['createat'];
            }
             ?></p>
        </div>
    </div>
    <!--
    <div class="row col-xl-12">
    	<div class="col-md-3">
    		<span class="user-history-label span-danger">O</span>
    		<span>5</span>
    	</div>
    	<div class="col-md-3">
    		<span class="user-history-label span-warning">P</span>
    		<span>5</span>
    	</div>
    	<div class="col-md-3">
    		<span class="user-history-label span-success">S</span>
    		<span>5</span>
    	</div>
    	<div class="col-md-3">
    		<span class="user-history-label span-info">R</span>
    		<span>5</span>
    	</div>
    	<div class="col-md-3">
    		<span class="fa fa-phone user-history-icon span-default"></span>
    		<span>5</span>
    	</div>
    	<div class="col-md-3">
    		<span class="fa fa-comment user-history-icon span-default"></span>
    		<span>5</span>
    	</div>
    	<div class="col-md-3">
    		<span class="fa fa-file-alt user-history-icon span-default"></span>
    		<span>5</span>
    	</div>
    </div>
  -->
</div>
<!--
<div class="tile p-0 padding-5 margin-bot-5">
	<p>Phiếu gần nhất</p>
    <div class="table-responsive">
      	<table class="table" id="table-1">
            <tbody>
            	<tr>
                    <td width="100">
                    	<span class="id-label span-warning">P</span>  <a href="">#Ticket ID</a>
                    </td>
                    <td>Lập bảng tính thanh lý</td>
              	</tr>	
              	<tr>
                    <td width="100">
                    	<span class="id-label span-warning">P</span>  <a href="">#Ticket ID</a>
                    </td>
                    <td>Lập bảng tính thanh lý</td>
              	</tr>	
              	<tr>
                    <td width="100">
                    	<span class="id-label span-warning">P</span>  <a href="">#Ticket ID</a>
                    </td>
                    <td>Lập bảng tính thanh lý</td>
              	</tr>					  
            </tbody>
      	</table>
    </div>
</div>
<div class="tile p-0 padding-5 margin-bot-5">
	<p>Giao dịch gần nhất</p>
    <div class="table-responsive">
      	<table class="table" id="table-1">
            <tbody>
            	<tr>
                    <td width="100">
                    	<a href="">#Contract ID</a>
                    </td>
                    <td>Status</td>
                    <td>Lập bảng tính thanh lý</td>
              	</tr>	
              	<tr>
                    <td width="100">
                    	<a href="">#Contract ID</a>
                    </td>
                    <td>Status</td>
                    <td>Lập bảng tính thanh lý</td>
              	</tr>	
              	<tr>
                    <td width="100">
                    	<a href="">#Contract ID</a>
                    </td>
                    <td>Status</td>
                    <td>Lập bảng tính thanh lý</td>
              	</tr>			  
            </tbody>
      	</table>
    </div>
</div>
<div class="timeline">
  	<div class="entry">
	    <div class="title gray">
	      	<p class="time-detail">hh:mm:ss</p>
	      	<p class="date-detail">dd/mm/yyyy</p>
	    </div>
	    <div class="body">
	      	<p class="margin-bot-3">System - Hệ thống</p>
	        <p class="no-margin-bot">User History in only two line, User History only in two line. Thanks !!</p>
	    </div>
  	</div>
  	<div class="entry">
	    <div class="title red">
	      	<p class="time-detail">hh:mm:ss</p>
	      	<p class="date-detail">dd/mm/yyyy</p>
	    </div>
	    <div class="body">
	      	<p class="margin-bot-3">System - Hệ thống</p>
	        <p class="no-margin-bot">User History in only two line, User History only in two line. Thanks !!</p>
	    </div>
  	</div>
  	<div class="entry">
	    <div class="title green">
	      	<p class="time-detail">hh:mm:ss</p>
	      	<p class="date-detail">dd/mm/yyyy</p>
	    </div>
	    <div class="body">
	      	<p class="margin-bot-3">System - Hệ thống</p>
	        <p class="no-margin-bot">User History in only two line, User History only in two line. Thanks !!</p>
	    </div>
  	</div>
  	<div class="entry">
	    <div class="title yellow">
	      	<p class="time-detail">hh:mm:ss</p>
	      	<p class="date-detail">dd/mm/yyyy</p>
	    </div>
	    <div class="body">
	      	<p class="margin-bot-3">System - Hệ thống</p>
	        <p class="no-margin-bot">User History in only two line, User History only in two line. Thanks !!</p>
	    </div>
  	</div>
  	<div class="entry">
	    <div class="title yellow">
	      	<p class="time-detail">hh:mm:ss</p>
	      	<p class="date-detail">dd/mm/yyyy</p>
	    </div>
	    <div class="body">
	      	<p class="margin-bot-3">System - Hệ thống</p>
	        <p class="no-margin-bot">User History in only two line, User History only in two line. Thanks !!</p>
	    </div>
  	</div>
  	<div class="entry">
	    <div class="title yellow">
	      	<p class="time-detail">hh:mm:ss</p>
	      	<p class="date-detail">dd/mm/yyyy</p>
	    </div>
	    <div class="body">
	      	<p class="margin-bot-3">System - Hệ thống</p>
	        <p class="no-margin-bot">User History in only two line, User History only in two line. Thanks !!</p>
	    </div>
  	</div>
</div>
-->

<div class="tile p-0 padding-5 margin-bot-5 toggle-up">
   <p>Thư viện kiến thức
    <i class="fa fa-angle-double-up knl-caret"></i>
    </p>
    <div class="row margin-top-12">
        <div class="form-group col-md-9 no-padding-right">
          <input name="knl_text" class="form-control" type="text">
        </div>
        <div class="form-group col-md-3 align-self-end padding-left-1">
          <button class="btn btn-primary" id="search-knowledge" type="button">Tìm kiếm</button>
        </div>
    </div>
    <div id="knl_list" style="height: 120px; overflow-y: auto;">
    <?php 
    if(count($news)>0)
    {
      $i=0;
      foreach ($news as $value) { ?>

      <p><a style="cursor: pointer; color: #009688" onclick="showDetailKnowledge('<?php echo $value['id'] ?>')">#<?php echo $value['title'] ?></a></p>

      <?php if ($i==3) {
      break;
    }else{
      $i++;
    } } }?>
    </div>
    <!-- <p><a href="#">Tìm các phiếu tương tự</a></p> -->
    <div class="knl-content hide">
      <!-- Kham pha -->
      
    </div>
</div>