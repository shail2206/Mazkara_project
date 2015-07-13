<?php
class Pettype_Model extends MY_Model
{
	public function create_pettype_m($pettypename)
	{
	       $data = array(
            'pet_type_name' => $pettypename,
			'status' => '1',
			'createdate' => date('Y-m-d')
        );
        $this->db->insert('pet_type',$data);
	}
	public function update_pettype_m($pettypename,$pet_typeid)
	{
		$sql ="Update pet_type set pet_type_name =\"$pettypename\" where id = $pet_typeid";
		$this->db->query($sql);
	}
	public function delete_pettype_m($pettypeid)
	{
		$sql="delete from pet_type where id = $pettypeid";
		$this->db->query($sql);
	}
	public function list_pettype_m()
	{
		  $sql = "select * from pet_type where status = 1";
          $query = $this->db->query($sql);
		  return $result =$query->result_array();
	}
}
?>