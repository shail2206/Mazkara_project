<?php
class Pet_model extends MY_Model
{
	public function create_pet_m($petname,$pettype)
	{
		$data = array(
            'name' => $petname,
			'owner' => '1',
			'createdate' => date('Y-m-d')
        );
        $this->db->insert('pets',$data);

		$petid=$this->db->insert_id();
		$data = array(
            'petid' => $petid,
			'pettypeid' => $pettype
        );
        $this->db->insert('pet_pettype',$data);
	}
	public function update_pet_m($petname,$petid)
	{
		$sql ="Update pets set name =\"$petname\" where id = $petid";
		$this->db->query($sql);
	}
	public function delete_pet_m($petid)
	{
		$sql="delete from pets where id = $petid";
		$this->db->query($sql);
	}
	public function list_pet_m()
	{
		  $sql = "select * from pets";
          $query = $this->db->query($sql);
		  return $result =$query->result_array();
	}
}
?>