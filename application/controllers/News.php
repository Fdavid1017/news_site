<?php

class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('news_model');
        $this->load->model('category_model');
        $this->load->model('news_images_model');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view('home');
    }

    public function AddNews()
    {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('text', 'Text', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $postID = $this->news_model->insert(
                    $this->session->userdata('current_user')->email,
                    $this->input->post('text'),
                    $this->input->post('category_id') + 1,
                    date("Y-m-d h:i:s")
                );

                $upload_config['allowed_types'] = 'jpg|jpeg|png';
                $upload_config['max_size'] = 2048;
                $upload_config['min_height'] = 250;
                $upload_config['min_width'] = 250;

                $upload_config['upload_path'] = './uploads/images/news/';
                $upload_config['file_ext_tolower'] = TRUE;
                $upload_config['overwrite'] = TRUE;

                $this->load->library('upload');

                $upload_config['file_name'] = $postID . '_001';
                $this->upload->initialize($upload_config);
                if ($this->upload->do_upload('image1') == TRUE) {
                    $this->news_images_model->insert(
                        $postID,
                        $this->upload->data()['file_name']
                    );
                }

                $upload_config['file_name'] = $postID . '_002';
                $this->upload->initialize($upload_config);
                if ($this->upload->do_upload('image2') == TRUE) {
                    $this->news_images_model->insert(
                        $postID,
                        $this->upload->data()['file_name']
                    );
                }

                $upload_config['file_name'] = $postID . '_003';
                $this->upload->initialize($upload_config);
                if ($this->upload->do_upload('image3') == TRUE) {
                    $this->news_images_model->insert(
                        $postID,
                        $this->upload->data()['file_name']
                    );
                }

                $this->load->helper('url');
                redirect(base_url());
            }
        }

        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view('post/add_news');
    }
}
