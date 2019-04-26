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

    // 出品者側のトレードnoを取得
    public function get_trade_id($product_id)
    {
        $this->db->distinct();
        $this->db->select('trade_no');
        $this->db->where('product_id', $product_id);
        return $this->db->get('trade_application')->result_array();
    }

    // 希望者側のトレードnoを取得
    public function get_wish_trade_id($product_id, $user_id)
    {
        $this->db->distinct();
        $this->db->select('trade_no');
        $this->db->where('product_id', $product_id);
        $this->db->where('from_user_id', $user_id);
        return $this->db->get('trade_application')->result_array();
    }

    // 出品者側のトレード内容を取得
    public function trade_data($trade_no)
    {
        $this->db->where('trade_no', $trade_no);
        return $this->db->get('trade_application')->result_array();
    }

    public function get_wish_trade_data($trade_no, $user_id)
    {
        $this->db->where('from_user_id', $user_id);
        $this->db->where('trade_no', $trade_no);
        $query = $this->db->get('trade_application');

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
    }

    //トレードのやり取りを取得
    public function get_trade($user_id, $product_id)
    {   
        $this->db->select('*');
        $this->db->join('product', 'trade_application.product_id = product.product_id', 'left');
        $this->db->where('trade_application.product_id', $product_id);
        $this->db->where('product.product_id', $product_id);
        $this->db->where('receiver_user_id', $user_id);
        $this->db->or_where('from_user_id', $user_id);
        $this->db->order_by('trade_application.create_data', 'asc');

        return $this->db->get('trade_application')->result_array();
    }

    //トレード一覧取得
    public function trade_list($user_id, $per_page, $offset)
    {
        $this->db->select('product_name');
        $this->db->select('product.product_id');
        $this->db->join('product', 'trade_application.product_id = product.product_id', 'left');
        $this->db->where('from_user_id', $user_id);
        $this->db->group_by("trade_no"); 
        if($per_page > 10)
        {
            $this->db->limit($per_page, $offset);
        }
        return $this->db->get('trade_application')->result_array();
    }

    //返信用ユーザー情報
    public function get_user_reply_data($from_user_id, $product_id)
    {
        $this->db->where('from_user_id', $from_user_id);
        $this->db->where('product_id', $product_id);
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

    /*
     *  退会したらやりとりのデータを削除
     *  user_id: ユーザーID
     *
     */
    public function trade_appli_unsubscribe($user_id)
    {
        $this->db->delete('trade_application', array('receiver_user_id' => $user_id));
    }
}
