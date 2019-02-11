<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Admin_model','admin');
	}

	//ログイン
	public function index()
	{
		if($this->form_validation->run('adlogin') == TRUE)
		{
			$data = $this->input->post();
			$logindata = $this->admin->certification($data);
			$login_data = array(
							'login_id' => $data['loginid'],
							'is_login' => '1'
			)			;
			$this->session->set_userdata($login_data);
			redirect('admin');
		}

		$header['title'] = 'ログイン';
		$this->load->view('admin/common/login_header', $header);
		$this->load->view('admin/login');
		$this->load->view('admin/common/footer');
	}

	//ログアウト
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
