<?php

class News_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function get_list() {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->order_by('add_date', 'ASC');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function update($id, $user_email, $text, $category_id, $add_date) {
        $record = [
            'user_email' => $user_email,
            'text' => $text,
            'category_id' => $category_id,
            'add_date' => $add_date
        ];
        $this->db->where('id', $id);
        return $this->db->update('post', $record);
    }

    public function select_by_id($id) {
        $this->db->select("*");
        $this->db->from('post');
        $this->db->where('id', $id);

        return $this->db->get()
                        ->row();
    }

    public function select_by_user_email($email) {
        $this->db->select("*");
        $this->db->from('post');
        $this->db->where('user_email', $email);

        return $this->db->get()
                        ->row();
    }

    public function insert($user_email, $text, $category_id, $add_date) {
        $record = [
            'user_email' => $user_email,
            'text' => $text,
            'category_id' => $category_id,
            'add_date' => $add_date,
        ];
        $this->db->insert('post', $record);
        return $this->db->insert_id();
    }

}
