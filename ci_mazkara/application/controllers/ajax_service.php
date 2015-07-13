<?php
class Ajax_service extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function service()
	{
		$this->load->model('service_model','servicemodel');
		$data=$this->servicemodel->list_service_m();
		echo "<select name='service' id='ajxservice'>";
		foreach($data as $value)
		{
			echo "<option value=".$value['id'].">";
			echo $value['service_name'];
			echo "</option>";
		}
		echo "</select>";
	}
	public function service_type()
	{
		$this->load->model('Relation_management_m','rmm');
		$sid=$this->input->post('sid');
		$typeid=$this->input->post('typeid');
		$data=$this->rmm->service_type($sid,$typeid);
	}
	public function pettype()
	{
		$this->load->model('pettype_model','pettypemodel');
		$data=$this->pettypemodel->list_pettype_m();
		echo "<select name='pettype' id='ajxpettype'>";
		foreach($data as $value)
		{
			echo "<option value=".$value['id'].">";
			echo $value['pet_type_name'];
			echo "</option>";
		}
		echo "</select>";
	}
	public function pet_petype()
	{
		$this->load->model('Relation_management_m','rmm');
		$typeid=$this->input->post('typeid');
		$petid=$this->input->post('petid');
		$data=$this->rmm->pettype_pet($petid,$typeid);
	}
}
?>