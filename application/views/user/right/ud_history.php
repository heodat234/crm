<div class="timeline">
				<?php 
				$array = array("gray","red","green","yellow");
				$i = 0;
				if(count($history)>0)
				{
				foreach ($history as $value) { 
					if($i >3)
					{
						$i=0;
					}
					?>
			  	<div class="entry">
				    <div class="title <?php echo $array[$i] ?>">
				      	<p class="time-detail"><?php 
				      	if($value['createat'] !=null)
				      	{
				      	echo date("G:i:s", strtotime($value['createat']));} ?></p>
				      	<p class="date-detail"><?php 
				      	if($value['createat'] !=null)
				      	{
				      		echo date("d/m/Y", strtotime($value['createat']));} ?></p>
				    </div>
				    <div class="body">
				      	<p class="margin-bot-3"><?php echo $value['action'] ?></p>
				        <p class="no-margin-bot"><?php $data = json_decode($value['dataaction'],true);
				        foreach ($data as $key => $value) {
				        	echo $key.": ".$value."<br />";
				        }
				         ?></p>
				    </div>
			  	</div>
			  	 <?php	$i++;}} ?>
			  	<!-- <div class="entry">
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
			  	</div> -->
			</div>