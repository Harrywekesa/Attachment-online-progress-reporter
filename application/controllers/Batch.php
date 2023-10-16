<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Batch extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('batch_model');
    }

    public function index()
    {
        if (!$this->rbac->hasPrivilege('student_attachment', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Industrial Attachment');
        $this->session->set_userdata('sub_menu', 'batch/index');
        $data['title']        = 'Attachment Batch List';
        $batch_result      = $this->batch_model->get();
        $data['batchList'] = $batch_result;
        $this->load->view('layout/header', $data);
        $this->load->view('batch/batchList', $data);
        $this->load->view('layout/footer', $data);
    }

    public function view($id)
    {
        if (!$this->rbac->hasPrivilege('student_categories', 'can_view')) {
            access_denied();
        }
        $data['title']    = 'Category List';
        $batch         = $this->batch_model->get($id);
        $data['batch'] = $batch;
        $this->load->view('layout/header', $data);
        $this->load->view('category/categoryShow', $data);
        $this->load->view('layout/footer', $data);
    }

    public function delete($id)
    {
        if (!$this->rbac->hasPrivilege('student_categories', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Category List';
        $this->batch_model->remove($id);
        $this->session->set_flashdata('msgdelete', '<div class="alert alert-success text-left">' . $this->lang->line('delete_message') . '</div>');
        redirect('category/index');
    }

    public function create()
    {
        if (!$this->rbac->hasPrivilege('student_attachment', 'can_add')) {
            access_denied();
        }
        $data['title']        = 'Add Batch';
        $batch_result      = $this->batch_model->get();
        $data['batchlist'] = $batch_result;
        $this->form_validation->set_rules('start_year', $this->lang->line('start_year'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('start_month', $this->lang->line('start_month'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('batch/batchList', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'start_year' => $this->input->post('start_year'),
                'start_month' => $this->input->post('start_month'),
                'end_year' => $this->input->post('end_year'),
                'end_month' => $this->input->post('end_month'),
            );
            $this->batch_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('batch/index');
        }
    }

    public function edit($id)
    {
        if (!$this->rbac->hasPrivilege('student_attachment', 'can_edit')) {
            access_denied();
        }
        $data['title']        = 'Edit Batch';
        $batch_result      = $this->batch_model->get();
        $data['batchList'] = $batch_result;
        $data['id']           = $id;
        $batch             = $this->batch_model->get($id);
        $data['batch']     = $batch;
        $this->form_validation->set_rules('start_year', $this->lang->line('start_year'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('start_month', $this->lang->line('start_month'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('batch/batchEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'id'       => $id,
                'start_year' => $this->input->post('start_year'),
                'start_month' => $this->input->post('start_month'),
                'end_year' => $this->input->post('end_year'),
                'end_month' => $this->input->post('end_month'),
            );
            $this->batch_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('batch/index');
        }
    }

}
