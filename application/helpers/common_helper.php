<?php
	function is_user_login(){
		$CI = & get_instance();  //get instance, access the CI superobject
  		$userLogin = $CI->session->userdata('user_session');
        if(!empty($userLogin['user_id'])){
			return "1";
		}else{
			return "";
		}
	}
	function content_replace($content){
		$first_content = str_replace('[[', '<', $content);
		$second_content = str_replace(']]', '>', $first_content);
		return $second_content;
	}
	function get_filter_total_all_art($params = array()){
		$CI = get_instance();
        $CI->db->select('*');
        $CI->db->from('artist_art_work');
		$CI->db->join('user','user.user_id = artist_art_work.art_owner_id');
        $CI->db->where('artist_art_work.art_status','active');
        $CI->db->where('artist_art_work.art_approve','2');
		if($params['category'] != ''){
			 $CI->db->where('artist_art_work.art_category',$params['category']);
		}
		if($params['fromprice'] != '' && $params['toprice'] != ''){
			$fromprice = $params['fromprice'];
			$toprice = $params['toprice'];
			$CI->db->where("artist_art_work.art_price BETWEEN $fromprice AND $toprice");
		}
		$CI->db->order_by('artist_art_work.art_id','desc'); 
		return $res = $CI->db->get()->result_array();
	}
	function send_email_contact_admin($email_temp_title,$cdata,$pass = '')
	{
		$CI = get_instance();
		$CI->load->model('email_template_model');
		$fields = array('email_template_id','email_template_title','email_subject','from_email','content');
		$arr = array('email_template_title'=>$email_temp_title);
		$email_templates = $CI->email_template_model->getemail_template($fields,$arr,'','=','','','');
		if($email_templates)    
		{
		$content = $email_templates[0]['content'];
		$temp_name = $email_templates[0]['email_template_title'];
		$subject = $email_templates[0]['email_subject'];
		$from = $email_templates[0]['from_email'];
			switch($temp_name)
			{
				case 'Contact Email':
					$get_value = array ('/{{name}}/','/{{artname}}/','/{{email}}/','/{{mobile}}/','/{{message}}/'); 
					$set_value = array ($cdata['name'], $cdata['art_name'], $cdata['email'], $cdata['phone'], $cdata['message']); 
					$msg = preg_replace ($get_value, $set_value, $content);
					$cdata['main_content'] = $msg;
					$msg_body = $CI->load->view('admin_panel/email_template/email_temp',$cdata, TRUE);
					break; 
				default :
				   break;
			}           
			$config['protocol'] = 'sendemail';
			$config['mailpath'] = '/var/spool/mqueue';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['smtp_port'] = '10000';
			$config['smtp_host'] = 'webmin@stratus.agentleadspro.com';
			$config['smtp_user'] = 'topsint';  
			$config['smtp_pass'] = 'aditya';  
			$config['mailtype']='html';
			$config['newline']="\r\n";
			$CI->load->library('email', $config);
			$CI->email->initialize($config);
			$CI->email->from($from,'Creative');
			$CI->email->to($cdata['email']);
			$CI->email->cc('tushar@diestechnology.com');
			$CI->email->subject($subject);
			$CI->email->message($msg_body);	
			if($CI->email->send()){
				return "1";
			}else{
				return "0";
			}
		}
	}
?>