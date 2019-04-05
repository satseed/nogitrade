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
		$this->load->model('Trade_application_model','trade_app');
	}

	//TOPページ
	public function index()
	{
		$data['log']        = $this->session->userdata('is_login');
		$data['nickname']   = $this->session->userdata('nickname');
		$data['user_id']    = $this->session->userdata('user_id');
		$data['access_id']  = $this->session->userdata('access_id');
		
		//出品商品の最新10件取得
		$data['products'] = $this->product->get_product_new_ten();
		
		$data['title'] = 'NEWデザインTOPページ';

		// キーワード検索
		$str = $this->input->post();
		if(!empty($str))
		{
			$data['sresult'] = $this->product->search($str['search']);
		}

		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}

	//初めての方ページ
	public function first()
	{
		echo "初めての方";
	}

	//会員登録
	public function registration()
	{
		$data['nickname'] = "";
		$data['title']    = '会員登録';
		$data['log']      = $this->session->userdata('is_login');
		$data['year']     = date('Y');
		$this->load->view('header', $data);
		
		if($this->form_validation->run('member') == TRUE)
		{
			exit;
			$data = $this->input->post();

			if($data)
			{
				//確認画面
				$this->load->view('confirm', $data);
				$regist = $this->input->post('regist');

				//確認画面で送信ボタンが押されたら
				if($regist == "1")
				{
					
					$token = sha1(uniqid(rand()));
					$url = "http://sattriomph.xsrv.jp/trade_test/home/regist_comfirm?urltoken=".$token;

$message = <<< EOM
24時間以内に下記のURLをクリックして本登録をお願いします。
{$url}
EOM;
					
					$this->user->insert_user($data, $token);

					$this->load->library('parser');
					$this->email->from('from');
					$this->email->to($data['email']);
					$this->email->subject('仮登録完了のおしらせ');
					$this->email->message($message);
					$this->email->send();

					echo $this->email->print_debugger();

					$this->load->view('regist_comfirm');

					#redirect('home');//ゆくゆくは登録ありがとう画面ページ作成
				}
			}
		}
		else
		{
			$this->load->view('registration');
		}
		$this->load->view('footer');
	}

	//本登録を完了させる
	public function regist_comfirm()
	{
		$token = $this->input->get('urltoken');
		$this->user->main_registration($token);
		#redirect('home');
	}

	//パスワード再設定
	public function forget_password()
	{
		$data['log']      = 0;
		$data['nickname'] = "";
		$data['email']    = "";
		$data['user_id']  = "";
		$data['title']  = "パスワードの再設定";

		if($this->form_validation->run('forget_pass_rest'))
		{
			$post = $this->input->post();
			$update_password_data = array(
					'email'        => $post['restemail'],
					'restpassword' => $post['restpassword'],
				);
			
			$this->user->update_password($update_password_data);

			redirect('home');
		}

		$this->load->view('header', $data);
		$this->load->view('forget_password');
		$this->load->view('footer');
	}

	//退会処理
	public function withdraw($access_id)
	{
		$log        = $this->session->userdata('is_login');
		$user_id    = $this->session->userdata('user_id');
		$access_id  = $this->session->userdata('access_id');

		$users = $this->user->get_user_detail($access_id);

		if($log == 1)
		{
			//userテーブルからユーザー情報を削除
			$this->user->users_unsubscribe($user_id);

			//productテーブルからユーザーIDのデータを削除
			$this->product->product_unsubscribe($user_id);

			//trade_applicationテーブルからユーザーIDに一致したデータを削除
			$this->trade_app->trade_appli_unsubscribe($user_id);

			//セッションを削除
			$this->session->sess_destroy();

			redirect('home');

			$message = <<< EOM
退会処理が完了いたしました。
ご利用ありがとうございました。
EOM;

					$this->email->from('from');
					$this->email->to($users[0]['email']);
					$this->email->subject('退会完了のおしらせ');
					$this->email->message($message);
					$this->email->send();
		}
	}

	/** 各種チェック関数 **/

	//パスワード忘れの時の送信アドレスチェック
	public function _send_email_check($email)
	{
		$mail = $this->user->check_email($email);

		if($mail == FALSE)
		{
			$this->form_validation->set_message('_send_email_check', 'メールアドレスは登録されていません');
			return false;
		}
		else
		{
			return true;
		}
	}

	//メールアドレスの重複を防ぐ
	public function _check_overlap_email($email)
	{
		$mail = $this->user->check_overlap_email($email);

		if($mail == TRUE)
		{
			$this->form_validation->set_message('_check_overlap_email', 'そのメールアドレスはすでに登録されています');
			return false;
		}
		else
		{
			return true;
		}
	}

	//ニックネームの重複を防ぐ
	public function _check_nickname($nickname)
	{
		$name = $this->user->check_nickname($nickname);

		if($name == TRUE)
		{
			$this->form_validation->set_message('_check_nickname', 'そのニックネームはすでに使われています');
			return false;
		}
		else
		{
			return true;
		}
	}

	//メールアドレスが登録されているかチェック
	public function _check_email($restemail)
	{
		$restemail = $this->user->check_email($restemail);

		if($restemail == FALSE)
		{
			$this->form_validation->set_message('_check_email', 'そのメールアドレスは登録されていません。');
			return false;
		}
		else
		{
			return true;
		}
	}

	//入力されたパスワードと確認用のパスワードが合っているかチェック
	public function _check_password_confirmation($password_confirmation)
	{
		$pass_confirm = $this->input->post();

		if($pass_confirm['restpassword'] != $pass_confirm['password_confirmation'])
		{
			$this->form_validation->set_message('_check_password_confirmation', 'パスワードが一致しません');
			return false;
		}
		else
		{
			return true;
		}
	}

}
