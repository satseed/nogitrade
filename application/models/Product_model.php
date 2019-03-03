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
							'user_id'         => $data['user_id'],
							'access_id'       => $data['access_id'],
							'product_name'    => $post['product_name'],
							'pose_id'         => $post['pose_id'],
							'description'     => $post['description'],
							'img-1'           => $file['userfile']['name'][0],
							/*
							'img-2'           => $file['userfile']['name'][1],
							'img-3'           => $file['userfile']['name'][2],
							'img-4'           => $file['userfile']['name'][3],
							*/
							'conditions'      => $post['conditions'],
							'preservation'    => $post['preservation'],
							'create_data'     => date("Y/m/d H:i:s"),
		);
		$this->db->insert('product', $insert_data);
	}

	//出品商品の最新10件
	public function get_product_new_ten()
	{
		$this->db->join('users', 'product.user_id = users.user_id');
		$this->db->order_by('product_id', 'desc');
		$this->db->limit(10);

		$query =  $this->db->get('product');
		return $query->result_array();
	}

	//出品商品の個別詳細
	public function get_product_detail($product_id)
	{
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('product');
		return $query->result_array();
	}

	/*  
	 * 	検索ワードから商品を検索
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
#echo $this->db->last_query();exit;
		return $query->result_array();
	}

	//初めてトレードの依頼が来たらproductテーブルのフラグを取引中にする
	public function trade_up_flag($product_id)
	{
		$this->db->where('product_id', $product_id);
		$this->db->where('flag', 0);
		$query = $this->db->get('product');
/*echo $this->db->last_query();exit;*/
		if($query->num_rows() == 1)
		{
			$data = array('flag' => 1);
			$this->db->where('product_id', $product_id);
			$this->db->update('product', $data);
		}
		else
		{
			return false;
		}


	}
}
