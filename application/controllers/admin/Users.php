<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// 2021/12/15
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Admin_model','admin');
		$this->load->model('User_model','user');
		$this->load->model('Product_model','product');
	}

	//ユーザー情報
	public function index()
	{
		$user_data['users'] = $this->user->get_users();

		$header['title'] = 'ユーザー情報';
		$this->load->view('admin/common/header', $header);
		$this->load->view('admin/users', $user_data);
		$this->load->view('admin/common/table_footer');
	}

	//ユーザー詳細
	public function detail($user_id)
	{
		$details = $this->user->admin_get_user_product_detail($user_id);
#var_dump($details);exit;
		if(!empty($details))
		{
			foreach($details as $detail)
			{
				$user_data['user']['user_id']      = $detail['user_id'];
				$user_data['user']['name']         = $detail['name'];
				$user_data['user']['nickname']     = $detail['nickname'];
				$user_data['user']['prefectures']  = $detail['prefectures'];
				$user_data['user']['email']        = $detail['email'];
				$user_data['user']['introduction'] = $detail['introduction'];
				$user_data['user']['create_data'] = date('Y年n月d日', strtotime($detail['create_data']));

				if(isset($detail['product_id']))
				{	
					$user_data['products'][] = array(
						'product_id'   => $detail['product_id'],
						'product_name' => $detail['product_name'],
						'description'  => $detail['description'],
						'img-1'        => $detail['img-1'],
						'img-2'        => $detail['img-2'],
						'img-3'        => $detail['img-3'],
						'img-4'        => $detail['img-4'],
						'conditions'   => $detail['conditions'],
						'preservation' => $detail['preservation'],
						'create_data'  => date('Y年n月d日', strtotime($detail['create_data'])),
					);
				}
			}
		}
		else
		{
			$details = $this->user->admin_get_user_detail($user_id);
			foreach($details as $detail)
			{
				$user_data['user']['user_id']      = $detail['user_id'];
				$user_data['user']['name']         = $detail['name'];
				$user_data['user']['nickname']     = $detail['nickname'];
				$user_data['user']['prefectures']  = $detail['prefectures'];
				$user_data['user']['email']        = $detail['email'];
				$user_data['user']['introduction'] = $detail['introduction'];
				$user_data['user']['create_data'] = date('Y年n月d日', strtotime($detail['create_data']));
			}
		}
	 
		$header['title'] = 'ユーザー詳細';
		$this->load->view('admin/common/header', $header);
		$this->load->view('admin/user_datail', $user_data);
		$this->load->view('admin/common/table_footer');
	}

	//ユーザーを本登録にする
	public function official_registration($user_id)
	{
		$this->user->off_registration($user_id);
		redirect('admin/users');
	}

	//ユーザーアカウントの停止
	public function stop_user($user_id)
	{
		$this->user->stop_user($user_id);
		redirect('admin/users/');
	}

	//ユーザーを削除
	public function delete_user($user_id)
	{
		$this->user->user_delete($user_id);
		redirect('admin/users/');
	}
}
