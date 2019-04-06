<?php
class User_model extends CI_Model {

	public function __construct()
	{
		/*parent::__construct();*/
		$this->load->database();
	}

	//会員登録
	public function insert_user($data, $token)
	{
		$insert_data = array(
			'name'         => $data['name'],
			'phonetic'     => $data['phonetic'],
			'nickname'     => $data['nickname'],
			'access_id'    => md5($data['nickname']),
			'year'         => $data['year'],
			'month'        => $data['month'],
			'day'          => $data['day'],
			'age'          => $data['age'],
			/*'password'     => md5($data['password']),*/
			'password'     => $data['password'],
			'postal'       => $data['postal'],
			'prefectures'  => $data['prefectures'],
			'address'      => $data['address'],
			'email'        => $data['email'],
			'introduction' => $data['introduction'],
			'token'        => $token,
			'create_data'  => date("Y/m/d H:i:s"),
		);
		$this->db->insert('users', $insert_data);
	}

	//URLで送信されたtokenで認証を行い本登録する
	public function main_registration($token)
	{
		$this->db->where('token', $token);
		$this->db->where('flag', '0');
		$query = $this->db->get('users');

		if($query->num_rows() > 0)
		{
			$flag = array('flag' => '1');
			$this->db->where('token', $token);
			$this->db->update('users', $flag);

			echo "本登録が完了しました。";
		}
		else
		{
			echo "既に本登録が完了しています。";
		}
	}

	//ログイン認証
	public function authent($data)
	{
		$this->db->where('email', $data['email']); 
		/*後日MD5に戻す*/
		/*$this->db->where('password', md5($data['password']));*/
		$this->db->where('password', $data['password']);
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

	//パスワード忘れた人がパスワードをアップデート
	public function update_password($data)
	{
		$this->db->where('email', $data['email']);
		$update_data = array(
				'password' => md5($data['restpassword']),
				'update_data' => date("Y/m/d H:i:s")
			);
		$query = $this->db->get('users');

		if($query->num_rows() > 0)
		{
			$this->db->where('email', $data['email']);
			$this->db->update('users', $update_data);
		}
		else
		{
			return false;
		}
	}

	//ユーザーと出品一覧情報
	public function get_user_product_detail($access_id, $per_page, $offset)
	{
		$this->db->where('users.access_id', $access_id);
		$this->db->join('product', 'users.access_id = product.access_id');
		$this->db->order_by('product.create_data', 'desc');
		$this->db->limit($per_page, $offset);
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
			'name'         => $data['name'],
			'nickname'     => $data['nickname'],
			'year'         => $data['year'],
			'month'        => $data['month'],
			'day'          => $data['day'],
			'age'          => $data['age'],
			'postal'       => $data['postal'],
			'prefectures'  => $data['prefectures'],
			'address'      => $data['address'],
			'introduction' => $data['introduction'],
			'update_data'  => date("Y/m/d H:i:s"),
		);

		$this->db->where('user_id', $user_id);
		$this->db->update('users', $update_data);
	}

	//メルアドとパスワード変更
	public function email_password_update($post, $user_id)
	{
		$update_mail_pass = array(
				'email'       => $post['email'],
				'password'    => md5($post['password_confirmation']),
				'update_data' => date("Y/m/d H:i:s")
			);
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $update_mail_pass);
	}

	//userテーブルから退会処理
	public function users_unsubscribe($user_id)
	{
		$this->db->delete('users', array('user_id' => $user_id));
	}

/********* 管理画面 **********/

	//管理画面用ユーザー情報
	public function admin_get_user_detail($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('users');
		return $query->result_array();
	}

	//管理画面用ユーザーと出品一覧情報
	public function admin_get_user_product_detail($user_id)
	{
		$this->db->where('users.user_id', $user_id);
		$this->db->join('product', 'users.user_id = product.user_id');
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

/********* チェック関数 **********/

	//メールアドレスの有無をチェック
	public function check_email($email)
	{
		$this->db->where('email', $email);
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

	//メールアドレスの重複チェック
	public function check_overlap_email($email)
	{
		$this->db->where('email', $email);
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
