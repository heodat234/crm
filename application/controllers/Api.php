<?php
ob_start();
class Api extends CI_Controller{

    public $menu = array();
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url','json_output'));
        $this->load->model(array('M_api'));
    }

    public function get_erp_token($loginid=''){

        if ($loginid=='') {
            $result = null;
            json_output(200,$result);
        }else{

        $url = "https://demo.tavicosoft.com/DirectRouter/Index";
        $action = 'ConnectDB';
        $method = 'loginToken';
        $data = array(array(
            'loginid'=>$loginid
            )
        );
        $type='rpc';
        $tid=1;

        $result = $this->M_api->execute_tvc_api($url,$action,$method,$data,$type,$tid);
        // var_dump($result);
        json_output(200,$result);
        }
    }

    public function get_list_contract(){

        // $post = $this->input->post();

        $post = json_decode(file_get_contents('php://input'), true);

        // var_dump($post);

        if (empty($post)) {
            json_output(200,'null');
        }else{

        $reportcode = isset($post['reportcode'])?$post['reportcode']:'';
        $limit = isset($post['limit'])?$post['limit']:25;
        $start = isset($post['start'])?$post['start']:0;

        $queryFilters['contractid'] = 
            isset($post['queryFilters']['contractid'])?$post['queryFilters']['contractid']:'';
        $queryFilters['property'] = 
            isset($post['queryFilters']['property'])?$post['queryFilters']['property']:'';
        $queryFilters['clientname'] = 
            isset($post['queryFilters']['clientname'])?$post['queryFilters']['clientname']:'';
        $queryFilters['idcard'] = 
            isset($post['queryFilters']['idcard'])?$post['queryFilters']['idcard']:'';
        $queryFilters['telephone'] = 
            isset($post['queryFilters']['telephone'])?$post['queryFilters']['telephone']:'';
        $queryFilters['email'] = 
            isset($post['queryFilters']['email'])?$post['queryFilters']['email']:'';
        $queryFilters['address'] = 
            isset($post['queryFilters']['address'])?$post['queryFilters']['address']:'';

   
        $url = "https://demo.tavicosoft.com/DirectRouter/Index";
        $action = 'FrmFdReport';
        $method = 'qry';
        $data = array(array(
        	'reportcode'=>$reportcode,
        	'limit'=>$limit,
        	'start'=>$start,
        	'queryFilters'=>array(
                array('name'=>'contractid','value'=>$queryFilters['contractid']),
        		array('name'=>'property','value'=>$queryFilters['property']),
        		array('name'=>'clientname','value'=>$queryFilters['clientname']),
        		array('name'=>'idcard','value'=>$queryFilters['idcard']),
        		array('name'=>'telephone','value'=>$queryFilters['telephone']),
        		array('name'=>'email','value'=>$queryFilters['email']),
        		array('name'=>'address','value'=>$queryFilters['address'])
			))
        );
        $type='rpc';
        $tid=1;

        $result = $this->M_api->execute_tvc_api($url,$action,$method,$data,$type,$tid);
        // var_dump($result);
        json_output(200,$result);
    }}

    public function get_infor_user($phone){
        $json = file_get_contents('http://test.tavicosoft.com/crm/index.php/customer/select/'.$phone);
        $data = json_decode($json,true);
        json_output(200,$data);
    }

    public function get_normal_api(){
        $data = array(
            'reportcode'=>'crmContract01b',
            'limit'=>25,
            'start'=>0,
            'queryFilters'=>array(
                'property'=>'',
                'clientname'=>'',
                'idcard'=>'',
                'telephone'=>'',
                'email'=>'',
                'address'=>''
            )
        );

        $result = $this->M_api->execute_normal_api("http://crm.tavicosoft.com/api/get_list_contract",$data);
        // var_dump($result);
        json_output(200,json_decode($result,true));
    }

    public function aj_tvc_isrt_user($telephone=''){

        $custid = $this->M_api->gen_custid();

        $postdata = http_build_query([
            'custid'=>$custid,
            'custname'=>$telephone,
            'telephone'=>$telephone,
            'idcard'=>$telephone,
            'email'=>$telephone,
            'groupid'=>3,
            'roleid'=>3
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
        $array = json_decode($result,true);
        // var_dump($result);
        $array[0]['custid'] = $custid;
        json_output(200,$array);
    }

    public function aj_crm_isrt_ticket(){

        // var_dump($this->input->post());

        $ticketchanel = $this->input->post('ticketchanel');
        $priority = $this->input->post('priority');
        $custid = $this->input->post('custid');
        $phone = $this->input->post('phone');
        $callrefid = $this->input->post('callrefid');
        $agentcreated = $this->input->post('agentcreated');

        $postdata = http_build_query([
                'ticketchannel' => $ticketchanel,
                'agentcreated' => $agentcreated,
                'agentcurrent' => $agentcreated,
                'custid' => $custid,
                'priority' => $priority,
                'action' => 'Tạo phiếu từ cuộc gọi '.$phone,
                'title' =>'Hỗ trợ khách hàng '.$phone,
                'useraction' => $agentcreated,
                'ticketusers' => $agentcreated,
                'callrefid' => $callrefid
        ]); 
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        // var_dump($postdata);
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/ticket/insert',false,$context);

        // var_dump($result);

        json_output(200,json_decode($result,true));
    }

    public function aj_crm_isrt_tcklog(){
        // var_dump($this->input->post());

        $ticketid = $this->input->post('ticketid');
        $phone = $this->input->post('phone');
        $callrefid = $this->input->post('callrefid');
        $agentcreated = $this->input->post('agentcreated');
        $record = $this->input->post('record');

        $postdata = http_build_query([
                'ticketid' => $ticketid,
                'action' => 'Lưu record từ cuộc gọi '.$phone,
                'useraction' => $agentcreated,
                'srcrecord' => $record
        ]); 
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        // var_dump($postdata);
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/ticket/insert_ticketlog',false,$context);

        // var_dump($result);

        json_output(200,json_decode($result,true));
    }

    public function aj_mitek_hang_up($SIP,$channel){

        $curl = curl_init();

        $url = 'https://apipbx03.micxm.vn/api/v1/call/hangup?channel='.$SIP.'/'.$channel.'&secret=ac97db2cca493ad87045946aed59eb29';

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          json_output(400,$err);
        } else {
          json_output(200,json_decode($response,true));
        }
    }

    public function aj_mitek_agt_stt($extension){
        $json = file_get_contents('https://apipbx03.micxm.vn/api/v1/call/getstatusagent?extension='.$extension);
        $data = json_decode($json,true);
        json_output(200,$data);
    }

    public function aj_mitek_tranfer($extension,$SIP,$channel){
        $json = file_get_contents('https://apipbx03.micxm.vn/api/v1/call/transferCall?extension='.$extension.'&channel='.$SIP.'/'.$channel.'&secret=ac97db2cca493ad87045946aed59eb29');
        // echo ('https://apipbx03.micxm.vn/api/v1/call/transferCall?extension='.$extension.'&channel='.$SIP.'/'.$channel.'&secret=ac97db2cca493ad87045946aed59eb29');
        $data = json_decode($json,true);
        json_output(200,$data);
    }

    public function aj_mitek_clicktocall($extension,$phone){
        $json = file_get_contents('https://apipbx03.micxm.vn/api/v1/call/clicktocall?extension='.$extension.'&phone='.$phone.'&secret=ac97db2cca493ad87045946aed59eb29');
        $data = json_decode($json,true);
        json_output(200,$data);
    }


    public function avatar($cusid){
        $json = file_get_contents('http://test.tavicosoft.com/crm/index.php/api/search?action=search_customer&search=&custid='.$cusid.'&telephone=&roleid=1');
        $data = json_decode($json,true);
        if($data['code']==1){
            $avatar = $data['data'][0]['avatar'];
            redirect($avatar, 'location');
        }else{
            redirect('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg', 'location');
        }
    }


    public function getlistormuser(){

        // $post = $this->input->post();

        $post = json_decode(file_get_contents('php://input'), true);

        $url = "https://demo.tavicosoft.com/DirectRouter/Index";
        $action = 'FrmFdReport';
        $method = 'getReturnData';
        $data = array(array(
            'reportcode'=>'crmCustomer01',
            'limit'=>400,
            'start'=>0)
        );
        $type='rpc';
        $tid=1;

        $result = $this->M_api->execute_tvc_api($url,$action,$method,$data,$type,$tid);
        $result_array = json_decode($result,true);
        // var_dump($result_array['result']);
        $data = $result_array['result']['data'];
        echo count($data);
        foreach ($data as $user) {
            $user['custid'] = $this->M_api->gen_custid();
            $user['groupid'] = 3;
            $user['roleid'] = 3;
            foreach ($user as $key => $value) {
                // echo $key.'=>'.$value.'<br>';
                if ($key=='email'||$key=='idcard') {
                    if ($user['email']=='') {
                        $user['email']=$user['idcard'];
                    }
                    // echo $key.'=>'.$value.'<br>';
                }
                
                if ($value==null) {
                    $user[$key]=='';
                }
            }
            $postdata = http_build_query($user); 
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                )
            );

            $context  = stream_context_create($opts);

            $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/customer/insert',false,$context);
            $array = json_decode($result,true);
            // var_dump($user);
            var_dump($array);
            // json_output(200,$array);

            // var_dump($user);
            echo "<br>";
            // exit;
            # code...
        }
        // json_output(200,$data);
    }


}