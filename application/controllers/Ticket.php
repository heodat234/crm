<?php
error_reporting(0);
ini_set('display_errors', 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model(array('M_api'));
        $var = $this->session->userdata;
        $groupid = $var['groupid'];
        $group = $this->M_api->getlistgroup_array($groupid);
        if($group['ticketrule']==0){
            echo "Chức năng không khả dụng";
            exit;
        }
    }

	public function index()
	{
		$data1['error'] = 0;
		$_data = [];    
        $var = $this->session->userdata;
		$custid = $var['custid'];
        //$json = file_get_contents('http://test.tavicosoft.com/crm/index.php/Api/ticket_agent/'.$custid.'');
        $json = file_get_contents('http://test.tavicosoft.com/crm/index.php/ticket/getticketbyagent/?agentid='.$custid);
        // $json_customer = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/customer/select/');
        
        $data['custid'] = $custid;
        $data['result'] = json_decode($json,TRUE);

        // $data['customer'] = json_decode($json_customer,TRUE);
        $_data['script'] = $this->load->view('script/script_ticket', NULL, TRUE);
		$_data['mainview'] = $this->load->view('ticket/ticket', $data , TRUE);
		$this->load->view('dashboard',$_data);
	}

	public function detail(){
        $var = $this->session->userdata;
        $custid = $var['custid'];
        $roleid = $var['roleid'];
        $groupid = $var['groupid'];
		$ticketid = $this->uri->segment(3);
        $json = file_get_contents('http://test.tavicosoft.com/crm/index.php/ticket/selectTicketLog/'.$ticketid.'');
        $data['listticketlog'] =  json_decode($json,TRUE)['data'];
        $json_ticket = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/search?action=search_ticket&ticketid='.$ticketid.'');
        $data['ticket'] = $ticket_detail =  json_decode($json_ticket,TRUE);
        $ticket_detail = $ticket_detail['data'][0];
        $ticket_users = $ticket_detail['ticketusers'];
        $crequest = $ticket_detail['custid'];
        $agentcurrent = $ticket_detail['agentcurrent'];
        $list_user = json_decode($this->M_api->getlistcustomer(0),true);
        $data['listuser'] = $list_user['data'];
        //Xử lý việc nhận phiếu
        $data['finish'] = false;
        $data['update'] = false;
        if($custid == $agentcurrent && $ticket_detail['status']!=4){
            $data['finish'] = true;
        }
        if($custid == $agentcurrent){
            $data['update'] = true;
        }
        $list_user_request = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/getuserbylistid?listid='.$crequest.','.$agentcurrent);
        $list_user_request = json_decode($list_user_request,true)['data'];
        // var_dump($list_user_request);
        if($list_user_request[0]['custid']==$crequest){
            $data['crequest'] = $list_user_request[0];
            $data['agentcurrent'] = $list_user_request[1];

        }else{
            $data['crequest'] = $list_user_request[1];
            $data['agentcurrent'] = $list_user_request[0];
        }
        $extinfo = json_decode($ticket_detail['extension'],true);
        $data['extinfo'] = $extinfo;
        $data['ticketdetail'] = $ticket_detail;
        $list_user_support_ticket = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/getuserbylistid?listid='.$ticket_users);
        $list_user_support_ticket = json_decode($list_user_support_ticket,true);
        $data['userssuppot'] = $list_user_support_ticket['data'];
        $json_data = file_get_contents('http://test.tavicosoft.com/crm/index.php/news/select?pagesize=4') ;
        $knowledge['news'] = json_decode($json_data,true)['data'];
		$_body = [];
		//$_body['top'] = $this->load->view('ticket/top/t_breadcrumb', NULL, TRUE);
		$_body['left'] = $this->load->view('ticket/left/t_info', $data, TRUE); 
		$_body['right'] = $this->load->view('ticket/right/t_history', $knowledge, TRUE);
		$_body['center'] = $this->load->view('ticket/center/t_body', $data, TRUE);

		$_data = [];    
		// $_data['navbar'] = $this->load->view('navbar/navbar', NULL, TRUE); 
		// $_data['sidebar'] = $this->load->view('sidebar/sidebar', NULL, TRUE); 
        $_data['script'] = $this->load->view('script/script_update_ticket', null, TRUE);
        $_data['script2'] = $this->load->view('script/knowledge', NULL, TRUE);   
		$_data['mainview'] = $this->load->view('ticket/ticket_detail', $_body , TRUE);
		$this->load->view('dashboard',$_data);
	}

	public function contract(){
		$_body = [];
		$_body['top'] = $this->load->view('user/top/ud_breadcrumb', NULL, TRUE);
		$_body['left'] = $this->load->view('user/left/ud_contract', NULL, TRUE); 
		$_body['right'] = $this->load->view('user/right/ud_history', NULL, TRUE);
		$_body['center'] = $this->load->view('user/center/ud_contract', NULL, TRUE);

		$_data = [];    
		$_data['navbar'] = $this->load->view('navbar/navbar', NULL, TRUE); 
		$_data['sidebar'] = $this->load->view('sidebar/sidebar', NULL, TRUE);  
		$_data['mainview'] = $this->load->view('user/user_detail', $_body , TRUE);
		$this->load->view('master',$_data);
	}
    //insert ticket
    public function viewInsert()
    {
        $var = $this->session->userdata;
        $custid = $var['custid'];
        $roleid = $var['roleid'];
        $groupod = $var['groupid'];

        //get list cus
        $list_user = json_decode($this->M_api->getlistcustomer(0),true);

        $contractid = $this->uri->segment(3);
        $agentcreated = $this->input->post('agentcreated');
        $agentcurrent = $this->input->post('agentcurrent');
        $nguonphieu = $this->input->post('nguonphieu');
        $priority = $this->input->post('priority');
        $status = $this->input->post('status');
        $_body = [];
        $user = [];
        $user['listuser'] = $list_user['data'];
        $json_data = file_get_contents('http://test.tavicosoft.com/crm/index.php/news/select?pagesize=4') ;
        $knowledge['news'] = json_decode($json_data,true)['data'];
        $_body['left'] = $this->load->view('ticket/left/t_insert', $user, TRUE); 
        $_body['right'] = $this->load->view('ticket/right/t_history', $knowledge, TRUE);
        $_body['center'] = $this->load->view('ticket/center/t_insert', null, TRUE);
        $_data = [];   

        $_data['script'] = $this->load->view('script/script_insert_ticket', null, TRUE);  
        $_data['script2'] = $this->load->view('script/knowledge', null, TRUE); 
        $_data['mainview'] = $this->load->view('ticket/ticket_insert', $_body , TRUE);
        $this->load->view('dashboard',$_data); 
    }
    public function insertTicket()
    {
        $action = "Tạo phiếu";
        $title = $this->input->post('title');
        $contractid = $this->input->post('contractid');
        $crequest = $this->input->post('crequest');
        $agentcurrent = $this->input->post('agentcurrent');
        $priority = $this->input->post('priority'); 
        $ticketchanel = $this->input->post('ticketchannel');
        $cmt = $this->input->post('cmt');
        $bds_data = [];
        $bds_data['bds'] = $this->input->post('bds');
        $bds_data['gd'] = $this->input->post('gd');
        $bds_data['duan'] = $this->input->post('duan');
        $bds_data['dot'] = $this->input->post('dot');
        $data_ext = json_encode($bds_data);

        $var = $this->session->userdata;
        $custid = $var['custid'];
        $roleid = $var['roleid'];
        $groupid = $var['groupid'];
        $agentcreated = $custid;
        $userlist = $custid;
        if($agentcreated != $agentcurrent){
            $userlist .= ','.$agentcurrent;
        }
        $postdata = http_build_query([
                'log_custid' => $custid,
                'log_roleid' => $roleid,
                'log_groupid' => $groupid,
                'custid' => $crequest,
                'agentcreated' => $custid,
                'agentcurrent' => $agentcurrent,
                'contractid' => $contractid,
                'priority' => $priority,
                'sla'=>$this->input->post('sla'),
                'duedate'=>$this->input->post('duedate'),
                'levelticket'=>$this->input->post('levelticket'),
                'type'=>$this->input->post('type'),
                'status' => 0,
                'action' => $action,
                'title' => $title,
                'useraction' => $custid,
                'ticketusers' => $userlist,
                'ticketchannel'=>$ticketchanel,
                'extension'=> $data_ext,
                'cmt'=> $cmt
        ]); 
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/ticket/insert',false,$context) ;
        

        echo $result;
    }

    public function updateTicketStatus(){
        $ticketid = $this->input->post('ticketid');
        $status = 4;
        /*
        if(isset($this->input->post('status'))){
            $status = $this->input->post('status');
        }
        */
        $var = $this->session->userdata;
        $custid = $var['custid'];
        $roleid = $var['roleid'];
        $groupid = $var['groupid'];
        $postdata = http_build_query([
            'log_custid' => $custid,
            'log_roleid' => $roleid,
            'log_groupid' => $groupid,
            'ticketid' => $ticketid,
            'status' => $status,
            'action' => "Cập nhật trạng thái phiếu",
            'useraction'=> $custid,
            'cmt'=>'Hoàn thành'
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/ticket/update/'.$ticketid.'',false,$context);
        echo $result;
    }

    public function updateTicketNew()
    {
        $var = $this->session->userdata;
        $custid = $var['custid'];
        $roleid = $var['roleid'];
        $groupid = $var['groupid'];
        $ticketid = $this->input->post('ticketid');
        $ticketchannel = $this->input->post('ticketchannel');
        $priority = $this->input->post('priority');
        $bds_data = [];
        $bds_data['bds'] = $this->input->post('bds');
        $bds_data['gd'] = $this->input->post('gd');
        $bds_data['duan'] = $this->input->post('duan');
        $bds_data['dot'] = $this->input->post('dot');
        $agentcurrent = $this->input->post('agentcurrent');
        $ticketusers = $this->input->post('ticketusers');
        $changelog = $this->input->post('changelog');
        if(strpos($ticketusers,$agentcurrent)===false){
            $ticketusers.=",".$agentcurrent;
        }
        $data_ext = json_encode($bds_data);
        $postdata = http_build_query([
            'log_custid' => $custid,
            'log_roleid' => $roleid,
            'log_groupid' => $groupid,
            'agentcurrent'=>$agentcurrent,
            'ticketid' => $ticketid,
            'ticketchannel'=> $ticketchannel,
            'priority'=>$priority,
            'extension' => $data_ext,
            'action' => "Cập nhật phiếu",
            'useraction'=> $custid,
            'cmt'=>$this->input->post('cmt'),
            'sla'=>$this->input->post('sla'),
            'duedate'=>$this->input->post('duedate'),
            'finishdate'=>$this->input->post('finishdate'),
            'levelticket'=>$this->input->post('levelticket'),
            'type'=>$this->input->post('type'),
            'ticketusers'=>$ticketusers,
            'changelog'=>$changelog
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/ticket/update/'.$ticketid.'',false,$context);
        echo $result;
        /*
        if($this->input->post('agentcreated') !=null)
        {
        $agentcreated = $this->input->post('agentcreated');
        $useraction = $this->input->post('agentcreated');
        }else{$agentcreated = null;}

        if($this->input->post('agentcurrent') !=null)
        {
        $agentcurrent = $this->input->post('agentcurrent');
        
        }else{$agentcurrent = null;}

        if($this->input->post('ticketchannel') !=null)
        {
        $ticketchannel = $this->input->post('ticketchannel');
        
        }else{$ticketchannel = null;}

        if($this->input->post('levelticket') !=null)
        {
        $levelticket = $this->input->post('levelticket');
        
        }else{$levelticket = null;}

        if($this->input->post('status') !=null)
        {
        $status = $this->input->post('status');
        
        }else{$status = null;}

        if($this->input->post('type') !=null)
        {
        $type = $this->input->post('type');
        
        }else{$type = null;}

        if($this->input->post('priority') !=null)
        {
        $priority = $this->input->post('priority');
        
        }else{$priority=null;}
        if($this->input->post('createat') !=null)
        {
        $createat = $this->input->post('createat');
        
        }else{$createat = null;}

        if($this->input->post('SLA') !=null)
        {
        $SLA = $this->input->post('SLA');
        
        }else{$SLA = null;}

        if($this->input->post('appointmentdate') !=null)
        {
        $appointmentdate = $this->input->post('appointmentdate');
        
        }else{$appointmentdate = null;}

        if($this->input->post('finishday') !=null)
        {
        $finishday = $this->input->post('finishday');
        
        }else{$finishday = null;}

        if($this->input->post('action') !=null)
        {
        $action = $this->input->post('action');
        
        }else{$action = null;}
        $postdata = http_build_query([
                'agentcreated' => $agentcreated,
                'agentcurrent' => $agentcurrent,
                'ticketchannel' => $ticketchannel,
                'levelticket' => $levelticket,
                'status' => $status,
                'type' => $type,
                'priority' => $priority,
                'createat' => $createat,
                'SLA' =>$SLA,
                'appointmentdate'=>$appointmentdate,
                'finishday' => $finishday,
                'useraction' => $useraction,
                'action' => $action
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/Api/ticket/update/'.$ticketid.'',false,$context);
        echo json_encode($ticketid);
        */
    }

    public function updateTicketLog()
    {
        $var = $this->session->userdata;
        $custid = $var['custid'];
        $roleid = $var['roleid'];
        $groupid = $var['groupid'];
        $ticketid = $this->input->post('ticketid');
        $cmt = $this->input->post('cmt');
        $action  = "Ghi chú phiếu";
        $postdata = http_build_query([
            'log_custid' => $custid,
            'log_roleid' => $roleid,
            'log_groupid' => $groupid,
            'action' => $action,
            'useraction'=> $custid,
            'cmt'=>$cmt,
            'ticketid' => $ticketid,
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/ticket/insert_ticketlog/'.'',false,$context);
        echo $result;
    }

    public function deleteTicket()
    {
        $ticketid = $this->input->post('ticketid');
        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/Api/ticket/delete/'.$ticketid.'');
        header('location:../ticket');
        // var_dump($ticketid);
    }    

    public function getIdCard()
    {
        $var = $this->session->userdata;
        $custid = $var['custid'];
        $roleid = $var['roleid'];
        $telephone = $this->input->post('telephone');
        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/search?action=search_customer&telephone='.$telephone.'&roleid='.$roleid);
        echo $result;
    }

}
