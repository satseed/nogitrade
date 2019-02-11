<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->model('User_model','user');
	}

	//ログイン
	public function index()
	{
		if($this->form_validation->run('uslogin') == TRUE)
		{
			$data       = $this->input->post();
			$logindata  = $this->user->authent($data);
			
			if($logindata == TRUE)
			{
				$login_data = array(
					'user_id'    => $logindata[0]['user_id'],
					'access_id'  => $logindata[0]['access_id'],
					'nickname'   => $logindata[0]['nickname'],
					'email'      => $data['email'],
					'is_login'   => '1'
				);
				$this->session->set_userdata($login_data);
				redirect('home');
			}
			else
			{
				$data['error'] = "IDかパスワードが違います。";
			}
		}

		$data['log']   = "";
		$data['nickname'] = "";
		$data['title'] = 'ログイン';
		$this->load->view('header', $data);
		$this->load->view('login');
		$this->load->view('footer');
	}

	//ログアウト
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}
