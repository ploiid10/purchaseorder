<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct() {
        
    header('Access-Control-Allow-Origin: *'); 
		parent::__construct();
	}

	public function index()
	{
        $this->template->layout('user/index');
    }

    public function fetchAll(){
        $collection = $this->database->collection('users');
        $users = $collection->documents();
        $data = array();
        foreach($users as $user){
            $data[] = array(
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'id' => $user->id()
            );
        }
      echo json_encode(array("data" => $data));
    }
   
    public function save(){
        $user  = (object)$this->input->post();
        $data = array(
            "firstname" => $user->firstname,
            "lastname" => $user->lastname,
            "password" => md5($user->password),
            "email" => $user->email,
        );
        $collection = $this->database->collection('users');
        $document = $collection->newDocument();
        $document->create($data);
        echo json_encode(array('data' => true));        
    }   
    public function logout(){
        $this->session->sess_destroy();
        redirect('');
    }


}
?>