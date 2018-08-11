<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller
{ 
	
    function __construct()
    {
		parent::__construct();
	}

    public function index()
    {
		$data['main_content'] = "admin_panel/dashboard";
		$this->load->view('admin_panel/common_file/template',$data);
    }
}