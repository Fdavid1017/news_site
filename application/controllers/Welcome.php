<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('news_model');
        $this->load->model('category_model');
        $this->load->model('news_images_model');
    }

    public function index() {

        $this->load->library('session');
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view('home');
    }

}
