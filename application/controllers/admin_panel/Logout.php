<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class logout extends CI_Controller
	{
		 function __construct()
		{
			parent::__construct();
			$this->load->model('login_model');
			$this->load->helper('url'); 
		}
		
		public function index()
		{
			$admin_session = $this->session->userdata('admin_session'); 
			if($admin_session['active'] == TRUE)
			{
				$this->session->unset_userdata('admin_session');
				$this->session->unset_userdata('first name');
				$this->session->unset_userdata('last name');
				$this->session->unset_userdata('id');
				$this->session->unset_userdata('email');
				$this->session->unset_userdata('rememberme');
				$this->load->helper('cookie');
				$cookie =  $this->config->item('sess_cookie_name');
				delete_cookie($cookie);
				echo "TRUE";
			}else{
				echo "FALSE";
			}
		}
	}
?>