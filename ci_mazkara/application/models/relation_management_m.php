<?php
class Relation_management_m extends MY_Model
{
	public function service_type($sid,$typeid)
	{
		$select ="select id from pettype_service where pettypeid= $typeid";
         $query = $this->db->query($select);
		if($query->num_rows>0)
		{
			$sql ="update pettype_service set serviceid = $sid where pettypeid= $typeid";
		}
		else
		{
			$sql = "Insert into pettype_service (pettypeid,serviceid) values($typeid,$sid)";
		}
	  $this->db->query($sql);
	}
	public function pettype_pet($petid,$typeid)
	{
		$select ="select id from pet_pettype where petid= $petid";
         $query = $this->db->query($select);
		if($query->num_rows>0)
		{
			$sql ="update pet_pettype set pettypeid = $typeid where petid= $petid";
		}
		else
		{
			$sql = "Insert into pet_pettype (petid,pettypeid) values($petid,$typeid)";
		}
	  $this->db->query($sql);
	}
}
?>