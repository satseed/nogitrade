<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Admin_model','admin');
		$this->load->model('User_model','user');
	}

	//管理画面TOP
	public function index()
	{
		$login_id = $this->session->all_userdata();
		if($login_id['is_login'] == 1)
		{
			$header['title'] = 'テスト管理画面';
			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/index');
			$this->load->view('admin/common/footer');
		}
		else
		{
			redirect('admin/login');
		}
	}

	//ユーザー情報
	public function users()
	{
		$user_data['users'] = $this->user->get_users();

		$header['title'] = 'ユーザー情報';
		$this->load->view('admin/common/header', $header);
		$this->load->view('admin/users', $user_data);
		$this->load->view('admin/common/table_footer');
	}
}
