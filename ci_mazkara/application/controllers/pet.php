<?php
class Pet extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pet_model');
		$this->myheader();
	}
	public function myheader()
	{
		$this->load->view('header');
		$this->load->view('navigation');
	}
	public function createpet()
	{
		$this->checkauth();
		$this->load->model('pettype_model');
		$data['pettype']=$this->pettype_model->list_pettype_m();
		$this->form_validation->set_rules('pettype','Choose Pet type','required');
		$this->form_validation->set_rules('petname','Pet Name','required|xss_clean|max_length[200]');
		if($this->form_validation->run()==false)
		{
			//$category_list['catlist']=$this->blog->cat_list();
			$this->load->view('create_pet_v',$data);
		}
		else
		{
			$this->checkauth();
			$petname=$this->input->post('petname');
			$pettype=$this->input->post('pettype');
			$this->pet_model->create_pet_m($petname,$pettype);
			$this->load->view('success_message');
		}
		$this->footer();
	}
	public function deletepet($petid = NULL)
	{
		$this->checkauth();
		$petid=$this->input->post('petid');
		if(isset($petid))
		{
			$this->pet_model->delete_pet_m($petid);
		}
	}
	public function updatepet()
	{
		$this->checkauth();
		$petname=$this->input->post('petname');
		$petid=$this->input->post('petid');
		if(isset($petid))
		{
			$this->pet_model->update_pet_m($petname,$petid);
		}
	}
	public function listpet()
	{
		$this->checkauth();
		if(!isset($_REQUEST['petid']))
		{
			$petid=0;
		}
		else
		{
			$petid=$_REQUEST['petid'];
		}
		$data['petlist'] = $this->pet_model->list_pet_m($petid);
		$this->load->view('pet_list_v',$data);
		$this->footer();
	}
	public function footer()
	{
		$this->load->view('footer');
	}
}
?>