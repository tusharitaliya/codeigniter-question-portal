<?php
/* 
	@Description: Login Model 
	@Author: tushar italiya
*/

class login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
		$this->table_name = 'admin_user';
    }
	public function check_email_password($eamil,$password)
    {
		$this->db->select();
        $this->db->from($this->table_name);
        $this->db->where('email',$eamil);
        $this->db->where('password',$password);
        $query = $this->db->get();
        return $res = $query->result_array();
	} 
	function encryptScript($string)
	{ 
		$key = $this->config->item('encryption_key');
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
		return $encrypted;
	}
	
	function decryptScript($string){
		$key = $this->config->item('encryption_key');
		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		return $decrypted;
	}
}