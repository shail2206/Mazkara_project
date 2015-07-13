<?php
class Auth extends MY_Controller
{
public function __construct()
	{
		parent::__construct();
		$this->myheader();
		$this->load->model('authm');
	}
	public function myheader()
	{
		$this->load->view('header');
		$this->load->view('navigation');
	}

  public function logout()
	{
	  $this->session->sess_destroy();
	  redirect('auth/login');
	}
  public function login()
	{
	  if(isset($this->session->userdata['loginuser']))
		{
		  //redirect('myblog/index');
		}
		$username = $this->input->post("txt_username");
         $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login_view');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->authm->get_user($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'username' => $username,
                              'loginuser' => TRUE
                         );
                         $this->session->set_userdata($sessiondata);
                         redirect("pet/listpet");
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('auth/login');
                    }
               }
               else
               {
                    redirect('auth/login');
               }
          }
		  $this->footer();
	}
	public function footer()
	{
		$this->load->view('footer');
	}
}