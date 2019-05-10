<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Admin_model','admin');
		$this->load->model('Member_model','member');
		$this->load->model('User_model','user');
		$this->load->model('Product_model','product');
	}

	//メンバー一覧
	public function index()
	{
		$data['members'] = $this->member->get_members();

		$data['title'] = 'メンバー一覧';
		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/members', $data);
		$this->load->view('admin/common/table_footer');
	}

	public function member_add()
	{
		$post = $this->input->post();

		if(!empty($post))
		{
			$this->member->members_add($post);
		}

		$data['title'] = 'メンバー追加';
		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/member_add', $data);
		$this->load->view('admin/common/table_footer');
	}
}
