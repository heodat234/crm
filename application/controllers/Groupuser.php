<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupuser extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		 $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('M_api');
	}
	public function index()
	{	
		$_body = [];
		// $_body['top'] = $this->load->view('user/top/ud_breadcrumb', NULL, TRUE);
		// $_body['left'] = $this->load->view('groupuser/left/gu_left',null,TRUE); 
		// $_body['right'] = $this->load->view('user/right/ud_history', $right, TRUE);
		// $_body['center'] = $this->load->view('groupuser/center/gu_info', null, TRUE);
		$_data = [];    
		// $_data['navbar'] = $this->load->view('navbar/navbar', NULL, TRUE); 
		// $_data['sidebar'] = $this->load->view('sidebar/sidebar', NULL, TRUE); 
		$group_data = $this->M_api->getlistgroup();
		$data['listgroup'] = json_decode($group_data,true)['data'];

		$_data['script'] = $this->load->view('script/script_dashboard', NULL, TRUE);  
		$_data['mainview'] = $this->load->view('groupuser/center/gu_info', $data , TRUE);
		$this->load->view('dashboard',$_data);
	}

	public function fielduser()
	{
		$_data = [];    
		// $group_data = $this->M_api->getlistgroup();
		// $data['listgroup'] = json_decode($group_data,true)['data'];
		$_jsonlistext = file_get_contents('http://test.tavicosoft.com/crm/index.php/extdata/select/user');
        $list_ext = json_decode($_jsonlistext,true);
        $customer['list_ext'] = $list_ext['data']; 
		$_data['script'] = $this->load->view('script/script_dashboard', NULL, TRUE);  
		$_data['mainview'] = $this->load->view('groupuser/center/gu_fielduser', $customer , TRUE);
		$this->load->view('dashboard',$_data);
	}
	public function fielddetail()
	{
		$_body = [];
		// $_body['top'] = $this->load->view('user/top/ud_breadcrumb', NULL, TRUE);
		$_body['left'] = $this->load->view('groupuser/left/gu_left_field',null,TRUE); 
		// $_body['right'] = $this->load->view('user/right/ud_history', $right, TRUE);
		$_body['center'] = $this->load->view('groupuser/center/gu_center_field', null, TRUE);
		$_data = [];    
		$_data['navbar'] = $this->load->view('navbar/navbar', NULL, TRUE); 
		$_data['sidebar'] = $this->load->view('sidebar/sidebar', NULL, TRUE); 
		$_data['script'] = $this->load->view('script/script_dashboard', NULL, TRUE);  
		$_data['mainview'] = $this->load->view('groupuser/gu_main', $_body , TRUE);
		$this->load->view('dashboard',$_data);	
	}

	public function groupuserdetail()
	{
		$groupid=$this->input->get('groupid');
		$_body = [];
		$group = [];
		$group_detail = $this->M_api->getlistgroup($groupid);
		$group['gdetail'] = json_decode($group_detail,true)['data'][0];
		$customerbygroup = $this->M_api->getlistcustomerbygroupid($group['gdetail']['groupid']);
		$group['useringroup'] = json_decode($customerbygroup,true)['data']; 
		// $_body['top'] = $this->load->view('user/top/ud_breadcrumb', NULL, TRUE);
		$_body['left'] = $this->load->view('groupuser/left/gu_left_groupuser',$group,TRUE); 
		// $_body['right'] = $this->load->view('user/right/ud_history', $right, TRUE);
		$_body['center'] = $this->load->view('groupuser/center/gu_center_groupuser', $group, TRUE);
		$_data = [];    
		$_data['navbar'] = $this->load->view('navbar/navbar', NULL, TRUE); 
		$_data['sidebar'] = $this->load->view('sidebar/sidebar', NULL, TRUE); 
		$_data['script'] = $this->load->view('script/script_group_edit', NULL, TRUE);  
		$_data['mainview'] = $this->load->view('groupuser/gu_main', $_body , TRUE);
		$this->load->view('dashboard',$_data);	
	}

	public function updategroup(){
		$groupid = $this->input->post('groupid');
        $ticketrule = $this->input->post('ticketrule');
        $postdata = http_build_query([
            'ticketrule'=>$ticketrule,
            'userrule'=>$this->input->post('userrule'),
            'taskrule'=>$this->input->post('taskrule'),
            'knowledgerule'=>$this->input->post('knowledgerule'),
            'status'=>$this->input->post('status'),
        ]);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $result = file_get_contents('http://test.tavicosoft.com/crm/index.php/group/update/'.$groupid.'',false,$context);
        echo $result;
	}

}

/* End of file Groupuser.php */
/* Location: ./application/controllers/Groupuser.php */
?>