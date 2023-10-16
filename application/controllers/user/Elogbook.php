<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Elogbook extends Student_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->session->set_userdata('top_menu', 'Elog_book');
        $student_current_class = $this->customlib->getStudentCurrentClsSection();

        $student_id = $this->customlib->getStudentSessionUserID();
        $student = $this->student_model->get($student_id);
        $days = $this->customlib->getDaysname();
        $days_record = array();
        foreach ($days as $day_key => $day_value) {
            $days_record[$day_key] = $this->subjecttimetable_model->getparentSubjectByClassandSectionDay($student_current_class->class_id, $student_current_class->section_id, $day_key);
        }
        $data['timetable'] = $days_record;
        $data['attachment_record']    = $this->attachment_model->get($student_id);
        $data['student_id'] = $student_id;
        $data['student'] = $student;
        $this->load->view('layout/student/header', $data);
        $this->load->view('user/elogbook/elogbook', $data);
        $this->load->view('layout/student/footer', $data);
    }


    public function get_student_log_book_data($date){
        $data['status'] = true;
        $data['msg'] = 'success';
        $data['date'] = $date;
        $data['text'] = 'Sample message etex sjsjs cdjdb';
        $data['student_id'] = $this->customlib->getStudentSessionUserID();
        echo json_encode($data);
    }

}