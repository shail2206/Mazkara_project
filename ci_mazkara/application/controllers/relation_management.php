<?php
class Relation_management extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('relation_management_m','relation_m');
	}
	public function service_pettype()
	{
		$this->relation_m->service_pettype_f($sid,$ptid);
	}
	public function pettype_pet()
	{
		$this->relation_m->service_pettype_f($ptid,$petid);
	}
}
