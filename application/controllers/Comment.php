<?php

class Comment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('news_model');
        $this->load->model('comment_model');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view('home');
    }

    public function AddComment($post_id)
    {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('comment', 'Comment', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $postID = $this->comment_model->insert(
                    $post_id,
                    $this->session->userdata('current_user')->email,
                    $this->input->post('comment'),
                    date("Y-m-d h:i:s")
                );

                $this->load->helper('url');
                redirect(base_url());
            }
        }

        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view(base_url());
    }
}
