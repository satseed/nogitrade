<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
    public function lists()
    {
        $data['products'] = $this->product->get_all_product_list();

        $header['title'] = '商品一覧';
        $this->load->view('admin/common/header', $header);
        $this->load->view('admin/products_list', $data);
        $this->load->view('admin/common/table_footer');
    }

    //出品商品詳細
    public function detail($product_id)
    {
        $data['details'] = $this->product->get_product_detail($product_id);

        $header['title'] = '商品詳細';
        $this->load->view('admin/common/header', $header);
        $this->load->view('admin/product_detail', $data);
        $this->load->view('admin/common/table_footer');
    }
}
