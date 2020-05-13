<?php

class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function get_list() {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function update($id, $name) {
        $record = [
            'name' => $name
        ];
        $this->db->where('id', $id);
        return $this->db->update('category', $record);
    }

    public function select_by_id($id) {
        $this->db->select("*");
        $this->db->from('category');
        $this->db->where('id', $id);

        return $this->db->get()
                        ->row();
    }

    public function insert($name) {
        $record = [
            'name' => $name
        ];
        return $this->db->insert('category', $record);
        return $this->db->insert_id();
    }

}
