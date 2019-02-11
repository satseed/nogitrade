<?php
	class Admin_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//ログイン認証
	public function certification($data)
	{
		if($data)
		{
			$this->db->where('login_id', $data['loginid']);
			$this->db->where('login_pw', $data['loginpw']);
			$query = $this->db->get('admin');
			
			if($query->num_rows() == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

}
