<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Late_grade_model extends CI_Model {

    public function __construct()
    {
        #parent::__construct();
        $this->load->database();
    }

    //レート登録
    public function late_insert($data)
    {
        foreach($data as $dt)
        {
            $insert_data = array(
                'member_id'   => $dt['id'],
                'name'        => $dt['name'],
                'grade'       => $dt['late_grade'],
                'create_date' => date("Y/m/d H:i:s"),
            );
            $this->db->insert('late_grade', $insert_data);
        }
    }

    //レート取得
    public function get_late()
    {
        $this->db->select('name');
        $this->db->select('grade_name');
        $this->db->select('create_date');
        $this->db->join('grade', 'late_grade.grade = grade.grade_id');
        //$this->db->limit($count_member);
        $this->db->order_by('grade_id', 'asc');
        //$this->db->group_by('create_date');
        return $this->db->get('late_grade')->result_array();
    }
}
