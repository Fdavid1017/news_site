<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function get_list() {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('first_name', 'ASC');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function update($first_name, $second_name, $email, $password) {
        $record = [
            'first_name' => $first_name,
            'second_name' => $second_name,
            'password' => $password
        ];
        $this->db->where('email', $email);
        return $this->db->update('user', $record);
    }

    public function select_by_id($email) {
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('email', $email);

        return $this->db->get()
                        ->row();
    }

    public function select_by_id_and_password($email, $password) {
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        return $this->db->get()
                        ->row();
    }

    public function insert($first_name, $second_name, $email, $password) {
        $record = [
            'email' => $email,
            'first_name' => $first_name,
            'second_name' => $second_name,
            'password' => $password
        ];
        return $this->db->insert('user', $record);
        return $this->db->insert_id();
    }

}
