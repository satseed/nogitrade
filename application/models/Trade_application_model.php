<?php
	class Trade_application_model extends CI_Model {

	function __construct()
	{
		#parent::__construct();
		$this->load->database();
	}

	//トレードのやり取りをインサート
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

	//トレードのやり取りを取得
	public function get_trade($user_id, $product_id)
	{	
		$this->db->join('product', 'trade_application.product_id = product.product_id', 'left');
		/*$this->db->where('receiver_user_id', $user_id);*/
		$this->db->where('trade_application.product_id', $product_id);

		return $this->db->get('trade_application')->result_array();
		
	}
}
