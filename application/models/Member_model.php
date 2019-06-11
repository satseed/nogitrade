<?php
class Member_model extends CI_Model {

	public function __construct()
	{
		//parent::__construct();
		$this->load->database();
	}

	//メンバー取得
	public function get_members()
	{
		return $this->db->get('member')->result_array();
	}

	//レート用メンバー取得
	public function get_late_member()
	{
		$this->db->where('gradu_flag', 0);
		return $this->db->get('member')->result_array();
	}

	//メンバー追加
	public function members_add($data)
	{
		$insert_data = array('name' => $data['member_name']);
		$this->db->insert('member', $insert_data);
	}
}
