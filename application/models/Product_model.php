<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Product_model extends CI_Model {

    public function __construct()
    {
        #parent::__construct();
        $this->load->database();
    }

    //商品登録
    public function insert_product($post, $data, $file)
    {
        $insert_data = array(
            'user_id'      => $data['user_id'],
            'access_id'    => $data['access_id'],
            'product_name' => $post['product_name'],
            'pose_id'      => $post['pose_id'],
            'description'  => $post['description'],
            'img-1'        => $file['userfile']['name'][0],
            /*
            'img-2'        => $file['userfile']['name'][1],
            'img-3'        => $file['userfile']['name'][2],
            'img-4'        => $file['userfile']['name'][3],
            */
            'conditions'   => $post['conditions'],
            'preservation' => $post['preservation'],
            'create_data'  => date("Y/m/d H:i:s"),
        );
        $this->db->insert('product', $insert_data);
    }

    public function get_all_product_list()
    {
        $this->db->select('product_id');
        $query = $this->db->get('product');
        return $query->result_array();
    }

    /*
     *  ページャー用に登録されている商品を10件ずつ取得
     *  return array();
     */
    public function get_ten_product_list($per_page, $offset)
    {
        $this->db->select('product_id, product_name, flag, create_data');
        $this->db->limit($per_page, $offset);
        return $this->db->get('product')->result_array();
    }

    //出品商品の最新10件
    public function get_product_new_ten()
    {
        $this->db->join('users', 'product.user_id = users.user_id', 'left');
        $this->db->order_by('product_id', 'desc');
        $this->db->limit(10);

        $query =  $this->db->get('product');
        return $query->result_array();
    }

    //出品商品の個別詳細
    public function get_product_detail($product_id)
    {
        $this->db->join('users', 'product.user_id = users.user_id');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('product');
        return $query->result_array();
    }

    /*  
     *  検索ワードから商品を検索
     *  $str:検索文字列
     *  return array()
     */
    public function search($str)
    {
        if($str == "")
        {
            $sql = 'SELECT * FROM product LEFT JOIN users on product.user_id = users.user_id WHERE product_name like "" ';
        }
        else
        {
            $sql = "SELECT * FROM product LEFT JOIN users on product.user_id = users.user_id WHERE product_name like '%$str%'";
        }
        $query = $this->db->query($sql, array($str));
        
        return $query->result_array();
    }

    //初めてトレードの依頼が来たらproductテーブルのフラグを取引中にする
    public function trade_up_flag($product_id)
    {
        $this->db->where('product_id', $product_id);
        $this->db->where('flag', 0);
        $query = $this->db->get('product');

        if($query->num_rows() > 0)
        {
            $data = array('flag' => 1, 'update_data' => date("Y/m/d H:i:s"));
            $this->db->where('product_id', $product_id);
            $this->db->update('product', $data);
        }
        else
        {
            return false;
        }
    }

    /*  
     *  取引が終了したらflagを2にする
     *  $product_id:商品ID
     */
    public function finish_change_flag($product_id)
    {
        $data = array('flag' => 2);
        $this->db->where('product_id', $product_id);
        $this->db->update('product', $data);
    }

    /*  
     *  出品リストを取得
     *  $access_id:アクセスID
     *  return:array()
     */
    public function get_user_product_list($access_id)
    {
        $this->db->where('access_id', $access_id);
        return $this->db->get('product')->result_array();
    }

    /*  
     *  退会したらデータを削除
     *  $user_id:ユーザーID
     */
    public function product_unsubscribe($user_id)
    {
        $this->db->delete('product', array('user_id' => $user_id));
    }
}
