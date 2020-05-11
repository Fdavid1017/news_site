<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view('welcome_message');
    }

    public function Register() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('second_name', 'Second name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('password_confirmation', 'Password Again', 'trim|required|matches[password]');

            if ($this->form_validation->run() == TRUE) {
                $this->user_model->insert($this->input->post('first_name'),
                        $this->input->post('second_name'),
                        $this->input->post('email'),
                        $this->input->post('password'));

                $this->load->helper('url');
                redirect(base_url('user/login'));
            }
        }

        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view('register');
    }

    public function Login() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            if ($this->form_validation->run() == TRUE) {
                $user = $this->user_model->select_by_id_and_password($this->input->post('email'), $this->input->post('password'));

                $this->load->library('session');
                $this->session->set_userdata('current_user', $user);

                $this->load->helper('url');
                redirect(base_url());
            }
        }

        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('navBar');
        $this->load->view('login');
    }

}
