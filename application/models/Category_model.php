<?php
	class Category_model extends CI_Model {

	public function __construct()
	{
		#parent::__construct();
		$this->load->database();
	}

	//カテゴリーを取得
	public function get_category()
	{
		$query = $this->db->get('category');
		return $query->result_array();
	}

	//セカンドカテゴリーを取得
	public function get_sec_category()
	{
		$query = $this->db->get('sec_category');
		return $query->result_array();
	}

	//サードカテゴリーを取得
	public function get_thi_category()
	{
		$query = $this->db->get('thi_category');
		return $query->result_array();
	}

	//登録されている各グループのメンバーを取得
	public function get_member()
	{
		return $this->db->get('member')->result_array();
	}

	//ログイン認証
	public function authent($data)
	{
		$this->db->select('user_id');
		$this->db->select('access_id');
		$this->db->select('nickname');
		$this->db->where('email', $data['email']); 
		$this->db->where('password', md5($data['password'])); 
		$query = $this->db->get('users');

		if($query->num_rows() > 0)
		{
			return $query->result_array	();
		}
		else
		{
			return false;
		}
	}

	//全ユーザー取得
	public function get_users()
	{
		$query =  $this->db->get('users');
		return $query->result_array();
	}

	//ユーザー情報
	public function get_user_detail($access_id)
	{
		$this->db->where('access_id', $access_id);
		$query = $this->db->get('users');
		return $query->result_array();
	}

	//ユーザーと出品一覧情報
	public function get_user_product_detail($access_id)
	{
		$this->db->where('users.access_id', $access_id);
		$this->db->join('product', 'users.access_id = product.access_id');
		$query = $this->db->get('users');

		//商品を出品していないユーザーはfalseを返す
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	//ユーザー情報の変更
	public function user_update($data, $user_id)
	{
		$update_data = array(
			'name' => $data['name'],
			'nickname' => $data['nickname'],
			'year' => $data['year'],
			'month' => $data['month'],
			'day' => $data['day'],
			'age' => $data['age'],
			'postal' => $data['postal'],
			'prefectures' => $data['prefectures'],
			'address' => $data['address'],
			'introduction' => $data['introduction'],
			'update_data' => date("Y/m/d H:i:s"),
		);

		$this->db->where('user_id', $user_id);
		$this->db->update('users', $update_data);
	}

	//メルアドとパスワード変更
	public function email_password_update($post, $user_id)
	{
		$update_mail_pass = array(
				'email' => $post['email'],
				'password' => md5($post['password_confirmation']),
				'update_data' => date("Y/m/d H:i:s")
			);
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $update_mail_pass);
	}

	//ニックネームの重複チェック
	public function check_nickname($nickname)
	{
		$this->db->where('nickname', $nickname);
		$query = $this->db->get('users');

		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//現在登録されているパスワードが合っているかチェック
	public function check_password($password)
	{
		$this->db->where('password', md5($password));
		$query = $this->db->get('users');

		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
