<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('form_validation', 'session', 'user_agent', 'email', 'pagination'));
        $this->load->model('Product_model','product');
        $this->load->model('User_model','user');
        $this->load->model('Category_model','category');
        $this->load->model('Trade_application_model','trade_app');
        $this->load->model('Pose_category_model','pose');
    }

    //商品登録
    public function index()
    {
        if($this->session->userdata('is_login') == 1)
        {
            $data['log']        = $this->session->userdata('is_login');
            $data['nickname']   = $this->session->userdata('nickname');
            $data['access_id']  = $this->session->userdata('access_id');
            $data['user_id']    = $this->session->userdata('user_id');
            $data['title']      = "${data['nickname']}さんのページ";

            $data['pose'] = $this->pose->get_pose();
            $member       = $this->category->get_member();

            foreach ($member as $key => $mem) {
                $data['member'][] = array(
                        'member_id' => $mem['member_id'],
                        'name'      => $mem['name']
                    );
            }

            if($this->form_validation->run('product') == TRUE)
            {
                $post = $this->input->post();

                $config = array(
                    'upload_path'   => './images/',
                    'allowed_types' => 'gif|jpg|jpeg|png',
                    'max_size'      => '1000',
                    'max_width'     => '',
                    'max_height'    => '',
                );

                $this->load->library('upload');
            
                $files = $_FILES;
                #for ($i=0; $i < 4; $i++)
                for ($i=0; $i < 1; $i++)
                { 
                    $_FILES['userfile']['name']     = $files['userfile']['name'][$i];
                    $_FILES['userfile']['type']     = $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error']    = $files['userfile']['error'][$i];
                    $_FILES['userfile']['size']     = $files['userfile']['size'][$i];

                    $config['file_name'] = $files['userfile']['name'][$i];

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload())
                    {
                        $upload_data = array('upload_data' => $this->upload->data());
                        //$this->load->view('product_insert_test_success');
                        $this->product->insert_product($post, $data, $_FILES);
                        redirect('product/product_insert_test_success');
                    }
                    else
                    {
                        $error = array('error' => $this->upload->display_errors('<p>', '</p>'));
                        var_dump($error);
                        exit;
                        $this->load->view('product_insert_test_failer', $error);
                    }
                }
                //$this->load->view('product_insert_test_success');
            }
            $data['title'] = '商品登録';
            $this->load->view('header', $data);
            $this->load->view('product_insert', $data);
            $this->load->view('footer');
        }
        else
        {
            redirect('home');
        }
    }

    public function product_insert_test_success()
    {
        if($this->session->userdata('is_login') == 1)
        {
            $data['log']        = $this->session->userdata('is_login');
            $data['nickname']   = $this->session->userdata('nickname');
            $data['access_id']  = $this->session->userdata('access_id');
            $data['user_id']    = $this->session->userdata('user_id');
            $data['title']      = "商品登録";
            $this->load->view('header', $data);
            $this->load->view('product_insert_test_success');
            $this->load->view('footer');
        }
    }

    // 全商品取得
    public function all_product_list($param = 0)
    {
        if($this->session->userdata('is_login') == 1)
        {
            $data['log']       = $this->session->userdata('is_login');
            $data['nickname']  = $this->session->userdata('nickname');
            $data['access_id'] = $this->session->userdata('access_id');
            $data['user_id']   = $this->session->userdata('user_id');
        }
        else
        {
            $data['log']       = "";
            $data['nickname']  = "";
        }

        $per_page = 10;
        $offset   = $param;

        $all_count = $this->product->get_all_product_list();
        $data['all_count'] = count($all_count);

        $data['all_lists'] = $this->product->get_ten_product_list($per_page, $offset);

        if(empty($data['all_lists']))
        {
            echo "string";
        }

        $config['base_url']   = 'http://sattriomph.xsrv.jp/tredia_test/product/all_product_list/';
        $config['total_rows'] = $data['all_count'];
        $config['per_page']   = $per_page;
        $config['num_links']  = 5;

        $this->pagination->initialize($config);

        $data['title'] = "商品一覧ページ";

        $this->load->view('header', $data);
        $this->load->view('all_product_list');
        $this->load->view('footer');
    }

    //出品商品の詳細
    public function product_detail($product_id)
    {   
        $user_id = $this->session->userdata('user_id');

        // product_idが無ければhomeにリダイレクト
        if(!isset($product_id))
        {
            redirect('home');
        }

        $product_data = array(
                    'product_id' => $product_id
                );
        $this->session->set_userdata($product_data);

        //商品詳細を配列に格納
        $pro_detail = $this->product->get_product_detail($product_id);

        if(!empty($pro_detail))
        {
            $data['user_name'] = $this->user->get_user_detail($pro_detail[0]['access_id']);
            //$data['from_user_id']      = $data['user_name'][0]['user_id'];

            $data['pro_detail'] = array(
                'access_id'     => $data['user_name'][0]['access_id'],
                'nickname'     => $data['user_name'][0]['nickname'],
                'product_id'   => $pro_detail[0]['product_id'],
                'product_name' => $pro_detail[0]['product_name'],
                'description'  => $pro_detail[0]['description'],
                'img-1'        => 'images/'.$pro_detail[0]['img-1'],
                'img-2'        => $pro_detail[0]['img-2'],
                'img-3'        => $pro_detail[0]['img-3'],
                'img-4'        => $pro_detail[0]['img-4'],
                'conditions'   => $pro_detail[0]['conditions'],
                'preservation' => $pro_detail[0]['preservation'],
                'create_data'  => date('Y年n月j日', strtotime($pro_detail[0]['create_data'])),
            );

            $product_name  = $data['pro_detail']['product_name'];
            $this->session->set_userdata('seller_nickname', $data['pro_detail']['nickname']);
            $data['title'] = "${product_name}";
        }
        else
        {
            show_404();
        }

        //配列の初期化
        $reply_data        = array();
        $data['tr_apps']   = array();
        $trade_application = array();

        //会員・非会員も閲覧可能
        if($this->session->userdata('is_login') == 1)
        {
            $data['log']       = $this->session->userdata('is_login');
            $data['nickname']  = $this->session->userdata('nickname');
            $data['access_id'] = $this->session->userdata('access_id');
            $data['user_id']   = $this->session->userdata('user_id');
            $data['email']     = $this->session->userdata('email');

/*****出品者側のやりとり*****/

            /*  
             *  トレード内容を取得するためのtrade_noを取得
             */
            $trade_no = $this->trade_app->get_trade_id($product_id);

            /*
             * trade_noがあればトレード内容を取得
             * 無ければ空の配列を返す
             *
             */
            if(!empty($trade_no))
            {
                foreach ($trade_no as $key => $tn) {
                    $trade_applications[] = $this->trade_app->trade_data($trade_no[$key]['trade_no']);
                }
            }

            if(!empty($trade_applications))
            {
                //$data['trades'][$trade_application[0]['trade_no']] = $trade_application;

                /* トレード内容を時系列順に取得してトレードID毎の生成 */
                foreach ($trade_applications as $trade_application) {
                    foreach($trade_application as $ta)
                    {
                        $data['tr_apps'][$ta['trade_no']][] = $ta;
                    }
                }

                // 希望者の名前
                $data['appliciant_name'] = $data['tr_apps'][$ta['trade_no']][0]['from_name'];
            }
            else
            {
                $data['appliciant_name'] = "";
            }

/*****希望者側のやりとり*****/

            if($data['nickname'] == $data['appliciant_name'])
            {
                $wish_trade_no = $this->trade_app->get_wish_trade_id($product_id, $data['user_id']);

                /*
                 * trade_noがあればトレード内容を取得
                 * 無ければ空の配列を返す
                 *
                 */
                if(!empty($wish_trade_no))
                {
                    foreach ($wish_trade_no as $key => $tn) {
                        $wish_trade_applications[] = $this->trade_app->trade_data($wish_trade_no[$key]['trade_no']);
                    }
                }

                if(!empty($wish_trade_applications))
                {
                    //$data['trades'][$trade_application[0]['trade_no']] = $trade_application;

                    /* トレード内容を時系列順に取得してトレードID毎の生成 */
                    foreach ($wish_trade_applications as $wish_trade_application) {
                        foreach($wish_trade_application as $wta)
                        {
                            $data['wish_tr_apps'][$wta['trade_no']][] = $wta;
                        }
                    }
                }
            }

/*****トレードやりとり*****/

            /* 
             * トレード申し込み処理 
             * 希望者から最初に申し込み
             *
             */
            if($this->form_validation->run('trade') == TRUE)
            {
                $trade = $this->input->post();

                $trade_data = array(
                        'trade_no'         => rand(),
                        'product_id'       => $trade['product_id'],
                        'receiver_user_id' => $data['user_name'][0]['user_id'],
                        'from_user_id'     => $data['user_id'],
                        'from_name'        => $trade['nickname'],
                        'from_email'       => $trade['email'],
                        'from_condition'   => $trade['condition'],
                        'flag'             => '1',
                        'create_data'      => date("Y/m/d H:i:s"),
                    );

                $this->trade_app->insert_trade($trade_data);
                $this->product->trade_up_flag($trade_data['product_id']);

                $mail['email']     = $trade['email'];
                $mail['nickname']  = $trade['nickname'];
                $mail['condition'] = $trade['condition'];
                $mail['url']       = "http://sattriomph.xsrv.jp/trade_test/product/product_detail/".$product_id;
                $mail['title']     = $product_name;

                $this->load->library('parser');
                //メッセージファイルは/views/trade_mail.php
                $message = $this->parser->parse('trade_mail', $mail, TRUE);

                $this->email->from($trade['nickname']);
                $this->email->to($data['user_name'][0]['email']);
                $this->email->subject('トレードの問い合わせ');
                $this->email->message($message);
                $this->email->send();

                echo $this->email->print_debugger();
            }
        }
        else
        {
            $data['log']      = 0;
            $data['nickname'] = "";
            $data['email']    = "";
            $data['user_id']  = "";
        }


        $this->load->view('header', $data);
        $this->load->view('product_detail', $data);
        /*
        if($this->agent->is_mobile())
        {
            $this->load->view('sp/product_detail', $data);
        }
        else
        {
            $this->load->view('product_detail', $data);
        }
        */
        $this->load->view('footer');
    }

    //返信のやり取り
    /*
        修正が必要
        返信の際は相手のIDでやり取りの方がいいはず
        今の仕様は商品IDだけどこのままだと最初に申し込んだ人に返信が行ってしまうから
    */
    public function reply($product_id, $from_user_id, $trade_no)
    {
        if($this->session->userdata('is_login') == 1)
        {
            //ログインユーザーのセッション
            $data['log']       = $this->session->userdata('is_login');
            $data['nickname']  = $this->session->userdata('nickname');
            $data['access_id'] = $this->session->userdata('access_id');
            $data['user_id']   = $this->session->userdata('user_id');
            $data['email']     = $this->session->userdata('email');

            $replay_user_data = $this->trade_app->get_user_reply_data($from_user_id, $product_id);

            //出品者から依頼者への返信データ
            $data['receiver_user_id'] = $replay_user_data[0]['receiver_user_id'];
            $data['from_user_id']     = $replay_user_data[0]['from_user_id'];
            $data['from_name']        = $replay_user_data[0]['from_name'];
            $data['from_email']       = $replay_user_data[0]['from_email'];
            $data['trade_no']         = $replay_user_data[0]['trade_no'];

            //依頼者から出品者への返信名前
            $data['seller_nickname'] = $this->session->userdata('seller_nickname');

            $data['product_id']  = $product_id;
            $data['trade_no']    = $trade_no;
            $data['title']       = "";

            $trade = $this->input->post();

            $reply_data = array();

            if(!empty($trade))
            {
                $gt = $this->trade_app->get_trade($data['user_id'],$data['product_id']);

                $reply_data = array(
                    'trade_no'         => $trade_no,
                    'product_id'       => $product_id,
                    'receiver_user_id' => $data['receiver_user_id'],
                    'from_user_id'     => $data['from_user_id'],
                    'from_name'        => $trade['nickname'],
                    'from_email'       => $trade['email'],
                    'from_condition'   => $trade['condition'],
                    'flag'             => '1',
                    'create_data'      => date("Y/m/d H:i:s"),
                );

                $this->trade_app->insert_reply($reply_data);
                $nickname = $data['nickname'];
$message = <<< EOM
{$nickname}さんから返信があります。
EOM;
                $mail['email']     = $trade['email'];
                $mail['nickname']  = $trade['nickname'];
                $mail['condition'] = $trade['condition'];
                $mail['url']       = "http://sattriomph.xsrv.jp/trade_test/product/product_detail/".$product_id;
                $mail['title']     = 'テスト';

                $this->load->library('parser');
                //ここのパーサーファイルの文章は返信用に変える
                $message = $this->parser->parse('trade_mail', $mail, TRUE);

                $this->email->from($nickname);
                $this->email->to($data['from_email']);
                $this->email->subject('トレードの問い合わせ');
                $this->email->message($message);
                $this->email->send();
            }

            $this->load->view('header', $data);
            $this->load->view('reply', $data);
            $this->load->view('footer');
        }
        else
        {
            echo "string";
            #return false;
        }
    }


    // 取引決定
    public function transaction_decision($product_id, $trade_no)
    {
        $post = $this->input->post();

        //取引決定が送られてきたら、productとtrade_applicataionのpuroduct_idのflagを2（取引終了）にする
        $this->trade_app->finish_trade($product_id, $trade_no);
        $this->product->finish_change_flag($product_id);
        redirect('home');

        //取引決定したら、お互いの送付先と決定の知らせをメールで送信する
    }

    //アップロードテスト
    /*
    public function product_test()
    {
            $data = $this->input->post();

            $config = array(
                'upload_path' => './images/',
                'allowed_types' => 'gif|jpg|png',
                'max_size'  => '10000',
                'max_width'  => '1024',
                'max_height'  => '768',
            );

            $this->load->library('upload');
            
            $files = $_FILES;

            for ($i=0; $i < 4; $i++)
            { 
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                $config['file_name'] = $files['userfile']['name'][$i];

                $this->upload->initialize($config);

                if ($this->upload->do_upload())
                {
                    $data = array('upload_data' => $this->upload->data());
                    $this->load->view('pc/product_insert_test_success', $data);
                }
                else
                {
                    $error = array('error' => $this->upload->display_errors('<p>', '</p>'));
                    var_dump($error);
                    $this->load->view('pc/product_insert_test', $error);
                }
            }

            if($this->agent->is_mobile())
            {
                $this->load->view('sp/product_insert');
            }
            else
            {
                $this->load->view('pc/product_insert_test');
            }

        $header['title'] = 'テスト商品登録';
        $this->load->view('common/login_header', $header);
        $this->load->view('common/footer');
    }
    */
}
