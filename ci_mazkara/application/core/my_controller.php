<?php
class MY_Controller extends CI_Controller
{
	public function checkauth()
	{
	  if(isset($this->session->userdata['loginuser']))
		{
		  return true;
		}
		else
		{
			redirect('auth/login');
		}
	}
}
?>