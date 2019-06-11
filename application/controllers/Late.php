<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Late extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model','ms');
        $this->load->model('Late_grade_model','lg');
    }

    public function late_view() 
    {
        $data['mbs'] =  $this->ms->get_late_member();
        $this->load->view('late_view', $data);
    }

    public function late_acceptance() 
    {
        $grades[] = $this->input->post();
        for ($i=0; $i < count($grades[0]['id']) - 1 ; $i++) 
        {
            foreach($grades as $grade)
            {
                $member_late[] = array('id' => $grade['id'][$i], 'name' => $grade['name'][$i], 'late_grade' => $grade['late_grade'][$i]);
            }
        }
        $this->lg->late_insert($member_late);
    }
}