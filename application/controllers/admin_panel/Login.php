<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller
{ 
    function __construct()
    {
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('url'); 
	}

    public function index()
    {
		$sessuser1 = 'admin_session';
		$sessuser = $this->session->userdata($sessuser1); 
		
		if ($sessuser['rememberme'] == 'yes')
		{
		   redirect('admin_panel/dashboard');
		} 
		if(@$type_user_flag == 0)
		{
			$this->load->view('admin_panel/login');
		}
	}
	
	public function check_login()
    {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$rememberme = $_POST['remember'];
		if($password != ''){
			$encript_password = $this->login_model->encryptScript($password);
		}else{
			$encript_password = '';
		}
		
		$check_email_password = $this->login_model->check_email_password($email,$encript_password);
		
		if(!empty($check_email_password)){
			$newdata = array(
			'first name'  => $check_email_password[0]['first name'],
			'last name' =>$check_email_password[0]['last name'],
			'id' =>$check_email_password[0]['admin_id'],
			'email'=> $check_email_password[0]['email'],
			'active'=> 'TRUE',
			'rememberme' => $rememberme
			);
			$this->session->set_userdata('admin_session', $newdata);
			echo '1';
		}else{
			echo '2';
		}
	}
	
}