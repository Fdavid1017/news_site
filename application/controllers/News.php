<?php

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('news_model');
        $this->load->model('category_model');
    }

    public function index() {
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view('home');
    }

    public function AddNews() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('text', 'Text', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                /* $upload_config['allowed_types'] = 'jpg|jpeg|png';
                  $upload_config['max_size'] = 5120;
                  $upload_config['min_height'] = 250;
                  $upload_config['min_width'] = 250;

                  $upload_config['upload_path'] = './uploads/images/user/';
                  $upload_config['file_name'] = $this->input->post('add_date');
                  $upload_config['file_ext_tolower'] = TRUE;
                  $upload_config['overwrite'] = TRUE;

                  $this->load->library('upload');

                  $this->upload->initialize($upload_config);
                  if ($this->upload->do_upload('image') == TRUE) {
                  echo '<script>console.log("' . $upload_config['file_name'] . ' uploaded succesfully";</script>';
                  } */

                $this->news_model->insert($this->session->userdata('current_user')->email,
                        $this->input->post('text'),
                        $this->input->post('category_id') + 1,
                        date("Y-m-d h:i:s"));

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
