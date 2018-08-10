<?php

echo $_GET["act"];

if($_GET["act"]=="start"){
	exec('/var/www/crm.tavicosoft.com/start_server.sh');
}else if($_GET["act"]=="stop")
{
	exec('/var/www/crm.tavicosoft.com/stop_server.sh');	
}
