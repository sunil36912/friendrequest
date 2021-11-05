<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(!$this->is_loggedin()){
		$this->load->view('user_login');
		}
		else{
			$this->load->model('User');
					$this->User->showUsers();
		}

	}

	public function login()
	{
		if(!$this->is_loggedin()){

		

	   $this->form_validation->set_rules('email', 'Email', 'required');
       $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[12]');
	   $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	   if ($this->form_validation->run() == FALSE)
                {
					$this->load->view('user_register');     
                }
                else
                {
					
					$email = $this->input->post( 'email') ;
					$password = $this->input->post( 'password') ;
                        $this->load->model('User');
						 $this->User->authenticate($email,$password);

						
                }

		}
		else{
			echo"you r allready logged in";
		}	

	
	}
	public function showUsers()
				{
					if($this->is_loggedin()){
						$this->load->model('User');
						$this->User->showUsers();
					}
					else{
						redirect('UserController/index');
					}
					
				 
					
				}

				

				public function getFriends($id)
				{

					if($this->is_loggedin()){
						//$friend_id = $this->input->post('friend_id');
						$this->load->model('User');
						$this->User->getFriends($id);
					}
					else{
						redirect('UserController/index');
					}
					
				 
					
				}

				public function showFriends()
				{
					if($this->is_loggedin()){
						$this->load->model('User');
						$this->User->showFriends();
					}
					else{
						redirect('UserController/index');
					}
					
				 
					
				}
				public function showRequests()
				{
					if($this->is_loggedin()){
						$this->load->model('User');
						$this->User->showRequests();
					}
					else{
						redirect('UserController/index');
					}
					
				 
					
				}

				public function saveRequset(){
					//$data = $this->input->post();
    // now I can get account and passwd by array index
    $user_id = $this->input->post('user_id');
    $friend_id = $this->input->post('friend_id');
	$status=0;
	$this->db->insert('friends',array('user_one'=>$user_id,'user_two'=>$friend_id,'status'=>$status));
	echo "friend Request Sent";

					
				}

				public function updateRequset(){
					//$data = $this->input->post();
    // now I can get account and passwd by array index
    $user_id = $this->input->post('friend_id');
    $friend_id = $this->input->post('user_id');
	$status=1;
	$id=$this->input->post('id');
	$this->db->where('id', $id);
	
	
	$this->db->update('friends',array('user_one'=>$user_id,'user_two'=>$friend_id,'status'=>$status));
	
	
	echo "friend Request Sent";

					
				}
			
			
				public function logout() {
					$this->session->unset_userdata('id');
					$this->session->unset_userdata('logged_in');
					$this->session->unset_userdata('email');
					$this->session->unset_userdata('name');
					redirect('UserController/index');
				}
	
}
