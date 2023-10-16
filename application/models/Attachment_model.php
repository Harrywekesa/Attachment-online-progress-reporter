<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Attachment_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
        $this->current_date    = $this->setting_model->getDateYmd();
    }

    public function get($id){
        $this->db->select('*')->from('student_attachment')->where('student_id', $id);
        $query = $this->db->get();
        if($id != null){
            return $query->row_array();
        }else{
            return $query->result_array();
        }

    }

    public function getStudentAttachment($id, $status = '') {

        if (!empty($status)) {

            $this->db->where("status", $status);
        }
        $query = $this->db->where("student_id", $id)->order_by("session_id", "asc")->get("student_attachment");
        return $query->result_array();
    }

}