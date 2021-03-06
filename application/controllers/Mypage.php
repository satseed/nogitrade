<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('form_validation', 'session', 'user_agent', 'pagination'));
        $this->load->model('User_model','user');
        $this->load->model('Product_model','product');
        $this->load->model('Trade_application_model','trade');
    }


    //マイページ
    public function index($access_id, $param = 0)
    {
        if($this->session->userdata('is_login') == 1)
        {
            $data['log']       = $this->session->userdata('is_login');
            $data['nickname']  = $this->session->userdata('nickname');
            $data['access_id'] = $this->session->userdata('access_id');
            $data['user_id']   = $this->session->userdata('user_id');
            $data['title']     = "${data['nickname']}さんのページ";

            // ログイン中のIDと違うIDが入力されたらhomeに飛ばす
            if($access_id != $data['access_id'])
            {
                redirect('home');
            }

            // ページャーの作成
            $per_page             = 10;
            $offset               = $param;

            // ユーザーの出品リストを件数取得
            $data['count_usd']    = count($this->product->get_user_product_list($data['access_id']));

            // mypageでユーザー情報と出品一覧を10件ずつを取得
            $detail = $this->user->get_user_product_detail($data['access_id'], $per_page, $offset);

            // 取引商品名一覧の取得
            $data['trade_lists'] = $this->trade->trade_list($data['user_id'], $per_page, $offset);

            // トレード依頼商品名一覧の取得
            $data['trade_requests'] = $this->trade->request_trade($data['user_id'], $per_page, $offset);

            // トレード希望者の取引件数の表示
            $data['trade_count'] = count($data['trade_lists']);

            // ページャーの設定
            $config['base_url']   = 'http://sattriomph.xsrv.jp/tredia_test/mypage/'.$data['access_id'].'/';
            $config['per_page']   = $per_page;
            $config['num_links']  = 5;
            $config['first_link'] = '最初';
            $config['first_tag_open'] = '<div>';
            $config['first_tag_close'] = '</div>';
            $config['last_link'] = '最後';

            // データ別にページャーを作る
            if($detail)
            {
                $config['total_rows'] = $data['count_usd'];
                $this->pagination->initialize($config);
                $data['u'] = $this->pagination->create_links();
            }

            if($data['trade_lists'])
            {
                $config['total_rows'] = $data['trade_count'];
                $this->pagination->initialize($config);
                $data['tl'] = $this->pagination->create_links();
            }

            //出品データがあるときは配列に入れる
            if(!empty($detail))
            {
                $user_product_data['count'] = count($detail);

                foreach ($detail as $key => $value)
                {
                    $user_product_data['seller']       = $value['nickname'];
                    $user_product_data['prefectures']  = $value['prefectures'];
                    $user_product_data['introduction'] = $value['introduction'];
                    $user_product_data['lists'][]      = array(
                        'product_id'   => $value['product_id'],
                        'product_name' => $value['product_name'],
                        'flag'         => $value['flag'],
                    );
                }
            }
            else
            {
                $user_product_data['lists'] = array();
                $data['count_usd']          = 0;

                $user_data = $this->user->get_user_detail($data['access_id']);

                $user_product_data['seller']       = $data['nickname'];
                $user_product_data['prefectures']  = $user_data[0]['prefectures'];
                $user_product_data['introduction'] = $user_data[0]['introduction'];
            }
        }
        else
        {
            redirect('home');
        }
        
        $this->load->view('header', $data);
        $this->load->view('mypage', $user_product_data);
        $this->load->view('footer');
    }

    public function user_product_lists($access_id)
    {
        //出品者の情報と商品一覧（ログインしているユーザーではない）
        $product_lists = $this->user->get_user_product_detail($access_id);
        $data['count'] = count($product_lists);
    
        foreach ($product_lists as $p_lists) 
        {
            $data['seller']       = $p_lists['nickname'];
            $data['prefectures']  = $p_lists['prefectures'];
            $data['introduction'] = $p_lists['introduction'];
            $data['lists'][] = array(
                    'product_id'   => $p_lists['product_id'],
                    'product_name' => $p_lists['product_name'],
                    'description'  => $p_lists['description'],
                    'img-1'        => $p_lists['img-1'],
                    'img-2'        => $p_lists['img-2'],
                    'img-3'        => $p_lists['img-3'],
                    'img-4'        => $p_lists['img-4'],
                    'conditions'   => $p_lists['conditions'],
                    'preservation' => $p_lists['preservation'],
                    'product_id'   => $p_lists['product_id'],
                );
        }
        //ログインユーザー情報
        $data['log']       = $this->session->userdata('is_login');
        $data['nickname']  = $this->session->userdata('nickname');
        $data['access_id'] = $this->session->userdata('access_id');
        $data['user_id']   = $this->session->userdata('user_id');
        $data['title']     = "${data['seller']}さんの出品一覧";

        $this->load->view('header', $data);
        $this->load->view('mypage', $data);
        $this->load->view('footer');   
    }

    //プロフィール詳細と変更
    public function profile($access_id)
    {
        if($this->session->userdata('is_login') == 1)
        {
            $data['profile'] = $this->user->get_user_detail($access_id);

            if($this->input->post('regist') == 1)
            {
                $user_prof = $this->input->post();
                $this->user->user_update($user_prof, $data['user_id']);
                redirect('home');
            }

            $data['log']       = $this->session->userdata('is_login');
            $data['nickname']  = $this->session->userdata('nickname');
            $data['access_id'] = $this->session->userdata('access_id');
            $data['title'] = "プロフィール";

            $this->load->view('header', $data);
            $this->load->view('profile', $data);
            $this->load->view('footer');
        }
    }

    //メールアドレスとパスワード変更
    public function email_password($access_id)
    {   
        $data['log']       = $this->session->userdata('is_login');
        $data['nickname']  = $this->session->userdata('nickname');
        $data['access_id'] = $this->session->userdata('access_id');

        if($this->session->userdata('is_login') == 1)
        {

            $data['user_mail_pass'] = $this->user->get_user_detail($access_id);

            if($this->form_validation->run('email_pass') == TRUE)
            {
                $post = $this->input->post();
                $this->user->email_password_update($post, $user_id);
                redirect('home');
            }
        }

        $data['title'] = "メールアドレス・パスワード変更";

        $this->load->view('header', $data);
        $this->load->view('email_password', $data);
        $this->load->view('footer');
    }

    //パスワード変更の際に現在のパスワードが合っているかチェック
    public function _password_check($password)
    {
        $pass = $this->user->check_password($password);

        if($pass != TRUE)
        {
            $this->form_validation->set_message('_password_check', 'パスワードが違います');
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

        if($pass_confirm['password'] != $pass_confirm['password_confirmation'])
        {
            $this->form_validation->set_message('_check_password_password_confirmation', 'パスワードが一致しません');
            return false;
        }
        else
        {
            return true;
        }
    }
}
