<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('category_model');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view('category_view');
    }

    public function delete($id)
    {
        $this->category_model->delete($id);

        $this->load->helper('url');
        redirect(base_url());
    }

    public function add()
    {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('category', 'category', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $categoryID = $this->category_model->insert(
                    $this->input->post('category')
                );
            }
        }
        $this->load->helper('url');
        redirect(base_url());
    }
}
