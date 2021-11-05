<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends MY_Controller {

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

        
		$this->load->view('user_register');
        }
        else{
            echo "logout first";
        }

	}
    public function register()

	{
        if(!$this->is_loggedin()){

        
        $this->load->helper('file');
       
        $this->load->helper('url'); 
        $this->form_validation->set_rules('name', 'Name', 'required');
	
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('about', 'About', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('hobbies[]', 'Hobbies', 'required');
        $this->form_validation->set_rules('file', '', 'callback_file_check');
       $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[12]');
	   $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	   if ($this->form_validation->run() == FALSE)
                {
					$this->load->view('user_register');     
                }
                else
                {
                  
                    $uploadedFile="";
                    //upload configuration
                $config['upload_path']   = 'uploads/files/';
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = 1024;
                $this->load->library('upload', $config);
                //upload file to directory
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                       
                        $uploadedFile = $uploadData['file_name'];
                        
                    }
					$email = $this->input->post( 'email') ;
                    $name = $this->input->post( 'name') ;
                    $department = $this->input->post( 'department') ;
                    $about = $this->input->post( 'about') ;
                    //$hobbies=$this->input->post('hobbies');
                    $hobbies=implode(',',$this->input->post('hobbies'));
                    //$file=$this->input->post('file');
					$password = $this->input->post( 'password') ;

                        $this->load->model('User');
						$this->User->signup(array(
                            'email'=>$email,
                            'name'=>$name,
                            'department'=>$department,
                            'about'=>$about,
                            'hobbies'=>$hobbies,
                            'profile_pic'=>$uploadedFile,
                            'password'=>$password)
                        );


                             
                }
            }
            else{
                echo "you are logged in first logout";
            }

	}

    public function file_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }
}
