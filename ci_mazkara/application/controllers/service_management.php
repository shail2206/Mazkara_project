<?php
class Service_Management extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('service_model','servicemodel');
		
		$this->myheader();
	}
	public function myheader()
	{
		$this->load->view('header');
		$this->load->view('navigation');
	}
	public function ajax_service()
	{
		$typeid=$this->input->post('typeid');
		$data['service']=$this->servicemodel->list_service_m();
	}
	public function createservice()
	{
		$this->checkauth();
		$this->form_validation->set_rules('servicename','Service Name','required');
        	//  $this->form_validation->set_rules("txt_username", "Username", "trim|required");
		if($this->form_validation->run()==false)
		{
			//$category_list['catlist']=$this->blog->cat_list();
			$this->load->view('create_service_v');
		}
		else
		{
			
			$servicename=$this->input->post('servicename');
			$this->servicemodel->create_service_m($servicename);
			$this->load->view('success_message');
		}
		$this->footer();
	}
	public function deleteservice($sid = NULL)
	{
		$this->checkauth();
		$serviceid=$this->input->post('serviceid');
		if(isset($serviceid))
		{
			$this->servicemodel->delete_service_m($serviceid);
		}
	}
	public function updateservice()
	{
		$this->checkauth();
		$servicename=$this->input->post('servicename');
		$sid=$this->input->post('sid');
		if(isset($sid))
		{
			$this->servicemodel->update_service_m($servicename,$sid);
		}
	}
	public function listservice()
	{
		$this->checkauth();
		if(!isset($_REQUEST['serviceid']))
		{
			$serviceid=0;
		}
		else
		{
			$serviceid=$_REQUEST['serviceid'];
		}
		$data['servicelist'] = $this->servicemodel->list_service_m($serviceid);
		$this->load->view('service_list_v',$data);
		$this->footer();
	}
	public function footer()
	{
		$this->load->view('footer');
	}
}
?>