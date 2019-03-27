<?php
class Trade_application_model extends CI_Model {

    public function __construct()
    {
        #parent::__construct();
        $this->load->database();
    }

    //新規トレードのやり取りをインサート
    public function insert_trade($trade_data)
    {
        /* 新規の申し込みがあったら取引IDを設ける */
        $this->db->select('product_id');
        $this->db->where('product_id', $trade_data['product_id']);
        $query = $this->db->get('trade_application');
        if($query->num_rows == 0)
        {
            $this->db->insert('trade_application', $trade_data);
            redirect('home');
        }
        else
        {
            echo '取引ちゅう';
        }
        $this->db->insert('trade_application', $trade_data);
    }

    //トレードのやりとりをインサート
    public function insert_reply($reply_data)
    {
        $this->db->insert('trade_application', $reply_data);
    }

    //トレードのやり取りを取得
    public function get_trade($user_id, $product_id)
    {   
        $this->db->select('*');
        $this->db->join('product', 'trade_application.product_id = product.product_id', 'left');
        $this->db->where('receiver_user_id', $user_id);
        $this->db->where('trade_application.product_id', $product_id);
        $this->db->order_by('trade_application.create_data', 'asc');

        return $this->db->get('trade_application')->result_array();
    }

    //返信用ユーザー情報
    public function get_user_reply_data($from_user_id)
    {
        $this->db->where('from_user_id', $from_user_id);
        $query = $this->db->get('trade_application');
        return $query->result_array();
    }

    //取引中を取引終了フラグに変える
    public function finish_trade($product_id, $trade_no)
    {
        $data = array('flag' => 2);
        $this->db->where('product_id', $product_id);
        $this->db->update('trade_application', $data);
    }
}
