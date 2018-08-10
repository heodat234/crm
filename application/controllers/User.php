<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('M_api');
    }

	public function index()
	{
        $_body = [];
        $_body['left'] = $this->load->view('user/left/ud_dashboard_left',null,TRUE); 
        $_body['right'] = $this->load->view('user/right/ud_dashboard_right', null, TRUE);
        $_body['center'] = $this->load->view('user/center/ud_dashboard_center', null, TRUE);
		$_data = [];    
		$_data['navbar'] = $this->load->view('navbar/navbar', NULL, TRUE); 
		$_data['sidebar'] = $this->load->view('sidebar/sidebar', NULL, TRUE); 
        $_data['script'] = $this->load->view('script/script_dashboard', NULL, TRUE);  
		$_data['mainview'] = $this->load->view('user/user', $_body , TRUE);
		$this->load->view('dashboard',$_data);
	}

	public function detail(){
		$_body = [];
		$customer = [];
		if(isset($_GET['cusid'])){
			$_cusid = $_GET['cusid']; 
		}
        else
        {
            $_cusid = '';
        }
		if(isset($_GET['phone'])){
			$_phone = $_GET['phone']; 
		}
        else
        {
            $_phone = '';
        }
        if(isset($_GET['roleid'])){
            $_roleid = $_GET['roleid']; 
        }
        else
        {
            $_roleid = '';
        }
		// $custid = $this->uri->segment(3);
		//Get Thong tin dia chi
		$arrContextOptions=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		);  
		$_jsoncity = json_decode(file_get_contents('https://hungminhits.com/api/list_city',false, stream_context_create($arrContextOptions)))  ;
		$customer['city'] = $_jsoncity;
		//Get thông tin khách hàng dựa vào id hoặc số phone
        $var = $this->session->userdata;
        $roleid = $var['roleid'];
		$_jsonuser = json_decode(file_get_contents('http://test.tavicosoft.com/crm/index.php/api/search?action=search_customer&search=&custid='.$_cusid.'&telephone='.$_phone.'&roleid='.$roleid), true);
		$_dataContract['user'] = $_jsonuser['data'];
		//Get thông tin ticket dựa vào cusid
		$_jsonticket = json_decode(file_get_contents('http://test.tavicosoft.com/crm/index.php/ticket/select/'.$_cusid.''), true);
		$_dataContract['ticket'] = $_jsonticket['data'];
		//Get thông tin hợp động
            if(isset($_GET['idcard'])){
                    $idcard = strval($_GET['idcard']);
                 $data = array(
                    'reportcode'=>'crmContract01',
                    'limit'=>25,
                    'start'=>0,
                    'queryFilters'=>array(
                        'idcard'=> $idcard
                    )
                );

                $result = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data);
                // var_dump($result);
                $_json = json_decode($result,true);
                $_json2 = json_decode($_json,true);
                $_dataContract['trade'] = $_json2["result"]["data"];
                    }
            else
            {
                $_dataContract['trade'] = array();
            }
        
		//Get thông tin cuộc gọi từ SDT
        $var = $this->session->userdata;
        $roleid = $var['roleid'];
        $role_list = array();
        if($roleid==1){
            $role_list['1']="Quản Trị Viên";
            $role_list['2']="Chuyên Viên";
        }
        $role_list['3']="Khách hàng";

        //Get List Địa chỉ

        //Group List
        $_jsongroup = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/group');
        $group_list = json_decode($_jsongroup,true);
        $customer['role_list'] = $role_list; 
        $customer['group_list'] = $group_list['data']; 
        
		$customer['detail'] = $_jsonuser['data'];

        $_jsonlistext = file_get_contents('http://test.tavicosoft.com/crm/index.php/extdata/select/user');
        $list_ext = json_decode($_jsonlistext,true);
        $customer['list_ext'] = $list_ext['data']; 

        $_jsonaddress = json_decode(file_get_contents('http://test.tavicosoft.com/crm/index.php/api/address/'.$_cusid.''), true);

        $_jsonhistory = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/user_history/'.$_cusid.'');
         $_jsonhistory_data= json_decode($_jsonhistory,true);
         $right['history'] = $_jsonhistory_data['data'];
        $customer['address'] = $_jsonaddress['data'];

		$_body['top'] = $this->load->view('user/top/ud_breadcrumb', NULL, TRUE);
		$_body['left'] = $this->load->view('user/left/ud_info',$customer,TRUE); 
		$_body['right'] = $this->load->view('user/right/ud_history', $right, TRUE);
		$_body['center'] = $this->load->view('user/center/ud_body', $_dataContract, TRUE);


		$_data = [];
		$_data['link'] = 'user/detail';     
		// $_data['navbar'] = $this->load->view('navbar/navbar', NULL, TRUE); 
		// $_data['sidebar'] = $this->load->view('sidebar/sidebar', NULL, TRUE);  
		$_data['script'] = $this->load->view('script/script_user_info', NULL, TRUE);
		$_data['mainview'] = $this->load->view('user/user_detail', $_body , TRUE);
		$this->load->view('dashboard',$_data);
	}

	public function create(){
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  
        $_jsoncity = json_decode(file_get_contents('https://hungminhits.com/api/list_city',false, stream_context_create($arrContextOptions)))  ;
        

        $var = $this->session->userdata;
        $roleid = $var['roleid'];
        $role_list = array();
        if($roleid==1){
            $role_list['1']="Quản Trị Viên";
            $role_list['2']="Chuyên Viên";
        }
        $role_list['3']="Khách hàng";

        //Group List
        $_jsongroup = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/group');
        $group_list = json_decode($_jsongroup,true);

		$_data = [];   
        
        $_jsonlistuser = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/search?action=search_customer&search=&roleid='.$roleid);
        $list_user = json_decode($_jsonlistuser,true);

        $_jsonlistext = file_get_contents('http://test.tavicosoft.com/crm/index.php/extdata/select/user');
        $list_ext = json_decode($_jsonlistext,true);
        $_data['list_ext'] = $list_ext['data']; 

        $_data['role_list'] = $role_list; 
        $_data['group_list'] = $group_list['data']; 
        $_data['list_ext'] = $list_ext['data']; 
        $_data1['list_user'] = $list_user['data']; 
        $_data['city'] = $_jsoncity;
        $_body = [];
        $_body['top'] = $this->load->view('user/top/ud_breadcrumb', NULL, TRUE);
        $_body['left'] = $this->load->view('user/left/ud_info_create', $_data, TRUE); 
        //$_body['right'] = $this->load->view('user/right/ud_history', NULL, TRUE);
        $_body['center'] = $this->load->view('user/center/ud_info_create_center', $_data1, TRUE);
		$_data['navbar'] = $this->load->view('navbar/navbar', NULL, TRUE); 
		$_data['sidebar'] = $this->load->view('sidebar/sidebar', NULL, TRUE);  
		$_data['script'] = $this->load->view('script/script_user_info_create', NULL, TRUE);
		$_data['mainview'] = $this->load->view('user/user_create', $_body , TRUE);
		$this->load->view('dashboard',$_data);
	}

	public function contract(){
		$data['contractid'] = $this->uri->segment(3);
        //a
		$data = array(
            'reportcode'=>'crmContract01a',
            'limit'=>25,
            'start'=>0,
            'queryFilters'=>array(
                'contractid'=> $data['contractid']
            )
        );

        $result = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data);
        // var_dump($result);
        $_json = json_decode($result,true);
        $_json2 = json_decode($_json,true);
        $data_left['trade'] = $_json2["result"]["data"];
        //b
		$data_contractb = array(
            'reportcode'=>'crmContract01b',
            'limit'=>25,
            'start'=>0,
            'queryFilters'=>array(
                'contractid'=> $this->uri->segment(3)
            )
        );

        $result_contractb = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data_contractb);
        // var_dump($result);
        $_json_contractb = json_decode($result_contractb,true);
        $_json2_contractb = json_decode($_json_contractb,true);
        $data['trade_history'] = $_json2_contractb["result"]["data"]; 
        //c

        $data_contractc = array(
            'reportcode'=>'crmContract01c',
            'limit'=>25,
            'start'=>0,
            'queryFilters'=>array(
                'contractid'=> $this->uri->segment(3)
            )
        );

        $result_contractc = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data_contractc);
        // var_dump($result);
        $_json_contractc = json_decode($result_contractc,true);
        $_json2_contractc = json_decode($_json_contractc,true);
        $data['trade_cntt'] = $_json2_contractc["result"]["data"];   
        //d
        $data_contractd = array(
            'reportcode'=>'crmContract01d',
            'limit'=>25,
            'start'=>0,
            'queryFilters'=>array(
                'contractid'=> $this->uri->segment(3)
            )
        );

        $result_contractd = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data_contractd);
        // var_dump($result);
        $_json_contractd = json_decode($result_contractd,true);
        $_json2_contractd = json_decode($_json_contractd,true);
        $data['trade_km'] = $_json2_contractd["result"]["data"];  
        //e
        $data_contracte = array(
            'reportcode'=>'crmContract01e',
            'limit'=>25,
            'start'=>0,
            'queryFilters'=>array(
                'contractid'=> $this->uri->segment(3)
            )
        );

        $result_contracte = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data_contracte);
        // var_dump($result);
        $_json_contracte = json_decode($result_contracte,true);
        $_json2_contracte = json_decode($_json_contracte,true);
        $data['trade_tv'] = $_json2_contracte["result"]["data"];  
        //f
         $data_contractf = array(
            'reportcode'=>'crmContract01f',
            'limit'=>25,
            'start'=>0,
            'queryFilters'=>array(
                'contractid'=> $this->uri->segment(3)
            )
        );

        $result_contractf = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data_contractf);
        $_json_contractf = json_decode($result_contractf,true);
        $_json2_contractf = json_decode($_json_contractf,true);
        $data['trade_nvkd'] = $_json2_contractf["result"]["data"];  

        //g
        $data_contractg = array(
            'reportcode'=>'crmContract01g',
            'limit'=>25,
            'start'=>0,
            'queryFilters'=>array(
                'contractid'=> $this->uri->segment(3)
            )
        );

        $result_contractg = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data_contractg);
        // var_dump($result);
        $_json_contractg = json_decode($result_contractg,true);
        $_json2_contractg = json_decode($_json_contractg,true);
        $data['trade_dchd'] = $_json2_contractg["result"]["data"]; 
        //h
        $data_contracth = array(
            'reportcode'=>'crmContract01h',
            'limit'=>25,
            'start'=>0,
            'queryFilters'=>array(
                'contractid'=> $this->uri->segment(3)
            )
        );

        $result_contracth = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data_contracth);
        // var_dump($result);
        $_json_contracth = json_decode($result_contracth,true);
        $_json2_contracth = json_decode($_json_contracth,true);
        $data['trade_gc'] = $_json2_contracth["result"]["data"];      

        //tab1
        $json_ticket_bottom = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/search?action=search_ticket&contractid='.$this->uri->segment(3));
        $data['ticket_bottom'] =  json_decode($json_ticket_bottom,TRUE);       

         // $_jsonhistory = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/user_history/'.$_cusid.'');
         // $_jsonhistory_data= json_decode($_jsonhistory,true);
         // $right['history'] = $_jsonhistory_data['data'];
        $_jsontoken = json_decode(file_get_contents('http://crm.tavicosoft.com/api/get_erp_token/C0001'), true);
        $_jsontoken_data= json_decode($_jsontoken,true)['result'];
        $data_left['token'] = $_jsontoken_data;
        $right['history'] =[];
		$_body = [];
		$_body['top'] = $this->load->view('user/top/ud_breadcrumb', NULL, TRUE);
		$_body['left'] = $this->load->view('user/left/ud_contract', $data_left, TRUE); 
		$_body['right'] = $this->load->view('user/right/ud_history', $right, TRUE);
		$_body['center'] = $this->load->view('user/center/ud_contract', $data, TRUE);

		$_data = [];    
		$_data['navbar'] = $this->load->view('navbar/navbar', NULL, TRUE); 
		$_data['sidebar'] = $this->load->view('sidebar/sidebar', NULL, TRUE);  
		$_data['script'] = $this->load->view('script/script_user', NULL, TRUE);
		$_data['mainview'] = $this->load->view('user/user_detail', $_body , TRUE);
		$this->load->view('dashboard',$_data);
	}
	public function insertPhoneList()
	{
		$telephonelist = $this->input->post('telephonelist');
		$idcard = strval($_GET['idcard']);
        $custid = strval($_GET['cusid']);
        $roleid = strval($_GET['roleid']);
		$postdata = http_build_query([
                'telephonelist' => $telephonelist
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/customer/update/'.$custid.'',false,$context);
         header('location:/user/detail/?cusid='.$custid.'&idcard='.$idcard.'&roleid='.$roleid);
	}

	public function insertEmailList()
	{
		$emaillist = $this->input->post('emaillist');
        $idcard = strval($_GET['idcard']);
		$custid = strval($_GET['cusid']);
        $roleid = strval($_GET['roleid']);
		$postdata = http_build_query([
                'emaillist' => $emaillist
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/customer/update/'.$custid.'',false,$context);
         header('location:/user/detail/?cusid='.$custid.'&idcard='.$idcard.'&roleid='.$roleid);
	}

	public function selectCity()
	{
		$id_city = $this->input->post('id_city');
		$arrContextOptions=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		);  
		$_jsoncity = json_decode(file_get_contents('https://hungminhits.com/api/list_district/'.$id_city.'',false, stream_context_create($arrContextOptions)))  ;
		$city = $_jsoncity;
		echo json_encode($city);
	}

	public function selectDistrict()
	{
		$id_district = $this->input->post('id_district');
		$arrContextOptions=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		);  
		$_jsoncity = json_decode(file_get_contents('https://hungminhits.com/api/list_ward/'.$id_district.'',false, stream_context_create($arrContextOptions)))  ;
		$city = $_jsoncity;
		echo json_encode($city);
	}

    public function getListExt()
    {
        $_jsonlistext = file_get_contents('http://test.tavicosoft.com/crm/index.php/extdata/select/user');
        echo $_jsonlistext;
    }

	public function getSSLPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSLVERSION,3); 
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
	}

    public function getGroupByRoleId()
    {
        $roleid = $this->input->post('roleid');
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  
        $_jsongroup = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/group/'.$roleid);
        //$data = ($_jsongroup,true);
        echo $_jsongroup;
    }

    public function updateUser()
    {
        $data = $this->input->post();
        $__data= $this->input->post('ext');
        $__data1 = parse_str($__data, $get_array);
        $__extinfo = json_encode($get_array);
        $thunhap = json_encode($__data);
        $postdata = http_build_query([
                'custid' => isset($data['custid'])?$data['custid']:null,
                'roleid' => isset($data['roleid'])?$data['roleid']:null,
                'groupid' => isset($data['groupid'])?$data['groupid']:null,
                'custname' =>isset($data['custname'])?$data['custname']:null,
                'gender' =>isset($data['gender'])?$data['gender']:null,
                // 'idcard' => isset($data['idcard'])?$data['idcard']:null,
                'fullbirthday' => isset($data['fullbirthday'])?$data['fullbirthday']:null,
                'telephone' =>isset($data['telephone'])?$data['telephone']:null,
                'email' => isset($data['email'])?$data['email']:null,
                'country' => isset($data['country'])?$data['country']:null,
                'city' => isset($data['city'])?$data['city']:null,
                'district' =>isset($data['district'])?$data['district']:null,
                'ward' =>isset($data['ward'])?$data['ward']:null,
                'address' => isset($data['address'])?$data['address']:null,
                'comments' =>isset($data['comments'])?$data['comments']:null,
                'queue'=> isset($data['queue'])?$data['queue']:null,
                'extinfo'=> $__extinfo,
                'fulladdress'=> isset($data['fulladdress'])?$data['fulladdress']:null
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/customer/update/'.$data['custid'],false,$context);
        $queue = isset($data['queue'])?$data['queue']:null;
        if($queue !=null)
        {
        $postdata_queue = http_build_query([
                'extension' =>$data['telephone'],
                'queue' => $data['queue']
        ]);
        $opts_queue = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata_queue
            )
        );
        $context_queue  = stream_context_create($opts_queue);
        $result_queue_login = file_get_contents('http://test.tavicosoft.com/crm/index.php/queue/loginQueue',false,$context_queue);

        $postdata_logout = http_build_query([
                'extension' =>$data['telephone'],
                'queue' => $data['queueold']
        ]);
        $opts_logout = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata_logout
            )
        );
        $context_logout  = stream_context_create($opts_logout);  
        $result_queue_logout = file_get_contents('http://test.tavicosoft.com/crm/index.php/queue/logoutQueue',false,$context_logout);
        
        }


        echo $result;
        
    }

    public function insertUser()
    {
        //custid, groupid
        if($this->input->post('roleid') !=null)
        {
        $roleid = $this->input->post('roleid');
        }else{$roleid = null;}

        if($this->input->post('groupid') !=null)
        {
        $groupid = $this->input->post('groupid');
        
        }else{$groupid = null;}

        if($this->input->post('custname') !=null)
        {
        $custname = $this->input->post('custname');
        
        }else{$custname = null;}

        if($this->input->post('idcard') !=null)
        {
        $idcard = $this->input->post('idcard');
        
        }else{$idcard = null;}

        if($this->input->post('fullbirthday') !=null)
        {
        $fullbirthday = $this->input->post('fullbirthday');
        
        }else{$fullbirthday = null;}

        if($this->input->post('telephone') !=null)
        {
        $telephone = $this->input->post('telephone');
        
        }else{$telephone = null;}

        if($this->input->post('email') !=null)
        {
        $email = $this->input->post('email');
        
        }else{$email=null;}
        if($this->input->post('country') !=null)
        {
        $country = $this->input->post('country');
        
        }else{$country = null;}

        if($this->input->post('city') !=null)
        {
        $city = $this->input->post('city');
        
        }else{$city = null;}

        if($this->input->post('district') !=null)
        {
        $district = $this->input->post('district');
        
        }else{$district = null;}

        if($this->input->post('ward') !=null)
        {
        $ward = $this->input->post('ward');
        
        }else{$ward = null;}

        if($this->input->post('address') !=null)
        {
        $address = $this->input->post('address');
        
        }else{$address = null;}

        if($this->input->post('comments') !=null)
        {
        $comments = $this->input->post('comments');
        
        }else{$comments = null;}

        if($this->input->post('gender') !=null)
        {
        $gender = $this->input->post('gender');
        
        }else{$gender = null;}

        if($this->input->post('fulladdress') !=null)
        {
        $fulladdress = $this->input->post('fulladdress');
        
        }else{$fulladdress = null;}
        // $data['message'] = $fulladdress;
        // echo json_encode($data);

        if($this->input->post('thunhap') !=null)
        {
            $__data= $this->input->post('ext');
            $__data1 = parse_str($__data, $get_array);
            $__extinfo = json_encode($get_array);

        }else{$__extinfo = null;}
        if($this->input->post('custid') !=null)
        {
            $custid = $this->input->post('custid');
        }
        else
        {
        $custid = $this->M_api->gen_custid();
        }
        if($this->input->post('password') !=null)
        {
            $password = $this->input->post('password');
        }
        else
        {
        $password = $this->M_api->gen_custid();
        }

        $postdata = http_build_query([
                'custid' => $custid,
                'roleid' => $roleid,
                'groupid' => $groupid,
                'custname' =>$custname,
                'gender' =>$gender,
                'idcard' => $idcard,
                'fullbirthday' => $fullbirthday,
                'telephone' =>$telephone,
                'email' => $email,
                'country' => $country,
                // 'city' =>$city,
                // 'district' =>$district,
                // 'ward' =>$ward,
                // 'address' =>$address,
                'comments' =>$comments,
                'extinfo'=> $__extinfo,
                // 'fulladdress'=> $fulladdress,
                'password' => md5($password),
                'queue' => $this->input->post('queue')
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/customer/insert',false,$context);

        if($this->input->post('queue') !=null)
        {
        $postdata_queue = http_build_query([
                'extension' =>$telephone,
                'queue' => $this->input->post('queue')
        ]);
        $opts_queue = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata_queue
            )
        );
        $context_queue  = stream_context_create($opts_queue);

        $result_queue = file_get_contents('http://test.tavicosoft.com/crm/index.php/queue/loginQueue',false,$context_queue);
        }

        echo $result;

        
        // echo json_encode($get_array);
    }

    //
    public function updateUserEmailList()
    {
        $data = $this->input->post();
        $custid = isset($data['custid'])?$data['custid']:null;
        $email = isset($data['email'])?$data['email']:null;
        $emaillist = isset($data['emaillist'])?$data['emaillist']:null;
        $array_email = explode(',', $emaillist);
        $listemailnew = '';
        for($i =0;$i< sizeof($array_email);$i++){
            if($array_email[$i]==$email){
                unset($array_email[$i]);
            }else{
                if(strlen($listemailnew) == 0){
                    $listemailnew = $array_email[$i];
                }else{
                    $listemailnew.= $array_email[$i];
                }
            }
        }
        $var = $this->session->userdata;
        $log_custid = $var['custid'];
        $log_roleid = $var['roleid'];
        $log_groupid = $var['groupid'];

        $postdata = http_build_query([
            'log_custid' => $log_custid,
            'log_roleid' => $log_roleid,
            'log_groupid' => $log_groupid,
            'emaillist' => $listemailnew
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/Customer/update/'.$custid,false,$context);
        echo $result;
        
    }

    public function updateUserPhoneList()
    {
        $data = $this->input->post();
        $custid = isset($data['custid'])?$data['custid']:null;
        $phone = isset($data['phone'])?$data['phone']:null;
        $phonelist = isset($data['phonelist'])?$data['phonelist']:null;
        $array_phone = explode(',', $phonelist);
        $listphone = '';
        for($i =0;$i< sizeof($array_phone);$i++){
            if($array_phone[$i]==$phone){
                unset($array_phone[$i]);
            }else{
                if(strlen($listphone) == 0){
                    $listphone = $array_phone[$i];
                }else{
                    $listphone.= $array_phone[$i];
                }
            }
        }
        $var = $this->session->userdata;
        $log_custid = $var['custid'];
        $log_roleid = $var['roleid'];
        $log_groupid = $var['groupid'];
        
        $postdata = http_build_query([
            'log_custid' => $log_custid,
            'log_roleid' => $log_roleid,
            'log_groupid' => $log_groupid,
            'telephonelist' => $listphone
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/Customer/update/'.$custid,false,$context);
        echo $result;
        
    }

    public function updateAddress()
    {
        $data = $this->input->post();
        $addressid = $data['addressid'];
        unset($data['addressid']);
        $var = $this->session->userdata;
        $log_custid = $var['custid'];
        $log_roleid = $var['roleid'];
        $log_groupid = $var['groupid'];
        //$data['log_custid'] => $log_custid;
        $postdata = http_build_query($data);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/address/update/'.$addressid,false,$context);
        echo $result;
        
    }


    public function searchUser()
    {
        $keyword1 = $this->input->post('keyword');
        $keyword = urlencode($keyword1);
        $_jsonSearch = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/search?action=search_customer&roleid=1&search='.$keyword);
        echo $_jsonSearch;
    }

     public function refererQueryString($refererQueryString) {

        //Which values do you want to extract? (You passed their names as variables.)
        $args = func_get_args();

        //Get '[key=name]' strings out of referer's URL:
        $pairs = explode('&',$refererQueryString);

        //String you will return later:
        $return = '';

        //Analyze retrieved strings and look for the ones of interest:
        foreach ($pairs as $pair) {
            $keyVal = explode('=',$pair);
            $key = &$keyVal[0];
            $val = urlencode($keyVal[1]);
            //If you passed the name as arg, attach current pair to return string:
            if(in_array($key,$args)) {
                $return .= '&'. $key . '=' .$val;
            }
        }

        //Here are your returned 'key=value' pairs glued together with "&":
        return ltrim($return,'&');
        }
}
?>