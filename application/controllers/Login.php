<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
    }
  
	public function index()
	{
		$this->load->view('login/index');
    }
    public function request()
	{
        $request = (object)$this->input->post();
         $collection = $this->database->collection('users');
         $query = $collection->where('password' ,'=',md5($request->inputPassword))
                            ->where('email', '=', $request->inputEmail);

        $result = $query->documents();
        if(count($result)>0){
            foreach($result as $user){
                $this->session->name = $user['firstname'];
                $this->session->user = $user->id();
            }
            redirect('category');
        }
        else{
            redirect('');
        }
        
    }
   
}
?>