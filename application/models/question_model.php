<?php
class question_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
		$this->table_name = 'question';
		$this->admin_user_table_name = 'admin_user';
	}
	
	public function get_all_question(){
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->order_by('question_id','desc');
		return $this->db->get()->result_array();
	}
	
	public function insert_question($data){
		$this->db->insert($this->table_name,$data);
		return $this->db->insert_id();
	}
	
	public function get_question($limit,$start){
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->limit($limit,$start);
		return $this->db->get()->result_array();
	}
	
	public function get_total_question(){
		$this->db->select('*');
		$this->db->from($this->table_name);
		return $this->db->get()->result_array();
	}
}