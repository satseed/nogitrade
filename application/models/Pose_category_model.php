<?php
class Pose_category_model extends CI_Model {

    public function __construct()
    {
        #parent::__construct();
        $this->load->database();
    }

    //生写真のポーズを取得
    public function get_pose()
    {
        $query = $this->db->get('pose_category');
        return $query->result_array();
    }
}
