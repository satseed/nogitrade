<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session', 'user_agent', 'email'));
		$this->load->model('User_model','user');
		$this->load->model('Product_model','product');
	}

	//TOPページ
	public function index()
	{
/*
		$users = $this->user->get_users();
		var_dump($users);
		exit;
*/
		$data['uid']      = $this->session->userdata('user_id');
		$data['log']      = $this->session->userdata('is_login');
		$data['nickname'] = $this->session->userdata('nickname');
		$data['user_id']  = $this->session->userdata('user_id');
		$data['access_id']  = $this->session->userdata('access_id');
/*
		//キーワード検索
		$str = $this->input->post();
		if($str != null)
		{
			$data['sresult'] = $this->product->search($str['search']);
			var_dump($data['sresult']);
		}
*/
		//出品商品の最新10件取得
		$data['products'] = $this->product->get_product_new_ten();
		
		$data['title'] = 'NEWデザインTOPページ';

		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}
}
