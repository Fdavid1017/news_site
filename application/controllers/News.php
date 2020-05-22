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
        $this->load->model('user_model');
        $this->load->model('comment_model');
    }

    public function index()
    {
        if ($this->input->post('submit')) {
            $text = '';
            $category_id = 0;
            $text =  $this->input->post('text');
            $category_id = $this->input->post('category_id');
            $this->session->set_userdata('news', $this->news_model->select_by_text_and_category($text, $category_id));
        } else {
            $this->session->set_userdata('news', $this->news_model->get_list());
        }

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
                    $this->input->post('category_id'),
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

    public function saveToJson($post_id)
    {
        $post = $this->news_model->select_by_id($post_id);
        $images = $this->news_images_model->select_by_postID($post_id);
        $imgs = [];

        foreach ($images as $value) {
            array_push($imgs, [$value->id => base64_encode(file_get_contents(base_url('uploads/images/news/' . $value->picture)))]);
        }

        $post->images = $imgs;
        //echo json_encode($post);
        /*$this->load->helper('file');
        write_file($post->id . '_news.json', json_encode($post));*/

        $this->load->helper('download');
        force_download($post->id . '_news.json', json_encode($post));

        $this->load->helper('url');
        redirect(base_url());
    }
}
