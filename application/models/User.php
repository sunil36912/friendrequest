<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    public function __construct() {
        parent::__construct();
       $this->userTbl = 'users';
    }
   public function authenticate($email,$password)
   {
      $this->db->select('id,email,name');
$this->db->where("(email = '$email') 
                   AND password = '$password'");
$user = $this->db->get('users');

$user_details=$user->row();
print_r($user_details);
if($user->row()>0){
   if($user_details){
      $this->session->set_userdata(array(
         'id' => $user_details->id,
         'email' => $user_details->email,
         'name'=>$user_details->name,
         'logged_in' => $_SERVER['REQUEST_TIME']
      ));
      $this->session->set_flashdata('success', 'User SignedIN Successfully');
      redirect('UserController/showUsers');  
   }
   else{
      echo "crendientails not matched";
   }
}
//var_dump($user_details->email);
     
      
         
   }
   public function signup($data=array())
   {
    return $this->db->insert('users',$data);
    $this->session->set_flashdata('success', 'User Registerd Successfully');
    redirect('UserController/index');  
   
     // $result= $this->db->where(array('email' => $email,'password'=>$password))->get('users');
      
   }


   public function getFriends($id)
   {
      $this->db->select('*');    
$this->db->from('users');

$this->db->join('friends', 'users.id = friends.user_two');
$this->db->where('friends.user_one', $id);
$this->db->where('friends.status', 1);
$data = $this->db->get();

    
   $this->load->view('all_friends',['data'=>$data]); 
   
       	
   }


   public function showFriends()
   {
      $this->db->select('*');    
$this->db->from('users');

$this->db->join('friends', 'users.id = friends.user_two');
$this->db->where('friends.user_one', $this->session->userdata('id'));
$this->db->where('friends.status', 1);
$data = $this->db->get();

    
   $this->load->view('all_friends',['data'=>$data]); 
   
       	
   }
   public function showUsers(){
      $this->db->select('*');    
$this->db->from('users');
$this->db->where('users.id<>', $this->session->userdata('id'));
$data = $this->db->get();

$this->load->view('show_users',['data'=>$data]); 
   }

   public function showRequests(){
      $this->db->select('*');    
$this->db->from('users');

$this->db->join('friends', 'users.id = friends.user_one');
$this->db->where('friends.user_two', $this->session->userdata('id'));
$this->db->where('friends.status', 0);
$data = $this->db->get();
print_r($data->row());

    
   $this->load->view('accept_users',['data'=>$data]);
   }
    
}
?>