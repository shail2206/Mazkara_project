<?php
class Service_Model extends MY_Model
{
	public function create_service_m($servicename)
	{
	       $data = array(
            'service_name' => $servicename,
			'status' => '1',
			'createdate' => date('Y-m-d')
        );
        $this->db->insert('services',$data);
	}
	public function update_service_m($servicename,$sid)
	{
		$sql ="Update services set service_name =\"$servicename\" where id = $sid";
		$this->db->query($sql);
	}
	public function delete_service_m($serviceid)
	{
		$sql="delete from services where id = $serviceid";
		$this->db->query($sql);
	}
	public function list_service_m()
	{
		  $sql = "select * from services where status = 1";
          $query = $this->db->query($sql);
		  return $result =$query->result_array();
	}
}
?>