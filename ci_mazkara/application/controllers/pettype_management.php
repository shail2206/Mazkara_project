<?php
class Pettype_Management extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pettype_model','pet_typemodel');
		$this->myheader();
	}
	public function myheader()
	{
		$this->load->view('header');
		$this->load->view('navigation');
	}
	public function createpet_type()
	{
		$this->checkauth();
		$this->form_validation->set_rules('pettypename','Pet Type Name','required|xss_clean|max_length[200]');
		if($this->form_validation->run()==false)
		{
			//$category_list['catlist']=$this->blog->cat_list();
			$this->load->view('create_pet_type_v');
		}
		else
		{
			
			$pet_typename=$this->input->post('pettypename');
			$this->pet_typemodel->create_pettype_m($pet_typename);
			$this->load->view('success_message');
		}
		$this->footer();
	}
	public function deletepet_type($pet_typeid = NULL)
	{
		$this->checkauth();
		$pet_typeid=$this->input->post('pet_typeid');
		if(isset($pet_typeid))
		{
			$this->pet_typemodel->delete_pettype_m($pet_typeid);
		}
	}
	public function updatepet_type()
	{
		$this->checkauth();
		$pettypename=$this->input->post('pettypename');
		$pet_typeid=$this->input->post('pet_typeid');
		if(isset($pet_typeid))
		{
			$this->pet_typemodel->update_pettype_m($pettypename,$pet_typeid);
		}
	}
	public function listpet_type()
	{
		$this->checkauth();
		if(!isset($_REQUEST['pet_typeid']))
		{
			$pet_typeid=0;
		}
		else
		{
			$pet_typeid=$_REQUEST['pet_typeid'];
		}
		$data['pet_typelist'] = $this->pet_typemodel->list_pettype_m($pet_typeid);
		$this->load->view('pettype_list_v',$data);
		$this->footer();
	}
	public function footer()
	{
		$this->load->view('footer');
	}
}
?>